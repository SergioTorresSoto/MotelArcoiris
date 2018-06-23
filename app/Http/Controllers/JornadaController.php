<?php

namespace App\Http\Controllers;
use App\Jornada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;

class JornadaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jornadas = Jornada::orderBy('id','ASC')->paginate(5);
        
        
        return view('jornada.index')->with('jornadas', $jornadas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('jornada.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $duracion = $request->duracion_hora.' '.$request->duracion_minuto;
        $jornadas = new Jornada($request->all());
       
        
        //fecha random
        $fecha = new \DateTime($jornadas->hora_entrada);
     
        $fecha->modify($duracion); 
        $fecha->format('d-m-Y H:i:s');
        $hora = date_format($fecha, 'H:i:s');
        $jornadas->hora_salida = $hora;

        $jornadas->save();
         Session::flash('message', 'La jornada se creo exitosamente.');
         return redirect(route('jornadas.index'));
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
        $jornadas = Jornada::find($id);
        return view('jornada.edit')->with('jornadas', $jornadas);
    
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
        $jornadas = Jornada::find($id);
        $jornadas->hora_entrada = $request->hora_entrada;
        
        $jornadas->duracion_hora = $request->duracion_hora;
        $jornadas->duracion_minuto = $request->duracion_minuto;
        
        $duracion = $request->duracion_hora.' '.$request->duracion_minuto;
        $fecha = new \DateTime($jornadas->hora_entrada);
     
        $fecha->modify($duracion); 
        $fecha->format('d-m-Y H:i:s');
        $hora = date_format($fecha, 'H:i:s');
        $jornadas->hora_salida = $hora;
        
        $jornadas->save();
        Session::flash('message', "Se ha modificado la jornada Exitosamente!");
        return redirect()->route('jornadas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jornadas = Jornada::find($id);
        $jornadas->delete();  

        Session::flash('message', "Se ha eliminado la jornada Exitosamente!");
        return redirect(route('jornadas.index'));
    }
}
