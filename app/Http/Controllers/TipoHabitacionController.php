<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoHabitacion;
use Illuminate\Support\Facades\Session;


class TipoHabitacionController extends Controller
{
    public function index()
    {

        $tipo_habitacion = TipoHabitacion::orderBy('id','ASC')->paginate(5);
        
        
        return view('tipohabitacion.index')->with('tipo_habitacion', $tipo_habitacion);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipohabitacion.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_habitacion = new TipoHabitacion($request->all());
        
        $tipo_habitacion->save();
        Session::flash('message_success', "Se ha registrado el tipo $tipo_habitacion->tipo Exitosamente!");
            return redirect(route('tipohabitacion.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show($tipo_habitacion)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function edit($tipo_habitacion)
    {
        $tipo_habitacion = TipoHabitacion::find($tipo_habitacion);
        return view('tipohabitacion.edit')->with('tipo_habitacion', $tipo_habitacion);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$tipo_habitacion)
    {
        $tipo_habitacion = TipoHabitacion::find($tipo_habitacion);
        $tipo_habitacion->tipo = $request->tipo;
        $tipo_habitacion->save();
        return redirect()->route('tipohabitacion.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipo_habitacion)
    {
        $tipo_habitacion = TipoHabitacion::find($tipo_habitacion);
        $tipo_habitacion->delete();    
        Session::flash('message_danger', "Se ha eliminado el tipo $tipo_habitacion->tipo Exitosamente!");
        return redirect(route('tipohabitacion.index'));
    }
}
