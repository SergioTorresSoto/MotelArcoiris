<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipoInsumo;
use Illuminate\Support\Facades\Session;

class TipoInsumoController extends Controller
{
    public function index()
    {

        $tipo_insumo = TipoInsumo::orderBy('id','ASC')->paginate(5);
        
        
        return view('tipoinsumo.index')->with('tipo_insumo', $tipo_insumo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoinsumo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_insumo = new TipoInsumo($request->all());
        
        $tipo_insumo->save();
        Session::flash('message_success', "Se ha registrado el tipo $tipo_insumo->tipo Exitosamente!");
            return redirect(route('tipoinsumo.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show($tipo_insumo)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function edit($tipo_insumo)
    {
        $tipo_insumo = TipoInsumo::find($tipo_insumo);
        return view('tipoinsumo.edit')->with('tipo_insumo', $tipo_insumo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$tipo_insumo)
    {
        $tipo_insumo = TipoInsumo::find($tipo_insumo);
        $tipo_insumo->tipo = $request->tipo;
        $tipo_insumo->save();
        return redirect()->route('tipoinsumo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipo_insumo)
    {
        $tipo_insumo = TipoInsumo::find($tipo_insumo);
        $tipo_insumo->delete();    
        Session::flash('message_danger', "Se ha eliminado el tipo $tipo_insumo->tipo Exitosamente!");
        return redirect(route('tipoinsumo.index'));
    }
}
