<?php

namespace App\Http\Controllers;
use App\UsuarioHabitacion;
use Illuminate\Support\Facades\Session;
use App\Habitacion;
use App\TipoHabitacion;
use App\EstadoHabitacion;
use App\User;
use App\Insumo;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

    use Mike42\Escpos\Printer; 
    use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
    use Mike42\Escpos\PrintConnectors\FilePrintConnector;
    use Mike42\Escpos\PrintConnectors\NetworkPrintConnector;

class UsuarioHabitacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index(Request $request)
    {


        $habitacion =  Habitacion::
                  estado($request->get('estado'))
                  ->activa($request->get('activa'))
                  ->inicio($request->get('fecha_inicio'))
                  ->fin($request->get('fecha_fin'))
                  ->ordenar($request->get('ordenar'))
                  ->join('tipo_habitaciones', 'tipo_habitaciones.id', '=', 'habitaciones.id_tipo_habitacion' )
                  ->join('estado_habitaciones', 'estado_habitaciones.id', '=', 'habitaciones.id_estado_habitacion' )
                  ->join('usuarios_habitaciones','usuarios_habitaciones.id_habitacion','=', 'habitaciones.id')
                  ->where('activa',true)
                  ->select('habitaciones.*','usuarios_habitaciones.*','tipo_habitaciones.tipo','estado_habitaciones.estado','estado_habitaciones.color')
        //        ->where('usuarios_habitaciones.activa',true)
            //    ->orwhere('usuarios_habitaciones.reserva',true)
                  ->orderBy('usuarios_habitaciones.id','DESC')
                  ->get();

        $habitacionReserva =  Habitacion::
                  estado($request->get('estado'))
                  ->activa($request->get('activa'))
                  ->inicio($request->get('fecha_inicio'))
                  ->fin($request->get('fecha_fin'))
                  ->ordenar($request->get('ordenar'))
                  ->join('tipo_habitaciones', 'tipo_habitaciones.id', '=', 'habitaciones.id_tipo_habitacion' )
                  ->join('estado_habitaciones', 'estado_habitaciones.id', '=', 'habitaciones.id_estado_habitacion' )
                  ->join('usuarios_habitaciones','usuarios_habitaciones.id_habitacion','=', 'habitaciones.id')
                  ->where('activa',false)
                  ->where('reserva',true)
                  ->select('habitaciones.*','usuarios_habitaciones.*','tipo_habitaciones.tipo','estado_habitaciones.estado','estado_habitaciones.color')
        //        ->where('usuarios_habitaciones.activa',true)
            //    ->orwhere('usuarios_habitaciones.reserva',true)
                  ->orderBy('usuarios_habitaciones.id','DESC')
                  ->paginate(25);

        $habitacionTodas =  Habitacion::
                  estado($request->get('estado'))
                  ->activa($request->get('activa'))
                  ->inicio($request->get('fecha_inicio'))
                  ->fin($request->get('fecha_fin'))
                  ->ordenar($request->get('ordenar'))
                  ->join('tipo_habitaciones', 'tipo_habitaciones.id', '=', 'habitaciones.id_tipo_habitacion' )
                  ->join('estado_habitaciones', 'estado_habitaciones.id', '=', 'habitaciones.id_estado_habitacion' )
                  ->join('usuarios_habitaciones','usuarios_habitaciones.id_habitacion','=', 'habitaciones.id')

                  ->select('habitaciones.*','usuarios_habitaciones.*','tipo_habitaciones.tipo','estado_habitaciones.estado','estado_habitaciones.color')
        //        ->where('usuarios_habitaciones.activa',true)
            //    ->orwhere('usuarios_habitaciones.reserva',true)
                  ->orderBy('usuarios_habitaciones.id','DESC')
                  ->paginate(25);
     
        $insumos = DB::table('insumos')
                    ->pluck('nombre','id'); 

        $estados = DB::table('estado_habitaciones')
                    ->pluck('estado','id'); 

                    
        return view('usuarioshabitaciones.index')->with('habitacion', $habitacion)->with('insumos', $insumos)->with('estados', $estados)->with('habitacionReserva', $habitacionReserva)->with('habitacionTodas', $habitacionTodas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
                   
        $lista_habitacion = DB::table('habitaciones')
                             ->join('estado_habitaciones','estado_habitaciones.id','=','habitaciones.id_estado_habitacion')
                             ->where('estado_habitaciones.estado','Disponible')
                             ->orderBy('habitaciones.id')
                             ->pluck('numero_habitacion','habitaciones.id'); 

        $lista_clientes = User::join('users_type', 'users_type.id', '=', 'users.id_type' )            
                  ->select('users.*','users_type.type')
                  ->where('users_type.type','=',"Cliente")
                  ->orderBy('users.id','ASC')
                  ->pluck('email','id'); 
        $fecha = new \DateTime();   
    return view('usuarioshabitaciones.create')->with('lista_habitacion',$lista_habitacion)->with('lista_clientes',$lista_clientes)->with('fecha', $fecha);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reserva = new UsuarioHabitacion($request->all());

        $fecha = $reserva->tiempo_inicio;
        $fin = new Carbon($fecha);
        $fin->addHour($reserva->tiempo_reserva);
        $sinReservas = DB::table('usuarios_habitaciones')
                //      ->join('habitaciones','habitaciones.id','=','usuarios_habitaciones.id_habitacion')
                        ->whereBetween('usuarios_habitaciones.tiempo_inicio',[$fecha,$fin])  
                        ->orWhereBetween('usuarios_habitaciones.tiempo_fin',[$fecha,$fin]) 
                        
                //      ->select('habitaciones.*')
                        ->get();
        
        if(count($sinReservas->where('id_habitacion',$reserva->id_habitacion))==0){
          $servicio = $reserva->tiempo_reserva.' hours';
         
          $fecha1 = new \DateTime($request->tiempo_inicio);
          $reserva->tiempo_fin = $fecha1;
          $reserva->tiempo_fin->modify($servicio); 
          $reserva->tiempo_fin->format('Y-m-d H:i:s');

          $now = Carbon::now();
          $fecha_inicio= Carbon::parse($request->tiempo_inicio);
          $diferenciaenhoras = $fecha_inicio->diffInHours($now);

          if($now >= $fecha_inicio){
              $reserva->activa = true ;
              $reserva->reserva = false;
          }else{
              $reserva->activa = false; 
              $reserva->reserva = true; 
          }
          $reserva->es_online=false;

          $reserva->save();
          Session::flash('message', 'La reserva se creo exitosamente.');
        }else{
          Session::flash('message', 'RESERVA NO PROCESADA. Otra reserva a la misma hora o cerca');
        }
      

      //  $this->ticket($reserva->id);

        
        return redirect(route('usuarioshabitaciones.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reserva = UsuarioHabitacion::find($id);

        $lista_habitacion = DB::table('habitaciones')
                             ->orderBy('id')
                             ->pluck('numero_habitacion','id'); 
        $lista_clientes = User::join('users_type', 'users_type.id', '=', 'users.id_type' )            
                  ->select('users.*','users_type.type')
                  ->where('users_type.type','=',"Cliente")
                  ->orderBy('users.id','ASC')
                  ->pluck('email','id');

        return view('usuarioshabitaciones.edit')->with('reserva', $reserva)->with('lista_habitacion',$lista_habitacion)->with('lista_clientes',$lista_clientes);
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
        if($id==0){
             $reserva = UsuarioHabitacion::find($request->id);
             $reserva->tiempo_fin_real = $request->tiempo_fin_real;
             $reserva->tarifa_horas_extras = $request->tarifa_horas_extras;
        }else{
            $reserva = UsuarioHabitacion::find($id);
            $reserva->id_usuario = $request->id_usuario;
            $reserva->id_habitacion = $request->id_habitacion;
            $reserva->tiempo_reserva = $request->tiempo_reserva;
            $reserva->tiempo_inicio = $request->tiempo_inicio;
            $reserva->tiempo_fin = $request->tiempo_fin;
            $reserva->tarifa = $request->tarifa;
            $reserva->observacion = $request->observacion;
            $reserva->tiempo_fin_real = $request->tiempo_fin_real;
            $reserva->tarifa_horas_extras = $request->tarifa_horas_extras;
            $reserva->tipo_pago = $request->tipo_pago;

            $reserva->patente = $request->patente;
            
        }
         $reserva->save();
        
         Session::flash('message', "Se ha editado la reserva $reserva->id Exitosamente!");
        return redirect()->route('usuarioshabitaciones.index');
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reserva = UsuarioHabitacion::find($id);
        $reserva->delete();  

        Session::flash('message', "Se ha eliminado la reserva Exitosamente!");
        return redirect(route('usuarioshabitaciones.index'));
    }


    public function ticket($id){

        $reserva = DB::table('usuarios_habitaciones')
                    ->join('users','users.id','=','usuarios_habitaciones.id_usuario')
                    ->where('usuarios_habitaciones.id',$id)
                    ->select('usuarios_habitaciones.*','users.email','users.password')
                    ->get();
        $random = rand(100000,999999);
      
        $user = User::find($reserva[0]->id_usuario);
        $user->password = bcrypt($random);
        $user->password_cliente = encrypt($random);
        $user->save();
      
        $contraseña = decrypt($user->password_cliente);            
        $nombre_impresora = "POS-58";     
               try {
                 $connector = new WindowsPrintConnector($nombre_impresora);
                 $printer = new Printer($connector);
                  $printer->text("          MOTEL ARCOIRIS ");
                 $printer->feed(2); // saltos de linea
                 $printer->text("Telefono: 2830700");
                 $printer->feed(1); // saltos de linea
                 $printer->text("Correo: arcoiris@gmail.com");
                 $printer->feed(3); // saltos de linea
                 $printer->text("ID : ".$reserva[0]->id);
                 $printer->feed(1); // saltos de linea
                  $printer->text("Entrada : ".$reserva[0]->tiempo_inicio);
                  $printer->feed(1); // saltos de linea
                  $printer->text("Salida : ".$reserva[0]->tiempo_fin);
                  
                  $printer->feed(1);
                  $printer->text("Username : ".$reserva[0]->email);
                  $printer->feed(1);
                  $printer->text("Contrasena : ".$contraseña);
                  $printer->feed(2);
                  $printer->text("Ingresa a www.motelarcoiris.cl y solicita productos a la habitacion");
                  $printer->feed(2);
                  $printer->text("Llamar a la central: 103");
                  $printer->feed(3); // saltos de linea

                  $printer -> close();
                } catch(Exception $e) {
                    
                }

    return back();
    }

    public function consulta(){

        return back();

    }
    public function consultaPost()

    {
        $input = request()->all();
        $now = Carbon::now();
        $mas4horas = Carbon::now();
        $mas4horas->addHour(4);

        $reservas = DB::table('usuarios_habitaciones')
                    ->whereBetween('usuarios_habitaciones.tiempo_inicio',[$now,$mas4horas])   
                    ->where('usuarios_habitaciones.activa',false)     
                    ->get();

        $estado= DB::table('estado_habitaciones')
                ->where('estado_habitaciones.estado',"Ocupado")
                ->get();
        foreach ($reservas as $key => $reservacion) {    
            $reserva = UsuarioHabitacion::find($reservacion->id);
            $reserva->activa = true ;
        //    $reserva->reservas= false;
            $reserva->save();  
            
            $habitacion = Habitacion::find($reservacion->id_habitacion);
            $habitacion->id_estado_habitacion = $estado[0]->id;
            $habitacion->save();
            $reservas[$key]->numero_habitacion = $habitacion->numero_habitacion;
        }
        if(count($reservas)>0){
            return json_encode($reservas);
        }
    }

    public function consultaReserva(){

        $now = Carbon::now();
        $mas15min = Carbon::now();
        $mas15min->addMinutes(15);


        $reservas = DB::table('usuarios_habitaciones')
                    ->join('habitaciones','habitaciones.id','=','usuarios_habitaciones.id_habitacion')
                    ->whereBetween('usuarios_habitaciones.tiempo_fin',[$now,$mas15min])   
                    ->where('usuarios_habitaciones.activa',true)     
                    ->get();
        
        return json_encode($reservas);
    }
}
