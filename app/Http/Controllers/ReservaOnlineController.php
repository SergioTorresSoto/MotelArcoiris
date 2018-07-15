<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoHabitacion;
use App\Habitacion;
use DB;
use Carbon\Carbon;
class ReservaOnlineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('reservaonline.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipo_habitacion= DB::table('tipo_habitaciones')
                     ->orderBy('id')
                     ->pluck('tipo','id');

         $horas= DB::table('tarifas')
                     ->distinct('horas')
                     ->pluck('horas','id');
        return view('reservaonline.create')->with('tipo_habitacion', $tipo_habitacion)->with('horas', $horas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function consulta(){
        return back();
    }

     public function consultaPost(){

        $input = request()->all();
        $fecha = $input['fecha'];
        $fin = new Carbon($fecha);
        $fin->addHour($input['horas']);
        $reservas = DB::table('usuarios_habitaciones')
                //      ->join('habitaciones','habitaciones.id','=','usuarios_habitaciones.id_habitacion')
                        ->whereBetween('usuarios_habitaciones.tiempo_inicio',[$fecha,$fin])  
                        ->orWhereBetween('usuarios_habitaciones.tiempo_fin',[$fecha,$fin]) 
                //      ->where('habitaciones.id_tipo_habitacion',$input['id_tipo'])
                //      ->select('habitaciones.*')
                        ->get();
        $contador = count($reservas);

        $habitaciones = Habitacion::where('habitaciones.id_tipo_habitacion',$input['id_tipo'])
                            ->get();
        foreach ($reservas as  $reserva) {
            foreach ($habitaciones as $key => $habitacion) {
                if($reserva->id_habitacion == $habitacion->id){
                    $habitaciones->forget($key);
                }
            }
        }
        
        return response()->json(['input'=>$habitaciones]);
    }
}
