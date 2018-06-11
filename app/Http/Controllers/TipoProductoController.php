<?php

namespace App\Http\Controllers;

use App\tipoProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TipoProductoController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tipo_producto = tipoProducto::orderBy('id','ASC')->paginate(5);
        
        
        return view('tipoproducto.index')->with('tipo_producto', $tipo_producto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipoproducto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_producto = new tipoProducto($request->all());
        
        $tipo_producto->save();
        Session::flash('message_success', "Se ha registrado el tipo $tipo_producto->tipo Exitosamente!");
            return redirect(route('tipoproducto.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show($tipo_producto)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function edit($tipo_producto)
    {
        $tipo_producto = tipoProducto::find($tipo_producto);
        return view('tipoproducto.edit')->with('tipo_producto', $tipo_producto);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$tipo_producto)
    {
        $tipo_producto = tipoProducto::find($tipo_producto);
        $tipo_producto->tipo = $request->tipo;
        $tipo_producto->save();
        return redirect()->route('tipoproducto.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy($tipo_producto)
    {
        $tipo_producto = tipoProducto::find($tipo_producto);
        $tipo_producto->delete();    
        Session::flash('message_danger', "Se ha eliminado el usuario $tipo_producto->tipo Exitosamente!");
        return redirect(route('tipoproducto.index'));
    }
}
