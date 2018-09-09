<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarifa;
use DB;
use Illuminate\Support\Facades\Session;
class TarifaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarifas =DB::table('tarifas')
                        ->join('tipo_habitaciones','tipo_habitaciones.id','=','tarifas.id_tipo')
                        ->select('tipo_habitaciones.tipo','tarifas.*')
                        ->get();

        return view('tarifas.index')->with('tarifas', $tarifas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista_tipo= DB::table('tipo_habitaciones')
                     ->orderBy('id')
                     ->pluck('tipo','id');
        

        return view('tarifas.create')->with('lista_tipo',$lista_tipo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tarifa = new Tarifa($request->all());
      
        $tarifa->save();
        return redirect(route('tarifas.index'));
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
        $lista_tipo= DB::table('tipo_habitaciones')
                     ->orderBy('id')
                     ->pluck('tipo','id');
        
        $tarifa = Tarifa::find($id);

        return view('tarifas.edit')->with('lista_tipo',$lista_tipo)->with('tarifa',$tarifa);
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
        $tarifa = Tarifa::find($id);
        $tarifa->id_tipo = $request->id_tipo;
        $tarifa->horas = $request->horas;
        $tarifa->precio = $request->precio;
        $tarifa->save();

        Session::flash('message', "Se ha modificadola tarifa Exitosamente!");
        return redirect()->route('tarifas.index');
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
