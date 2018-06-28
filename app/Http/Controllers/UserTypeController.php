<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users_type = UserType::orderBy('id','ASC')->paginate(5);
        
        
        return view('usertype.index')->with('users_type', $users_type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        
        return view('usertype.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $users_type = new usertype($request->all());
        
        $users_type->save();
        
        Session::flash('message', "Se ha registrado el tipo $users_type->type Exitosamente!");
        
            return redirect(route('userstype.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function show(UserType $userType)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function edit($userType)
    {
        $users_type = userType::find($userType);
        return view('usertype.edit')->with('users_type', $users_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $userType)
    {
        $users_type = userType::find($userType);
        $users_type->type = $request->type;
        $users_type->save();
        Session::flash('message', "Se ha modificado el usuario $users_type->type Exitosamente!");
        return redirect()->route('userstype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy($userType)
    {
        $users_type = userType::find($userType);
        $var = $users_type->delete();  

        Session::flash('message', "Se ha eliminado el usuario $users_type->type Exitosamente!");
        return redirect(route('userstype.index'));
    }
}
