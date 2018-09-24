<?php

namespace App\Http\Controllers;
use App\User;
use App\Jornada;
use App\userJornada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use Carbon\Carbon;
use Calendar;

class UserJornadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function modificarHorario($id, $start, $end){
       
        
        $horario = userJornada::find($id);
        $horario->fecha_entrada = $start;
        $horario->fecha_salida = $end;
        $horario->save();

        return json_encode($horario);
    }
    public function modificarAjax($id, $id_user, $id_jornada, $fecha_entrada, $color){

        $fechaFormat = Carbon::createFromFormat('Y-m-d', $fecha_entrada);

       $horario = userJornada::find($id);
       $horario->id_user = $id_user;
       $horario->id_jornada = $id_jornada;
       $horario->fecha_entrada = date_format($fechaFormat, 'Y-m-d');
       $horario->color = '#'.$color;

         $jornada = Jornada::find($id_jornada);
         $fecha = new \DateTime($fecha_entrada.$jornada->hora_entrada);
         $duracion = $jornada->duracion_hora.' '.$jornada->duracion_minuto;
         $fecha->modify($duracion);
         $fecha->format('d-m-Y H:i:s');
         $fecha = date_format($fecha, 'Y-m-d');
         $horario->fecha_salida = $fecha;

     
      $horario->save();

        return json_encode($horario);
    }
    

    public function index()
    {
        $users = DB::table('users')
                             ->where('id_type',1,2)

                             ->select('users.*')
                             ->orderBy('id')
                             ->pluck('rut','id');
        $jornadas = DB::table('jornadas')
                        ->select(DB::raw("id,CONCAT(hora_entrada,' / ',hora_salida,' / ',duracion_hora) as horario"))
                        ->orderBy('id')
                        ->pluck('horario','id');
        
        $horarios = Jornada::join('users_jornadas', 'users_jornadas.id_jornada', '=', 'jornadas.id' )
                    ->join('users', 'users.id', '=', 'users_jornadas.id_user')
                    ->select('users_jornadas.*','users.nombre','users.apellido','users.id as user_id','jornadas.hora_entrada','jornadas.hora_salida','jornadas.duracion_hora','jornadas.duracion_minuto','jornadas.id as jornada_id')
                    ->orderBy('id')
                    ->get();

        $horariosPaginados = Jornada::join('users_jornadas', 'users_jornadas.id_jornada', '=', 'jornadas.id' )
                    ->join('users', 'users.id', '=', 'users_jornadas.id_user')
                    ->select('users_jornadas.*','users.nombre','users.apellido','jornadas.hora_entrada','jornadas.hora_salida','jornadas.duracion_hora','jornadas.duracion_minuto')
                    ->orderBy('id')
                    ->paginate(5);

        $events = [];
        if($horarios->count()) {
            foreach ($horarios as $key => $value) {

                $events[] = Calendar::event(
                    $value->nombre,
                    false,
                    new \DateTime($value->fecha_entrada. $value->hora_entrada),
                    new \DateTime($value->fecha_salida. $value->hora_salida),
                    $value->id,
                    // Add color and link on event
                    [
                        'user_id' => $value->user_id,
                        'jornada_id' => $value->jornada_id,
                        'fecha_entrada' => $value->fecha_entrada,
                        'color' => $value->color,
                        'url' => route('usersjornadas.edit', $value->id) ,
                    ]
                )
                ;
            }
        }
        $calendar = new Calendar;
        $calendar = Calendar::addEvents($events)
                            ->setId('my-calendar')
                            ->setOptions(['firstDay' => 1, 
                                             'navLinks'=> true, 
                                             'selectable'=> true,
                                             'editable'=> true,

                            ])

                            ->setCallbacks([

                                'eventClick' => 'function(event) {
                                   
                                    console.log($("#calendar").fullCalendar("option", "locale"));
                                     $("#id").val(event.id);
                                     $("#id_user").val(event.user_id);
                                     $("#id_jornada").val(event.jornada_id);
                                     $("#fecha_entrada").val(event.fecha_entrada);
                                     $("#color").val(event.color);
                               //      $("#calendarModal").modal("show");

                                     $("#guardar").click(function() { 
                                        var id = $("#id").val();
                                        var id_user = $("#id_user").val();
                                        var id_jornada = $("#id_jornada").val();
                                        var fecha_entrada = $("#fecha_entrada").val();
                                        var color = $("#color").val();

                                       

                                    //    console.log(id,id_user);
                                        var url = "modificar_ajax/"+id+"/"+id_user+"/"+id_jornada+"/"+fecha_entrada+"/"+color.split("#")[1]+"";
                                    //    console.log(url);
                                        $.get(url,function(resul){
                                            
                                            var datos= jQuery.parseJSON(resul);
                                        //  console.log(datos);
                                        })
                                      

                                        $("#calendarModal").modal("toggle");
                               
                                    
                                    })


                                }',



                                'dayClick' => 'function(date, jsEvent, view) {
                                    console.log(date);
                                    $("#modalTitle").text(date.format());
                                //    $("#calendarModal").modal("show");
                                }',



                                'eventDrop' => 'function(event, delta, revertFunc) {
                          
                                    var url = "usersjornadas/modificar_horario/"+event.id+"/"+moment(event.start._d).format("YYYY-MM-DD")+"/"+moment(event.end._d).format("YYYY-MM-DD")+"";
                                    var box = confirm("Estas seguro de modificar el horario?");
                                    if (box === true) {
                                        $.get(url,function(resul){
                                            var datos= jQuery.parseJSON(resul);
                                        //    console.log("resultado",datos);

                                        })
                                    }else{
                                        revertFunc();
                                    }
                                }',

                            ]);
        


        return view('userjornada.index', compact('horarios','calendar'))->with('horariosPaginados', $horariosPaginados)->with('users', $users)->with('jornadas', $jornadas);
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $users= DB::table('users')
                     ->where('id_type',1)
                     ->orWhere('id_type',2)
                     ->select('users.*')
                     ->orderBy('id')
                     ->get();

        $jornadas = DB::table('jornadas')
                        ->select(DB::raw("id,CONCAT(hora_entrada,' / ',hora_salida,' / ',duracion_hora) as horario"))
                        ->orderBy('id')
                        ->pluck('horario','id');
       
        return view('userjornada.create')->with('users',$users)->with('jornadas',$jornadas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    //    dd($request->all());
        $numeroDias = $this->numeroDia($request->get('diasNuevos'));
        
    //    $dia = date("w",strtotime($request->get('fecha_inicio')))  ; //obtendo el dia de la semana en numero domingo=0

        $fechaEmision = Carbon::parse($request->get('fecha_inicio'));
        $fechaExpiracion = Carbon::parse($request->get('fecha_termino'));
    
        $dif = $fechaExpiracion->diffInDays($fechaEmision);
        while ($dif >= 0) {
            
            foreach ($numeroDias as $key => $dia) {
               if ($dia == date("w",strtotime($fechaEmision))) {

                    $jornada = Jornada::find($request->id_jornada[$key]);

                    $horarios = new userJornada();
            //        $fecha = Carbon::createFromFormat('Y-m-d H', $fechaEmision.$jornada->hora_entrada);
                    $fecha = Carbon::createFromFormat('Y-m-d H:i:s', $fechaEmision->format('Y-m-d').' '.$jornada->hora_entrada);

                    $duracion = $jornada->duracion_hora.' '.$jornada->duracion_minuto;
                    $fecha->modify($duracion);
                    $fecha->format('d-m-Y H:i:s');
                    $fecha = date_format($fecha, 'Y-m-d');

                    $horarios->id_user = $request->id_user;
                    $horarios->color = $request->color;
                    $horarios->fecha_entrada = $fechaEmision;
                    $horarios->id_jornada = $request->id_jornada[$key];
                    $horarios->fecha_salida = $fecha;

                    $horarios->save();
               }
            }
            $fechaEmision->addDay(1);
            $dif--;
           
        }
        
        Session::flash('message', 'El horario se asigno exitosamente.');
        return redirect(route('usersjornadas.index'));
    }

     public function numeroDia($dias)
    {
        $numeroDia =[];
        foreach ($dias as $key => $dia) {
            if($dia=='Lunes'){
                $numeroDia[] = 1;
            }
            if ($dia=='Martes') {
                $numeroDia[] = 2;
            }
            if ($dia=='Miercoles') {
                $numeroDia[] = 3;
            }
            if ($dia=='Jueves') {
                $numeroDia[] = 4;
            }
            if ($dia=='Viernes') {
                $numeroDia[] = 5;
            }
            if ($dia=='Sabado') {
                $numeroDia[] = 6;
            }
            if ($dia=='Domingo') {
                $numeroDia[] = 0;
            }
        }
        return $numeroDia;
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
        $userjornada = userJornada::join('jornadas', 'users_jornadas.id_jornada','=', 'jornadas.id'  )
                    ->join('users', 'users.id', '=', 'users_jornadas.id_user')
                    ->select('users_jornadas.*','users.rut',DB::raw("CONCAT(jornadas.hora_entrada,' / ',jornadas.hora_salida,' / ',jornadas.duracion_hora) as horario"))
                  
                    ->find($id);
               
        $users = DB::table('users')
                        ->where('id_type',1)
                        ->orWhere('id_type',2)
                             ->select('users.*')
                             ->orderBy('id')
                             ->pluck('rut','id');

        $jornadas = DB::table('jornadas')
                        ->select(DB::raw("id,CONCAT(hora_entrada,' / ',hora_salida,' / ',duracion_hora) as horario"))
                        ->orderBy('id')
                        ->pluck('horario','id');



        return view('userjornada.edit')->with('userjornada', $userjornada)->with('users', $users)->with('jornadas', $jornadas);
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

         $userjornada = userJornada::find($id);
         $userjornada->id_user = $request->id_user;
         $userjornada->id_jornada = $request->id_jornada;
         $userjornada->fecha_entrada = $request->fecha_entrada;
         $userjornada->color = $request->color;
         
         $jornada = Jornada::find($userjornada->id_jornada);
         $fecha = new \DateTime($request->fecha_entrada.$jornada->hora_entrada);
         $duracion = $request->duracion_hora.' '.$request->duracion_minuto;
         $fecha->modify($duracion);
         $fecha->format('d-m-Y H:i:s');
         $fecha = date_format($fecha, 'Y-m-d');
         $userjornada->fecha_salida = $fecha;
         
         
         $userjornada->save();
         Session::flash('message', "Se ha modificado Exitosamente!");
        return redirect()->route('usersjornadas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userjornada = userJornada::find($id);
        $userjornada->delete();  

        Session::flash('message', "Se ha eliminado Exitosamente!");
        return redirect(route('usersjornadas.index'));
    }

   
}
