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
                    ->select('users_jornadas.*','users.nombre','users.apellido','jornadas.hora_entrada','jornadas.hora_salida','jornadas.duracion')
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
                        ->select('jornadas.*')
                        ->orderBy('id')
                        ->get();
                  
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
        
        $fecha->modify($jornada->duracion);
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
}
