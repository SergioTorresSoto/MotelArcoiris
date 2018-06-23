<?php

namespace App\Http\Controllers;
use App\User;
use App\Jornada;
use App\userJornada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class UserJornadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $horarios = Jornada::join('users_jornadas', 'users_jornadas.id_jornada', '=', 'jornadas.id' )
                    ->join('users', 'users.id', '=', 'users_jornadas.id_user')
                    ->select('users_jornadas.*','users.nombre','users.apellido','jornadas.hora_entrada','jornadas.hora_salida','jornadas.duracion_hora','jornadas.duracion_minuto')
                    ->get();

        

        return view('userjornada.index', compact('horarios'));
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        $users= DB::table('users')
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
        $jornada = Jornada::find($request->id_jornada);

        $horarios = new userJornada($request->all());
        $fecha = new \DateTime($request->fecha_entrada.$jornada->hora_entrada);

        $duracion = $jornada->duracion_hora.' '.$jornada->duracion_minuto;
        $fecha->modify($duracion);
        $fecha->format('d-m-Y H:i:s');
        $fecha = date_format($fecha, 'Y-m-d');
        
        $horarios->fecha_salida = $fecha;
        $horarios->save();
         Session::flash('message', 'El horario se asigno exitosamente.');
         return redirect(route('usersjornadas.index'));
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
