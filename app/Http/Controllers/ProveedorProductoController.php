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
     public function index(Request $request)
    {
        

        $proveedoresproductos =  ProveedorProducto::inicio3($request->get('proveedores_insumos.created_at'))
                    ->nombreprov3($request->get('nombre'))
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
        $detalle = DetalleCompra::find($id);

        $productosComprados = ProveedorProducto::join('proveedores','proveedores.id' ,'=', 'proveedores_productos.id_proveedor')
                                ->join('detalles_compras','detalles_compras.id','=','proveedores_productos.id_detalle_compra')
                                ->join('productos','productos.id','=','proveedores_productos.id_producto')
                                ->select('proveedores.nombre AS nombreproveedor','proveedores.direccion','detalles_compras.*','proveedores_productos.*','productos.*')
                                ->where('id_detalle_compra','=',$id)
                                ->get();
        $proveedores = Proveedor::select(DB::raw("id,CONCAT(nombre,'  ',direccion) as prov"))
                        ->orderBy('id')
                        ->pluck('prov','id');
        $productos= DB::table('productos')
                     ->orderBy('id')
                     ->pluck('nombre','id');

        return view('proveedoresproductos.edit')->with('detalleCompra', $detalle)->with('productosComprados', $productosComprados)->with('proveedores',$proveedores)->with('productos',$productos);
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
       // dd($request->all());
        $detalle = DetalleCompra::find($id);
        $detalle->tipo_comprobante = $request->tipo_comprobante;
        $detalle->total = $request->total;
        $detalle->save();

        $id_producto = $request->id_producto;
        
        ProveedorProducto::where('id_detalle_compra','=',$id)
                                ->delete();
                                
        foreach ($id_producto as $key => $id) {
            $newCompra = new ProveedorProducto;
            $newCompra->id_detalle_compra = $detalle->id;
            $newCompra->id_proveedor = $request->id_proveedor;
            $newCompra->id_producto = $request->id_producto[$key];
            $newCompra->marca_producto = $request->marca_producto[$key];
       
            $newCompra->cantidad = $request->cantidad[$key];
            $newCompra->precio_unitario = $request->precio_unitario[$key];
            $newCompra->precio_total=$request->cantidad[$key]*$request->precio_unitario[$key];
            $newCompra->save();
        }
        Session::flash('message', "Se ha modificado Exitosamente!");
            return redirect(route('proveedoresproductos.index'));
        
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
