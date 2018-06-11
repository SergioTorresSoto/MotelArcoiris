<?php

namespace App\Http\Controllers;

use App\UserType;
use Illuminate\Http\Request;


class UserTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users_type = userType::orderBy('id','ASC')->paginate(5);
        
        
        return view('usertype.index')->with('users_type', $users_type);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        Session::flash('message_success', "Se ha registrado el tipo $usertype->type_name Exitosamente!");
            return redirect(route('usertype.index'));
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
    public function edit(UserType $userType)
    {
        $users_type = userType::find($id);
        return view('usertype.edit')->with('users_type', $users_type);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UserType $userType)
    {
        $users_type = userType::find($id);
        $users_type->type = $request->type;
        $users_type->save();
        return redirect()->route('usertype.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserType  $userType
     * @return \Illuminate\Http\Response
     */
    public function destroy(UserType $userType)
    {
        $users_type = userType::find($id);
        $users_type->delete();    
        Session::flash('message_danger', "Se ha eliminado el usuario $usertype->name_type Exitosamente!");
        return redirect(route('usertype.index'));
    }
}
