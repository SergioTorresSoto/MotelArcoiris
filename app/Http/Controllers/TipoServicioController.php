<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoServicio;
use Illuminate\Support\Facades\Session;

class TipoServicioController extends Controller
{
       public function index()
    {

        $tipo_servicio = TipoServicio::orderBy('id','ASC')->paginate(5);
        
        
        return view('tiposervicio.index')->with('tipo_servicio', $tipo_servicio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tiposervicio.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_servicio = new TipoServicio($request->all());
        
        $tipo_servicio->save();
        Session::flash('message_success', "Se ha registrado el tipo $tipo_servicio->tipo Exitosamente!");
            return redirect(route('tiposervicio.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show($tipo_servicio)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function edit($tipo_servicio)
    {
        $tipo_servicio = TipoServicio::find($tipo_servicio);
        return view('tiposervicio.edit')->with('tipo_servicio', $tipo_servicio);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$tipo_servicio)
    {
        $tipo_servicio = TipoServicio::find($tipo_servicio);
        $tipo_servicio->tipo = $request->tipo;
        $tipo_servicio->save();
        return redirect()->route('tiposervicio.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipo_servicio)
    {
        $tipo_servicio = TipoServicio::find($tipo_servicio);
        $tipo_servicio->delete();    
        Session::flash('message_danger', "Se ha eliminado el usuario $tipo_servicio->tipo Exitosamente!");
        return redirect(route('tiposervicio.index'));
    }
}
