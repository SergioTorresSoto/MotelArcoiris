<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Habitacion;
use App\TipoHabitacion;
use App\EstadoHabitacion;
use DB;

class HabitacionController extends Controller
{
    public function index()
    {
        

        $habitacion =  DB::table('habitaciones')

                  ->join('tipo_habitaciones', 'tipo_habitaciones.id', '=', 'habitaciones.id_tipo_habitacion' )
                  ->join('estado_habitaciones', 'estado_habitaciones.id', '=', 'habitaciones.id_estado_habitacion' )
                  ->select('habitaciones.*','tipo_habitaciones.tipo','estado_habitaciones.estado')
                  ->orderBy('habitaciones.id','ASC')
                  ->paginate(5);

        
        return view('habitaciones.index')->with('habitacion', $habitacion);
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
        $lista_estado= DB::table('estado_habitaciones')
                     ->orderBy('id')
                     ->pluck('estado','id');             
        

        return view('habitaciones.create')->with('lista_tipo',$lista_tipo)->with('lista_estado',$lista_estado);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $habitacion = new Habitacion($request->all());

        if($request->hasFile('imagen')){
    	

    	$habitacion->imagen = $request->file('imagen')->store('public/habitaciones');
        }
       
        
        $habitacion->save();
        Session::flash('message', "Se ha registrado la habitacion $habitacion->numero_habitacion Exitosamente!");
         return redirect(route('habitaciones.index'));
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

        $habitacion = Habitacion::find($id);
        $habitacion->lista_tipo = DB::table('tipo_habitaciones')
                     ->orderBy('id')
                     ->pluck('tipo','id');
        $habitacion->lista_estado = DB::table('estado_habitaciones')
                     ->orderBy('id')
                     ->pluck('estado','id');             
                     

        return view('habitaciones.edit')->with('habitacion', $habitacion);
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

        $habitacion = habitacion::find($id);
        
        if($request->hasFile('imagen')){
    	

    	$habitacion->imagen = $request->file('imagen')->store('public/habitaciones');
        }
        
        $habitacion->numero_habitacion = $request->numero_habitacion;
        $habitacion->descripcion= $request->descripcion;
        $habitacion->observacion = $request->observacion;
        $habitacion->id_tipo_habitacion = $request->id_tipo_habitacion;
        $habitacion->id_estado_habitacion = $request->id_estado_habitacion;
        
        $habitacion->save();
   
        Session::flash('message', "Se ha modificado la habitacion $habitacion->numero_habitacion Exitosamente!");
        return redirect(route('habitaciones.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $habitacion = Habitacion::find($id);

        $habitacion->delete();    
        Session::flash('message', "Se ha eliminado la habitacion $habitacion->numero_habitacion Exitosamente!");
        return redirect(route('habitaciones.index'));
    }
}
