<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ProveedorProducto;
use App\DetalleCompra;
use App\Producto;
use App\Proveedor;
use DB;

class ProveedorProductoController extends Controller
{
     public function index()
    {
        

        $proveedoresproductos =  DB::table('proveedores_productos')
                  ->join('proveedores', 'proveedores.id', '=', 'proveedores_productos.id_proveedor')
                  ->join('detalles_compras','detalles_compras.id','=','proveedores_productos.id_detalle_compra')
                  ->select('proveedores.nombre','detalles_compras.*')
                  ->orderBy('proveedores_productos.id','ASC')
                  ->distinct()
                  ->paginate(5,['detalles_compras.id']);


        
        
        return view('proveedoresproductos.index')->with('proveedoresproductos', $proveedoresproductos);
    }

    /**id_proveedor
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $lista_productos= DB::table('productos')
                     ->orderBy('id')
                     ->pluck('nombre','id');
       $proveedores = Proveedor::select(DB::raw("id,CONCAT(nombre,'  ',direccion) as prov"))
                        ->orderBy('id')
                        ->pluck('prov','id');


        return view('proveedoresproductos.create')->with('lista_productos',$lista_productos)->with('proveedores',$proveedores);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $suma=0;
        $cont=0;
        $id = $request->get('id_producto');
        $marca_producto = $request->get('marca_producto');
        $cantidad = $request->get('cantidad');
        $precio_unitario = $request->get('precio_unitario');
        $contenido = $request->get('contenido');

        $compra = new DetalleCompra;
        
        $compra->tipo_comprobante = $request->get('tipo_comprobante');

        
        $aux = 0;

        while($aux<count($request->get('id_producto'))){
            $mult = $cantidad[$aux]*$precio_unitario[$aux];
            $suma = $suma+$mult;
            $aux++;

        }

        $compra->total = $suma;

        $compra->save();
    

        while ($cont<count($request->get('id_producto'))) {

            $proveedorproducto = new ProveedorProducto;
            $proveedorproducto->id_proveedor= $request->get('id_proveedor');
            $proveedorproducto->id_producto=$id[$cont];
            $proveedorproducto->id_detalle_compra = $compra->id;
            $proveedorproducto->marca_producto=$marca_producto[$cont];
            $proveedorproducto->cantidad=$cantidad[$cont];
            $proveedorproducto->contenido=$contenido[$cont];
            $proveedorproducto->precio_unitario=$precio_unitario[$cont];
            $proveedorproducto->precio_total=$cantidad[$cont]*$precio_unitario[$cont];
            

            $proveedorproducto->save();
            $cont=$cont+1;

        }

        Session::flash('message', "Se ha registrado Exitosamente!");
            return redirect(route('proveedoresproductos.index'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $proveedoresproductos = ProveedorProducto::join('proveedores','proveedores.id' ,'=', 'proveedores_productos.id_proveedor')
                                ->join('detalles_compras','detalles_compras.id','=','proveedores_productos.id_detalle_compra')
                                ->join('productos','productos.id','=','proveedores_productos.id_producto')
                                ->select('proveedores.nombre AS nombreproveedor','proveedores.direccion','detalles_compras.*','proveedores_productos.*','productos.*')
                                ->where('id_detalle_compra','=',$id)
                                ->get();
        return view('proveedoresproductos.show')->with('proveedoresproductos',$proveedoresproductos);          

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

        $detalle = DetalleCompra::find($id);
        $detalle->delete();  

        Session::flash('message', "Se ha eliminado el suministro Exitosamente!");
        return redirect(route('proveedoresproductos.index'));
    }
}
