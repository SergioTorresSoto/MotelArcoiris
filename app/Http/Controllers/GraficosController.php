<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UsuarioHabitacion;
use App\Habitacion;

use App\proveedorInsumo;
use App\Insumo;
use App\Proveedor;
class GraficosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getUltimoDiaMes($elAnio,$elMes) {
     return date("d",(mktime(0,0,0,$elMes+1,1,$elAnio)-1));
    }

    public function registros_mes($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
// todas las reservas        
        $reservas=UsuarioHabitacion::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($reservas);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($reservas as $reserva){
            $diasel=intval(date("d",strtotime($reserva->created_at) ) );
            $registros[$diasel]++;    
        }
//fin todas las reservas

//si es online
        $onlines=UsuarioHabitacion::whereBetween('created_at', [$fecha_inicial,  $fecha_final])
                        ->where('es_online',true)
                        ->get();
        $ct=count($onlines);

        for($d=1;$d<=$ultimo_dia;$d++){
            $esOnline[$d]=0;     
        }

        foreach($onlines as $online){
            $diasel=intval(date("d",strtotime($online->created_at) ) );
            $esOnline[$diasel]++;    
        }

//fin sin es online

//si es presencial
        $presenciales=UsuarioHabitacion::whereBetween('created_at', [$fecha_inicial,  $fecha_final])
                        ->where('es_online',false)
                        ->get();
        $ct=count($presenciales);

        for($d=1;$d<=$ultimo_dia;$d++){
            $esPresencial[$d]=0;     
        }

        foreach($presenciales as $presencial){
            $diasel=intval(date("d",strtotime($presencial->created_at) ) );
            $esPresencial[$diasel]++;    
        }

//fin sin presencial

        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros, "esOnline" =>$esOnline , "esPresencial" =>$esPresencial);
        return   json_encode($data);
    }
    public function registros_anio($anio)
    {
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-01-01") );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-12-31") );

        $reservas=UsuarioHabitacion::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $contReservas=count($reservas);

        for($d=1;$d<=12;$d++){
            $reservaCont[$d]=0;     
        }

        foreach($reservas as $reserva) {
            $aniosel=intval(date("m",strtotime($reserva->created_at) ) );
            $reservaCont[$aniosel]++; 
        }
//si es Online
        $enlinea=UsuarioHabitacion::whereBetween('created_at', [$fecha_inicial,  $fecha_final])
                        ->where('es_online',true)
                        ->get();
        $ct=count($enlinea);

        for($d=1;$d<=12;$d++){
            $esOnline[$d]=0;     
        }

        foreach($enlinea as $linea){
            $diasel=intval(date("m",strtotime($linea->created_at) ) );
            $esOnline[$diasel]++;    
        }

//si es presencial
        $presenciales=UsuarioHabitacion::whereBetween('created_at', [$fecha_inicial,  $fecha_final])
                        ->where('es_online',false)
                        ->get();
        $ct=count($presenciales);

        for($d=1;$d<=12;$d++){
            $esPresencial[$d]=0;     
        }

        foreach($presenciales as $presencial){
            $diasel=intval(date("m",strtotime($presencial->created_at) ) );
            $esPresencial[$diasel]++;    
        }

        $data=array("reservas"=>$reservaCont, "presencial" => $esPresencial, "online" => $esOnline);
        return   json_encode($data);
    }

    public function total_publicaciones($anio,$mes){

         $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );

        $habitaciones=Habitacion::all();
        $ctp=count($habitaciones);
        $reservas=UsuarioHabitacion::whereBetween('created_at', [$fecha_inicial,  $fecha_final])
                        ->get();
;
        $ct =count($reservas);
        
        for($i=0;$i<=$ctp-1;$i++){
         $idTP=$habitaciones[$i]->id;
         $numeroReservas[$idTP]=0;
        }

        for($i=0;$i<=$ct-1;$i++){
         $idTP=$reservas[$i]->id_habitacion;
         $numeroReservas[$idTP]++;
           
        }

        $data=array("totalHabitaciones"=>$ctp,"habitaciones"=>$habitaciones, "numeroReservas"=>$numeroReservas);
        return json_encode($data);
    }

    public function total_publicaciones_anios($anio){

      
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-01-01") );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-12-31") );

        $reservas=UsuarioHabitacion::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $contReservas=count($reservas);

        $habitaciones=Habitacion::all();
        $ctp=count($habitaciones);

        $ct =count($reservas);
        
        for($i=0;$i<=$ctp-1;$i++){
         $idTP=$habitaciones[$i]->id;
         $numeroReservas[$idTP]=0;
        }

        for($i=0;$i<=$ct-1;$i++){
         $idTP=$reservas[$i]->id_habitacion;
         $numeroReservas[$idTP]++;
           
        }

        $data=array("totalHabitaciones"=>$ctp,"habitaciones"=>$habitaciones, "numeroReservas"=>$numeroReservas);
        return json_encode($data);
    }

    public function reserva()
    {
        $anio=date("Y");
        $mes=date("m");
        return view('grafico.reservas')
               ->with("anio",$anio)
               ->with("mes",$mes);
        
    }
    public function compraInsumosMensual($anio,$mes)
    {
        $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );
// todas las reservas        
        $compras=proveedorInsumo::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $ct=count($compras);

        for($d=1;$d<=$ultimo_dia;$d++){
            $registros[$d]=0;     
        }

        foreach($compras as $compra){
            $diasel=intval(date("d",strtotime($compra->created_at) ) );
            $registros[$diasel] = $compra->precio_total + $registros[$diasel];   
        }
//fin todas las compras



        $data=array("totaldias"=>$ultimo_dia, "registrosdia" =>$registros);
        return   json_encode($data);
    }

    public function numeroComprasMensual($anio,$mes){

         $primer_dia=1;
        $ultimo_dia=$this->getUltimoDiaMes($anio,$mes);
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$primer_dia) );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-".$mes."-".$ultimo_dia) );

        $insumos=Insumo::all();
        $ctp=count($insumos);
        $compras=proveedorInsumo::whereBetween('created_at', [$fecha_inicial,  $fecha_final])
                        ->get();

        $ct =count($compras);
        
        for($i=0;$i<=$ctp-1;$i++){
         $idTP=$insumos[$i]->id;
         $numeroCompras[$idTP]=0;
        }

        for($i=0;$i<=$ct-1;$i++){
         $idTP=$compras[$i]->id_insumo;
         $numeroCompras[$idTP]++;
           
        }

        $data=array("totalInsumos"=>$ctp,"insumos"=>$insumos, "numeroCompras"=>$numeroCompras);
        return json_encode($data);
    }

     public function compraInsumosAnual($anio)
    {
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-01-01") );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-12-31") );

        $compras=proveedorInsumo::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $contReservas=count($compras);

        for($d=1;$d<=12;$d++){
            $compraCont[$d]=0;     
        }

        foreach($compras as $compra) {
            $aniosel=intval(date("m",strtotime($compra->created_at) ) );
            $compraCont[$aniosel]= $compra->precio_total + $compraCont[$aniosel]; 
        }


        $data=array("compras"=>$compraCont);
        return   json_encode($data);
    }

    public function numeroComprasAnual($anio){

      
        $fecha_inicial=date("Y-m-d H:i:s", strtotime($anio."-01-01") );
        $fecha_final=date("Y-m-d H:i:s", strtotime($anio."-12-31") );

        $reservas=proveedorInsumo::whereBetween('created_at', [$fecha_inicial,  $fecha_final])->get();
        $contReservas=count($reservas);

        $habitaciones=Insumo::all();
        $ctp=count($habitaciones);

        $ct =count($reservas);
        
        for($i=0;$i<=$ctp-1;$i++){
         $idTP=$habitaciones[$i]->id;
         $numeroReservas[$idTP]=0;
        }

        for($i=0;$i<=$ct-1;$i++){
         $idTP=$reservas[$i]->id_insumo;
         $numeroReservas[$idTP]++;
           
        }

        $data=array("totalHabitaciones"=>$ctp,"habitaciones"=>$habitaciones, "numeroReservas"=>$numeroReservas);
        return json_encode($data);
    }





    public function compraInsumos()
    {
        $anio=date("Y");
        $mes=date("m");
        return view('grafico.comprainsumos')
               ->with("anio",$anio)
               ->with("mes",$mes);
        
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
}
