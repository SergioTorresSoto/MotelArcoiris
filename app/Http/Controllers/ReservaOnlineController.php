<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoHabitacion;
use App\Habitacion;
use App\UsuarioHabitacion;
use DB;
use Carbon\Carbon;
use PDF;
use App\Jornada;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
class ReservaOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function consultarHorasDisponibles($fecha,$horas){

        $date = Carbon::parse($fecha)->format('N');
    //    $dia == date("w",strtotime($date));
        
        $horarios = Jornada::join('users_jornadas', 'users_jornadas.id_jornada', '=', 'jornadas.id' )
                    ->join('users', 'users.id', '=', 'users_jornadas.id_user')
                    ->select('users_jornadas.*','users.nombre','users.apellido','users.id as user_id','jornadas.hora_entrada','jornadas.hora_salida','jornadas.duracion_hora','jornadas.duracion_minuto','jornadas.id as jornada_id')
                    ->where(DB::raw("DATE_FORMAT(users_jornadas.fecha_salida,'%Y-%m-%d ')"),$fecha)
                    ->orderBy('id')
                    ->get();

        if(count($horarios)>0){ 

            if($date == 1 || $date == 2 || $date == 3 || $date == 4 ){
                if($horas == 4){
                    $arrayHoras = ['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00'];
                }else{
                     $arrayHoras = ['09:00'];
                }
            }
            if($date == 5){
             
                    $arrayHoras = ['09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00'];

            }
            if($date == 6){
                $arrayHoras = ['00:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00','19:00','20:00','21:00','22:00','23:00'];
            }
             if($date == 7){
                if($horas == 4){
                    $arrayHoras = ['00:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00','10:00','11:00','12:00','13:00','14:00','15:00','16:00'];
                }else{
                     $arrayHoras = ['00:00','01:00','02:00','03:00','04:00','05:00','06:00','07:00','08:00','09:00'];
                }
            }
        }else{
            $arrayHoras = [''];
        }

        //$data=array('reservaOnline' => $reservaOnline);

        return json_encode($arrayHoras);

    }
    public function index()
    {

        return view('reservaonline.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fecha = Carbon::now()->format('Y-m-d');
     //   dd($date);
        $tipo_habitacion= DB::table('tipo_habitaciones')
                     ->orderBy('id')
                     ->pluck('tipo','id');

         $horas = DB::table('tarifas')
                     ->distinct('horas')
                     ->pluck('horas');
        return view('reservaonline.create')->with('fecha', $fecha)->with('tipo_habitacion', $tipo_habitacion)->with('horas', $horas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function horasPost(){

        $id = request()->all();
        $hora = DB::table('tarifas')
                ->where('tarifas.id_tipo',$id['id_tipo'])
                ->select('id','horas')
                ->get();

        return response()->json($hora);
    }

    public function downloadPDF($id)
    {   
        $reserva = UsuarioHabitacion::find($id); 
        $habitacion = Habitacion::find($reserva->id_habitacion);
        $pdf = PDF::loadView('pdf.reservaPDF', compact('reserva','habitacion'));
        return $pdf->download('reserva.pdf');
    }

    public function pdfCorreoPost(){
        $mensaje=null;
        $correo = request()->all();

        $reserva = UsuarioHabitacion::find($correo['id']); 
        $habitacion = Habitacion::find($reserva->id_habitacion);
        $pdf = PDF::loadView('pdf.reservaPDF', compact('reserva','habitacion'));
        $pdfString = $pdf->output();

    //  return $pdf->download('reserva.pdf');

        $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'keopo.coke017@gmail.com';                 // SMTP username
            $mail->Password = 'Coke1991';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('keopo.coke017@gmail.com', 'Arcoiris');
            $mail->addAddress($correo['correo']);               // Name is optional
      //      $mail->addReplyTo('info@example.com', 'Information');
      //      $mail->addCC('cc@example.com');
       //     $mail->addBCC('bcc@example.com');

            //Attachments
            $mail->addStringAttachment($pdfString, 'reserva.pdf');
     //       $mail->addAttachment($pdf->download('reserva.pdf'));         // Add attachments
     //       $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

            //Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = 'Arcoiris Reserva';
            $mail->Body    = 'Presenta este comprobante para hacer valida la reserva';
            $mail->send();
            $mensaje = 'mensaje enviado'; 
            
        } catch (Exception $e) {
            $mensaje = $mail->ErrorInfo;
        }
        return response()->json(['var'=>$mensaje]);  
      
    }


    public function consulta(){
        return back();
    }

     public function consultaPost(){

        $input = request()->all();
        $fecha = $input['fecha'];
        $fin = new Carbon($fecha);
        $fin->addHour($input['horas']);
        $reservas = DB::table('usuarios_habitaciones')
                //      ->join('habitaciones','habitaciones.id','=','usuarios_habitaciones.id_habitacion')
                        ->whereBetween('usuarios_habitaciones.tiempo_inicio',[$fecha,$fin])  
                        ->orWhereBetween('usuarios_habitaciones.tiempo_fin',[$fecha,$fin]) 
                //      ->where('habitaciones.id_tipo_habitacion',$input['id_tipo'])
                //      ->select('habitaciones.*')
                        ->get();
        $contador = count($reservas);

        $habitaciones = Habitacion::where('habitaciones.id_tipo_habitacion',$input['id_tipo'])
                            ->get();
        foreach ($reservas as  $reserva) {
            foreach ($habitaciones as $key => $habitacion) {
                if($reserva->id_habitacion == $habitacion->id){
                    $habitaciones->forget($key);
                }
            }
        }

        $tarifa = DB::table('tarifas')
                    ->where('tarifas.horas',$input['horas'])
                    ->where('tarifas.id_tipo',$input['id_tipo'])
                    ->get();

        return response()->json(['input'=>$habitaciones,'tarifa'=>$tarifa, 'fin'=>$fin]);
    }

}
