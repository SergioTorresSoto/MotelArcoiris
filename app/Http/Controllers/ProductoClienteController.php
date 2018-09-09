<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\ProductoUsuario;
use App\DetalleVenta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use DB;
class ProductoClienteController extends Controller
{
    public function filtroProductos($nombre){

        if($nombre != 1){
            $productos = Producto::where('nombre',"LIKE", "%$nombre%")
                            ->get();
        }else{
            $productos = Producto::all();
        }
        $data=array("productos"=>$productos);
        return   json_encode($data);
    }

    public function index(){

    	     $productocliente =  Producto::all();



    	return view('productosclientes.index')->with('productocliente',$productocliente);
    }

    public function create()

    {
        $productocliente =  Producto::all();

  
        return view('productosclientes.create')->with('productocliente', $productocliente);
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
        $id = $request->productoId;
        $cantidad = $request->cantidad;
        $total = $request->total;

        $venta = new DetalleVenta;
        $venta->total = $total;
        $venta->tipo_comprobante = $request->tipo_pago;
        $venta->save();

        
         while ($cont<count($id)) {

            $producto =  Producto::find($id[$cont]);
            $productosusuarios = new ProductoUsuario;
            $productosusuarios->id_usuario= Auth::id();
            $productosusuarios->id_producto=$id[$cont];
            $productosusuarios->id_detalle_venta = $venta->id;
          
            $productosusuarios->cantidad=$cantidad[$cont];
            $productosusuarios->precio_unitario=$producto->precio;
            $productosusuarios->precio_total=$cantidad[$cont]*$producto->precio;

            $productosusuarios->save();
            $cont++;

            Session::flash('message', "Se ha registrado Exitosamente!");
        return redirect(route('productosclientes.index'));
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

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
