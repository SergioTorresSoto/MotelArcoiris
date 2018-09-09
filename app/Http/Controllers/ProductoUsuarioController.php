<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\ProductoUsuario;
use App\DetalleVenta;
use App\UserType;
use App\Producto;
use App\User;
use DB;

class ProductoUsuarioController extends Controller
{
     public function index()
    {
        

        $productosusuarios =  DB::table('productos_usuarios')
            
                  ->join('users','users.id','=','productos_usuarios.id_usuario')
                    ->join('detalles_ventas','detalles_ventas.id','=','productos_usuarios.id_detalle_venta')
                  ->select('users.email','detalles_ventas.*')
                  ->orderBy('productos_usuarios.id','ASC')
                   ->distinct()
                  ->paginate(5);


        
        
        return view('productosusuarios.index')->with('productosusuarios', $productosusuarios);
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

    /*          $users = DB::table('users')
                    ->join('users_type', 'users_type.id', '=', 'users.id_type' ) 
                    ->select('users.email')
                    ->where('users_type.type','=','Cliente')
                    ->orderBy('users.id','ASC');*/



          $users = User::join('users_type', 'users_type.id', '=', 'users.id_type' )            
                  ->select('users.*','users_type.type')
                  ->where('users_type.type','=',"Cliente")
                  ->orderBy('users.id','ASC')
                  ->pluck('email','id'); 




        return view('productosusuarios.create')->with('lista_productos',$lista_productos)->with('users',$users);
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


        $venta = new DetalleVenta;
        
        $venta->tipo_comprobante = $request->get('tipo_comprobante');

        
        $aux = 0;

        while($aux<count($request->get('id_producto'))){
            $mult = $cantidad[$aux]*$precio_unitario[$aux];
            $suma = $suma+$mult;
            $aux++;

        }

        $venta->total = $suma;

        $venta->save();
    

        while ($cont<count($request->get('id_producto'))) {

            $productosusuarios = new ProductoUsuario;
            $productosusuarios->id_usuario= $request->get('id_usuario');
            $productosusuarios->id_producto=$id[$cont];
            $productosusuarios->id_detalle_venta = $venta->id;
            $productosusuarios->marca_producto=$marca_producto[$cont];
            $productosusuarios->cantidad=$cantidad[$cont];
            $productosusuarios->precio_unitario=$precio_unitario[$cont];
            $productosusuarios->precio_total=$cantidad[$cont]*$precio_unitario[$cont];
            

            $productosusuarios->save();

            $cont=$cont+1;

        }



        Session::flash('message', "Se ha registrado Exitosamente!");
            return redirect(route('productosusuarios.index'));

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $productosusuarios = ProductoUsuario::join('users','users.id' ,'=', 'productos_usuarios.id_usuario')
                                ->join('detalles_ventas','detalles_ventas.id','=','productos_usuarios.id_detalle_venta')
                                ->join('productos','productos.id','=','productos_usuarios.id_producto')
                                ->select('users.email AS nombreusuario','detalles_ventas.*','productos_usuarios.*','productos.*')
                                ->where('id_detalle_venta','=',$id)
                                ->get();
                                //dd($productosusuarios);
        return view('productosusuarios.show')->with('productosusuarios',$productosusuarios);          

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

        $detalle = DetalleVenta::find($id);
        $detalle->delete();  

        Session::flash('message', "Se ha eliminado el suministro Exitosamente!");
        return redirect(route('productosusuarios.index'));
    }
}
