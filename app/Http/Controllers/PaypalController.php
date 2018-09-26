<?php

namespace App\Http\Controllers;
use App\Http\Requests;

use Illuminate\Http\Request;
use Validator;
use URL;
use DB;
use Session;
use Redirect;
use App\UsuarioHabitacion;

use Input;
use PayPal\Rest\ApiContext;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\ExecutePayment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\Transaction;

class PaypalController extends Controller
{
    private $_api_context;

	public function __construct()
	{
		// setup PayPal api context
		$paypal_conf = \Config::get('paypal');
		$this->_api_context = new ApiContext(new OAuthTokenCredential($paypal_conf['client_id'], $paypal_conf['secret']));
		$this->_api_context->setConfig($paypal_conf['settings']);
	}
	public function postPayment(Request $request)
	{
		$n_habitacion = $request->get('habitacion');
		$tarifa = $request->get('tarifa');
		$servicio = $request->get('fecha');
		$fechaHora = $request->get('fechaHora');
		$fechaSalida = $request->get('fechaSalida');
		$comentario = $request->get('comentario');
		Session::put('reserva', [$n_habitacion,$tarifa,$servicio,$fechaHora, $fechaSalida, $comentario]);

		$payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();
        $item_1->setName('Reserva') /** item name **/
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('tarifa')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('tarifa'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Reserva de habitacion Online');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::route('payment.status')) /** Specify return URL **/
            ->setCancelUrl(URL::route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
            /** dd($payment->create($this->_api_context));exit; **/

		try {
			$payment->create($this->_api_context);

		} catch (\PayPal\Exception\PPConnectionException $ex) {
			if (\Config::get('app.debug')) {
				echo "Exception: " . $ex->getMessage() . PHP_EOL;
				$err_data = json_decode($ex->getData(), true);
				exit;
			} else {
				die('Ups! Algo salió mal');
			}
		}
		foreach($payment->getLinks() as $link) {
			if($link->getRel() == 'approval_url') {
				$redirect_url = $link->getHref();
				break;
			}
		}

		// add payment ID to session
		Session::put('paypal_payment_id', $payment->getId());
		if(isset($redirect_url)) {
			// redirect to paypal
			return Redirect::away($redirect_url);
		}
		return \Redirect::route('reservaonline')
			->with('error', 'Ups! Error desconocido.');


	}
	public function getPaymentStatus()
	{
		// Get the payment ID before session clear
		$payment_id = Session::get('paypal_payment_id');
		// clear the session payment ID
		Session::forget('paypal_payment_id');
		if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            return \Redirect::route('resevaonline.index')
				->with('message', 'Hubo un problema al intentar pagar con Paypal');

        }
		$payment = Payment::get($payment_id, $this->_api_context);
		// PaymentExecution object includes information necessary 
		// to execute a PayPal account payment. 
		// The payer_id is added to the request query parameters
		// when the user is redirected from paypal back to your site
		$execution = new PaymentExecution();
		$execution->setPayerId(Input::get('PayerID'));
		//Execute the payment
		$result = $payment->execute($execution, $this->_api_context);
		//echo '<pre>';print_r($result);echo '</pre>';exit; // DEBUG RESULT, remove it later
		if ($result->getState() == 'approved') { // payment made
			// Registrar el pedido --- ok
			$reservaGet = Session::get('reserva');
				Session::forget('reserva');
			$reserva = new UsuarioHabitacion();
			$reserva->tiempo_inicio = $reservaGet[3];
			$reserva->tiempo_fin = $reservaGet[4];
			$reserva->tiempo_reserva = $reservaGet[2];
			$reserva->id_habitacion = $reservaGet[0];
			$reserva->id_usuario = $this->cuentaCLiente($reservaGet[0]);
			$reserva->tarifa = $reservaGet[1];
			$reserva->observacion = $reservaGet[5];
			$reserva->es_online = true;
			$reserva->activa = false;
			$reserva->reserva = true;
			$reserva->tipo_pago = 'Tarjeta';
			$reserva->save();
			
			// Eliminar carrito 
			// Enviar correo a user
			// Enviar correo a admin
			// Redireccionar
			return \Redirect::route('reservaonline.create')
				->with('message', 'Compra realizada de forma correcta')->with('reserva',$reserva);
		}
		return \Redirect::route('reservaonline.index')
			->with('message', 'La compra fue cancelada');
	}

	public function cuentaCLiente($id){
		$cuenta = DB::table('users')
				->where('users.email',$id)
				->select('users.id')
				->get();
		return $cuenta[0]->id;
	}

}
