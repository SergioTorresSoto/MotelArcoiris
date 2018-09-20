<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\UsuarioHabitacion;
use App\Habitacion;

use App\proveedorInsumo;
use App\ProveedorProducto;
use App\Insumo;
use App\Proveedor;
use App\Producto;
use DB;
class GraficosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registroReservaBarras()
    {
        $reservaOnline = [];
        $totalComprasAños =  DB::table('usuarios_habitaciones')
            ->select(DB::raw('YEAR(created_at) as ano'), 
                     DB::raw('sum(tarifa) as total, sum(es_online) as online, sum(!es_online) as presencial, count(es_online) as reservas' )
                    )

            ->groupBy(DB::raw('YEAR(created_at)'))
            ->get();

        $totalComprasMeses  = UsuarioHabitacion::select(
                                        DB::raw("DATE_FORMAT(created_at,'%M %Y %m') as meses"),
                                        DB::raw('sum(tarifa) as total,sum(es_online) as online, sum(!es_online) as presencial, count(es_online) as reservas')
                                        
                              )
                              ->groupBy('meses')
                              ->get();

        $totalComprasDias  = UsuarioHabitacion::select(
                                        DB::raw("DATE_FORMAT(created_at,'%M %Y %d') as dias"),
                                        DB::raw('sum(tarifa) as total,sum(es_online) as online, sum(!es_online) as presencial, count(es_online) as reservas')
                                        
                              )
                              ->groupBy('dias')
                              ->get();
        

      
       $reservaOnline[]=$totalComprasAños;
       $reservaOnline[]=$totalComprasMeses;
       $reservaOnline[]=$totalComprasDias;

        $data=array('reservaOnline' => $reservaOnline);

        return json_encode($data);
    }

    public function registroReservaLineas(){

        $productos = Habitacion::all();
        foreach ($productos as $key => $producto) {
            $totalComprasAños =  UsuarioHabitacion::where('id_habitacion',$producto->id)
                ->select(DB::raw('YEAR(created_at) as ano'), DB::raw('count(id) as total'))

                ->groupBy(DB::raw('YEAR(created_at)'))
               
                ->get();
            $productos[$key]->años = $totalComprasAños;

            $totalComprasMeses  = UsuarioHabitacion::where('id_habitacion',$producto->id)->select(
                                        DB::raw("DATE_FORMAT(created_at,'%m %Y %M') as meses"),
                                        DB::raw('count(id) as total')
                                        
                              )
                       
                              ->groupBy('meses')
                              
                              ->get();
            $productos[$key]->meses = $totalComprasMeses;

            $totalComprasDias  = UsuarioHabitacion::where('id_habitacion',$producto->id)->select(
                                        DB::raw("DATE_FORMAT(created_at,'%m %Y %d %M') as dias"),
                                        DB::raw('count(id) as total')
                                        
                              )
                        
                              ->groupBy('dias')
                              
                              ->get();
            $productos[$key]->dias = $totalComprasDias;
        }



        $data=array("productos"=>$productos);
        return json_encode($data);
    }

    public function reserva()
    {
   
        return view('grafico.reservas');
        
    }
    public function registroComprasInsumosBarras()
    {
       $totalComprasAños =  DB::table('proveedores_insumos')
            ->select(DB::raw('YEAR(created_at) as ano'), DB::raw('sum(precio_total) as total'))
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->get();

        $totalComprasMeses  = proveedorInsumo::select(
                                        DB::raw("DATE_FORMAT(created_at,'%M %Y %m') as meses"),
                                        DB::raw('sum(precio_total) as total')
                                        
                              )
                              ->groupBy('meses')
                              ->get();

        $totalComprasDias  = proveedorInsumo::select(
                                        DB::raw("DATE_FORMAT(created_at,'%M %Y %d') as dias"),
                                        DB::raw('sum(precio_total) as total')
                                        
                              )
                              ->groupBy('dias')
                              ->get();
        

      
       

        $data=array('totalComprasAños' => $totalComprasAños,'totalComprasMeses' => $totalComprasMeses,'totalComprasDias' => $totalComprasDias);

        return json_encode($data);
    }
    public function registroComprasInsumosLineas(){

        $productos = Insumo::all();
        foreach ($productos as $key => $producto) {
            $totalComprasAños =  proveedorInsumo::where('id_insumo',$producto->id)
                ->select(DB::raw('YEAR(created_at) as ano'), DB::raw('sum(cantidad) as total'))

                ->groupBy(DB::raw('YEAR(created_at)'))
               
                ->get();
            $productos[$key]->años = $totalComprasAños;

            $totalComprasMeses  = proveedorInsumo::where('id_insumo',$producto->id)->select(
                                        DB::raw("DATE_FORMAT(created_at,'%m %Y %M') as meses"),
                                        DB::raw('sum(cantidad) as total')
                                        
                              )
                       
                              ->groupBy('meses')
                              
                              ->get();
            $productos[$key]->meses = $totalComprasMeses;

            $totalComprasDias  = proveedorInsumo::where('id_insumo',$producto->id)->select(
                                        DB::raw("DATE_FORMAT(created_at,'%m %Y %d %M') as dias"),
                                        DB::raw('sum(cantidad) as total')
                                        
                              )
                        
                              ->groupBy('dias')
                              
                              ->get();
            $productos[$key]->dias = $totalComprasDias;
        }



        $data=array("productos"=>$productos);
        return json_encode($data);
    }






  

    public function compraProductos()
    {
        
        return view('grafico.compraproductos');
        
    }

    public function registroComprasProductosBarras()
    {
       $totalComprasAños =  DB::table('proveedores_productos')
            ->select(DB::raw('YEAR(created_at) as ano'), DB::raw('sum(precio_total) as total'))
            ->groupBy(DB::raw('YEAR(created_at)'))
            ->get();

        $totalComprasMeses  = ProveedorProducto::select(
                                        DB::raw("DATE_FORMAT(created_at,'%M %Y %m') as meses"),
                                        DB::raw('sum(precio_total) as total')
                                        
                              )
                              ->groupBy('meses')
                              ->get();

        $totalComprasDias  = ProveedorProducto::select(
                                        DB::raw("DATE_FORMAT(created_at,'%M %Y %d') as dias"),
                                        DB::raw('sum(precio_total) as total')
                                        
                              )
                              ->groupBy('dias')
                              ->get();
        

      
       

        $data=array('totalComprasAños' => $totalComprasAños,'totalComprasMeses' => $totalComprasMeses,'totalComprasDias' => $totalComprasDias);

        return json_encode($data);
    }
    public function registroCompraProductosLineas(){

        $productos = Producto::all();
        foreach ($productos as $key => $producto) {
            $totalComprasAños =  ProveedorProducto::where('id_producto',$producto->id)
                ->select(DB::raw('YEAR(created_at) as ano'), DB::raw('sum(cantidad) as total'))

                ->groupBy(DB::raw('YEAR(created_at)'))
               
                ->get();
            $productos[$key]->años = $totalComprasAños;

            $totalComprasMeses  = ProveedorProducto::where('id_producto',$producto->id)->select(
                                        DB::raw("DATE_FORMAT(created_at,'%m %Y %M') as meses"),
                                        DB::raw('sum(cantidad) as total')
                                        
                              )
                       
                              ->groupBy('meses')
                              
                              ->get();
            $productos[$key]->meses = $totalComprasMeses;

            $totalComprasDias  = ProveedorProducto::where('id_producto',$producto->id)->select(
                                        DB::raw("DATE_FORMAT(created_at,'%m %Y %d %M') as dias"),
                                        DB::raw('sum(cantidad) as total')
                                        
                              )
                        
                              ->groupBy('dias')
                              
                              ->get();
            $productos[$key]->dias = $totalComprasDias;
        }



        $data=array("productos"=>$productos);
        return json_encode($data);
    }
    public function ventaProductos()
    {
        
        return view('grafico.ventaproductos');
                     
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
