<?php

namespace App\Http\Controllers;

use App\controlHorario;
use App\User;
use Calendar;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Facades\Auth;

class ControlHorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $control =  DB::table('control_horario')
                  ->leftJoin('users', 'users.rut', '=', 'control_horario.rut' )
                  ->select('control_horario.*','users.nombre')
                  ->orderBy('control_horario.id','ASC')
                  ->paginate(5);

        // calendario
        $events = [];
        if($control->count()) {
            foreach ($control as $key => $value) {

                $events[] = Calendar::event(
                    $value->nombre,
                    false,
                    new \DateTime($value->fecha_entrada. $value->hora_entrada),
                    new \DateTime($value->fecha_salida. $value->hora_salida),
                    null,
                    // Add color and link on event
                    [
                        'color' => '#800',
                        'url' => route('controlhorario.edit', $value->id) ,
                    ]
                )
                ;
            }
        }
        $calendar = Calendar::addEvents($events)
                            ->setOptions(['firstDay' => 1]);

        $control->calendar = $calendar;
        
        
        return view('controlhorario.index', compact('calendar'))->with('control', $control);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $control = DB::table('control_horario')
                  ->orderBy('control_horario.id','ASC')
                  ->get();
        
        
            return view('controlhorario.create')->with('control',$control);    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $control = $request->all();

        $lista_control = DB::table('control_horario')
                        ->leftJoin('users', 'users.rut', '=', 'control_horario.rut' )
                        ->select('control_horario.*','users.nombre')
                        ->orderBy('control_horario.id','ASC')
                        ->get();
        
        $aux=0;
        foreach($lista_control as $lista){
            $rut1=$lista->rut;
            if($control['rut']==$rut1){

                if(is_null($lista->hora_salida)){

                    $aux=1;
                    $horaYfecha = new \DateTime();
                    $hora_salida = $horaYfecha->format('H:i:s');
                    $fecha_salida = $horaYfecha->format('Y-m-d');

                    DB::table('control_horario')
                            ->where('control_horario.id', $lista->id)
                            ->update(['hora_salida' => $hora_salida ,'fecha_salida' => $fecha_salida]);
                    Session::flash('message', "Se ha registrado la hora de salida Exitosamente!");
                }

            }
        }
        if($aux==0 || empty($lista_control)){

            $id = Auth::id();
            $control['id_user'] = $id;
            $horaYfecha = new \DateTime();
            $control['hora_entrada'] = $horaYfecha->format('H:i:s');           
            $control['fecha_entrada'] = $horaYfecha->format('Y-m-d');            
            $control_horario = new controlHorario($control);              
            $control_horario->save();
            Session::flash('message', "Se ha registrado la hora de entrada Exitosamente!");
        }

    return redirect(route('controlhorario.index'));
        
       

        
    //  Session::flash('message_success', "Se ha registrado el tipo $users_type->type Exitosamente!");

        
    /*

        $control_horario = new controlHorario($request->all());
        
        
        $control_horario->save();
        Session::flash('message_success', "Se ha registrado el usuario $control->rut Exitosamente!");
         return redirect(route('controlhorario.index'));
    */
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
        $control = controlHorario::find($id);
        $control->lista_users= DB::table('users')
                     ->orderBy('id')
                     ->pluck('rut','id')
                     ->toArray();

        return view('controlhorario.edit')->with('control', $control);
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
        $control = controlHorario::find($id);
        
        $control->hora_entrada = $request->hora_entrada;
        $control->hora_salida = $request->hora_salida;
        $control->fecha_entrada = $request->fecha_entrada;
        $control->fecha_salida = $request->fecha_salida;

        $lista_users = DB::table('users')
                        ->orderBy('users.id','ASC')
                        ->get();
        foreach($lista_users as $user){
            if($user->id == $request->rut){
                $control->rut = $user->rut;
            }
        }
        
        $control->save();
        Session::flash('message', "Se ha modificado el usuario $control->rut Exitosamente!");
        return redirect(route('controlhorario.index'));   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $control_horario = controlHorario::find($id);

        $control_horario->delete();    
        Session::flash('message', "Se ha eliminado el usuario $control_horario->rut Exitosamente!");
        return redirect(route('controlhorario.index'));
    }
}
