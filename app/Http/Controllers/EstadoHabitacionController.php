<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EstadoHabitacion;
use Illuminate\Support\Facades\Session;


class EstadoHabitacionController extends Controller
{
    public function index()
    {

        $estado_habitacion = EstadoHabitacion::orderBy('id','ASC')->paginate(5);
        
        
        return view('estadohabitacion.index')->with('estado_habitacion', $estado_habitacion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estadohabitacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $estado_habitacion = new EstadoHabitacion($request->all());
        $estado_habitacion->estilo = 'width: 70px; height: 30px; text-align: center; padding: 6px 0; font-size: 12px; line-height: 1.428571429; border-radius: 15px; color:#ffffff; background-color:'.$request->color.';';
        $estado_habitacion->save();
        Session::flash('message_success', "Se ha registrado el estado $estado_habitacion->estado Exitosamente!");

            return redirect(route('estadohabitacion.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show($estado_habitacion)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function edit($estado_habitacion)
    {
        $estado_habitacion = EstadoHabitacion::find($estado_habitacion);
        return view('estadohabitacion.edit')->with('estado_habitacion', $estado_habitacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$estado_habitacion)
    {
        $estado_habitacion = EstadoHabitacion::find($estado_habitacion);
        $estado_habitacion->estado = $request->estado;
        $estado_habitacion->color = $request->color;
        $estado_habitacion->estilo = 'width: 70px; height: 30px; text-align: center; padding: 6px 0; font-size: 12px; line-height: 1.428571429; border-radius: 15px; color:#ffffff; background-color:'.$request->color.';';
        $estado_habitacion->save();
        return redirect()->route('estadohabitacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy($estado_habitacion)
    {
        $estado_habitacion = EstadoHabitacion::find($estado_habitacion);
        $estado_habitacion->delete();    
        Session::flash('message_danger', "Se ha eliminado el estado $estado_habitacion->estado Exitosamente!");
        return redirect(route('estadohabitacion.index'));
    }
}
