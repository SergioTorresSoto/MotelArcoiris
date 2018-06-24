<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Producto;
use App\tipoProducto;
use DB;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $producto =  DB::table('productos')
                  ->join('tipos_productos', 'tipos_productos.id', '=', 'productos.id_tipo_producto' )
                  ->select('productos.*','tipos_productos.tipo')
                  ->orderBy('productos.id','ASC')
                  ->paginate(5);

        
        
        return view('productos.index')->with('productos', $producto);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista_tipo= DB::table('tipos_productos')
                     ->orderBy('id')
                     ->pluck('tipo','id');
        

        return view('productos.create')->with('lista_tipo',$lista_tipo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productos = new Producto($request->all());

        if($request->hasFile('imagen')){
    	

    	$productos->imagen = $request->file('imagen')->store('public/productos');
        }
       
        
        $productos->save();
        Session::flash('message', "Se ha registrado el producto $productos->nombre Exitosamente!");
         return redirect(route('productos.index'));
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

        $producto = Producto::find($id);
        $producto->lista_tipo= DB::table('tipos_productos')
                     ->orderBy('id')
                     ->pluck('tipo','id');
      
                     

        return view('productos.edit')->with('productos', $producto);
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

        $producto = Producto::find($id);
        
        if($request->hasFile('imagen')){
    	

    	$producto->imagen = $request->file('imagen')->store('public/productos');
        }
        
        $producto->nombre = $request->nombre;
        $producto->descripcion= $request->descripcion;
        $producto->precio = $request->precio;
        $producto->stock = $request->stock;
        $producto->id_tipo_producto = $request->id_tipo_producto;


        
        $producto->save();
   
        Session::flash('message', "Se ha modificado el usuario $producto->nombre Exitosamente!");
        return redirect(route('productos.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::find($id);

        $producto->delete();    
        Session::flash('message', "Se ha eliminado el usuario $producto->nombre Exitosamente!");
        return redirect(route('productos.index'));
    }
}
