<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\HabitacionInsumo;
use Illuminate\Support\Facades\Session;
class HabitacionInsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limpieza = HabitacionInsumo::num2($request->get('numero_habitacion'))
                        ->join('insumos','insumos.id','=','habitaciones_insumos.id_insumo')
                        ->join('habitaciones','habitaciones.id','=','habitaciones_insumos.id_habitacion')
                        ->select('habitaciones_insumos.*','habitaciones.numero_habitacion','insumos.nombre')
                        ->orderBy('habitaciones_insumos.id','ASC')
                        ->paginate(5);
        

        return view('habitacionesinsumos.index')->with('limpieza', $limpieza);
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id_habitacion=$request->all();
        $key = array_keys($id_habitacion); //da vuelta el array ?             
                            
        $habitaciones = DB::table('habitaciones')
                            ->orderBy('id')
                            ->pluck('numero_habitacion','id');

        $insumos = DB::table('insumos')
                        ->orderBy('id')
                        ->pluck('nombre','id');

        return view('habitacionesinsumos.create')->with('habitaciones',$habitaciones)->with('insumos',$insumos)->with('key',$key);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cont=0;
        $id = $request->get('id_habitacion');
        $id_insumo = $request->get('id_insumo');
        $cantidad = $request->get('cantidad');  
        $observacion = $request->get('observacion');
       
        while ($cont<count($request->get('id_insumo'))) {

            $habitacioninsumo = new HabitacionInsumo;

            $habitacioninsumo->id_habitacion= $id;
            $habitacioninsumo->id_insumo=$id_insumo[$cont];
            $habitacioninsumo->cantidad=$cantidad[$cont];
            $habitacioninsumo->observacion=$observacion[$cont];
            $habitacioninsumo->save();
            $cont=$cont+1;
        }

        Session::flash('message', "Se ha registrado Exitosamente!");
            return redirect(route('habitacionesinsumos.index'));
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
