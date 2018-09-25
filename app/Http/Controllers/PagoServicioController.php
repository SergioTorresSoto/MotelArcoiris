<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\TipoServicio;
use App\PagoServicio;
use DB;


class PagoServicioController extends Controller
{

      public function index(Request $request)
    {
        
        $pago_servicio =  PagoServicio::tiposer($request->get('tipo'))
                  ->inicio2($request->get('fecha'))
               //   ->fin2($request->get('fecha'))
                  ->join('tipo_servicios', 'tipo_servicios.id', '=', 'pago_servicios.id_tipo_servicio' )
                  ->select('pago_servicios.*','tipo_servicios.tipo')
                  ->orderBy('pago_servicios.id','ASC')
                  ->paginate(5);


        $pago_servicio->lista_tipo= DB::table('tipo_servicios')
                     ->orderBy('id')
                     ->pluck('tipo','id');          

        
        
        return view('pagoservicio.index')->with('pago_servicio', $pago_servicio);
    }

    public function create()
    {
        $lista_tipo= DB::table('tipo_servicios')
                     ->orderBy('id')
                     ->pluck('tipo','id');
        

        return view('pagoservicio.create')->with('lista_tipo',$lista_tipo);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pago_servicio = new PagoServicio($request->all());

       
        $pago_servicio->save();
        Session::flash('message', "Se ha registrado el pago de servicio Exitosamente!");
         return redirect(route('pagoservicio.index'));
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

        $pago_servicio = PagoServicio::find($id);
        $pago_servicio->lista_tipo= DB::table('tipo_servicios')
                     ->orderBy('id')
                     ->pluck('tipo','id');
      
                     

        return view('pagoservicio.edit')->with('pago_servicio', $pago_servicio);
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

        $pago_servicio = pagoservicio::find($id);
        
     
        
        $pago_servicio->id_tipo_servicio = $request->id_tipo_servicio;
        $pago_servicio->fecha= $request->fecha;
        $pago_servicio->valor_servicio = $request->valor_servicio;
        $pago_servicio->cantidad = $request->cantidad;



        
        $pago_servicio->save();
   
        Session::flash('message', "Se ha modificado el pago de servicio Exitosamente!");
        return redirect(route('pagoservicio.index'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pago_servicio = PagoServicio::find($id);

        $pago_servicio->delete();    
            
          Session::flash('message', "Se ha eliminado el pagoservicio Exitosamente!");
        return redirect(route('pagoservicio.index'));
    }
}
