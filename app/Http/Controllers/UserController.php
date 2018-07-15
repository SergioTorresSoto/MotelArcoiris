<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tipoProducto;
use App\User;
use App\UserType;
use Illuminate\Support\Facades\Session;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
                  
                  
        $users= User::nombre($request->get('nombre'))
                  ->type($request->get('type'))
                  ->join('users_type', 'users_type.id', '=', 'users.id_type' )            
                  ->select('users.*','users_type.type')
                  ->orderBy('users.id','ASC')
                  ->paginate(5);

        $users->lista_tipo= DB::table('users_type')
                     ->orderBy('id')
                     ->pluck('type','id');
        
        return view('user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lista_tipo= DB::table('users_type')
                     ->orderBy('id')
                     ->pluck('type','id');
                     
        return view('user.create')->with('lista_tipo',$lista_tipo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $users = new User($request->all());
        $users->password = bcrypt($request->password);
       
        
        $users->save();
         Session::flash('message', 'El usuario se creo exitosamente.');
         return redirect(route('users.index'));
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

        $users = User::find($id);
        $users->lista_tipo= DB::table('users_type')
                     ->orderBy('id')
                     ->pluck('type','id');
                     

        return view('user.edit')->with('users', $users);
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
        $users = User::find($id);
        /*Valido manualmente con las mismas reglas de UsersRequest, 
        ya que si utilizo UsersRequest me obliga usar el arreglo completo, 
        y en este caso, solo valido los campos que necesito*/
        
        $this->validate($request,[
            'nombre' => 'min:4|max:120|required',
            'email' => 'required',
            'id_type' => 'required'
        ]);
        $users->nombre = $request->nombre;
        $users->apellido = $request->apellido;
        $users->rut = $request->rut;
        $users->telefono = $request->telefono;
        $users->email = $request->email;
        $users->username = $request->username;
        $users->password = bcrypt($request->password);
        $users->id_type = $request->id_type;
        $users->save();
        
        Session::flash('message', "Se ha modificado el usuario $users->nombre Exitosamente!");
        return redirect(route('users.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::find($id);

        $users->delete();    
        Session::flash('message', "Se ha eliminado el usuario $users->nombre Exitosamente!");
        return redirect(route('users.index'));
    }
}
