<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Insumo;
use App\TipoInsumo;
use DB;


class InsumoController extends Controller
{
     public function index(Request $request)
    {
        

        $insumos =  Insumo::nombreins($request->get('nombre'))
                  ->tipoins($request->get('tipo'))
                  ->join('tipo_insumos', 'tipo_insumos.id', '=', 'insumos.id_tipo_insumo' )
                  ->select('insumos.*','tipo_insumos.tipo')
                  ->orderBy('insumos.id','ASC')
                  ->paginate(5);

        $insumos->lista_tipo = DB::table('tipo_insumos')
                     ->orderBy('id')
                     ->pluck('tipo','id');
        
        return view('insumos.index')->with('insumos', $insumos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista_tipo= DB::table('tipo_insumos')
                     ->orderBy('id')
                     ->pluck('tipo','id');
        

        return view('insumos.create')->with('lista_tipo',$lista_tipo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $insumos = new Insumo($request->all());


        
        $insumos->save();
        Session::flash('message', "Se ha registrado el producto $insumos->nombre Exitosamente!");
         return redirect(route('insumos.index'));
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

        $insumos = Insumo::find($id);
        $insumos->lista_tipo= DB::table('tipo_insumos')
                     ->orderBy('id')
                     ->pluck('tipo','id');
                     

        return view('insumos.edit')->with('insumos', $insumos);
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

        $insumos = Insumo::find($id);
        

        
        $insumos->nombre = $request->nombre;
        $insumos->descripcion= $request->descripcion;
        $insumos->observacion = $request->observacion;
        $insumos->stock = $request->stock;
        $insumos->id_tipo_insumo = $request->id_tipo_insumo;
        
        $insumos->save();
   
        Session::flash('message', "Se ha modificado el insumo $insumos->nombre Exitosamente!");
        return redirect(route('insumos.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $insumos = Insumo::find($id);

        $insumos->delete();    
        Session::flash('message', "Se ha eliminado el insumo $insumos->nombre Exitosamente!");
        return redirect(route('insumos.index'));
    }
}
