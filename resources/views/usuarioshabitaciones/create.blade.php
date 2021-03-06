@extends('layouts.app')

@section('title', 'Crear habitacion')

@section('style')
	
    <link rel="stylesheet" href="{{asset ('datetimepicker/jquery.datetimepicker.css')}}"/ >

@endsection

@section('content')
	<div class="container">
		    <div class="col-md-12">
		    	<div class="panel panel-info">
            <div class="panel-heading">
                <h3>Crear Reserva</h3>
            </div>
                 

			
            	<div class="panel-body">	     
	            {!! Form::open(['route' => 'usuarioshabitaciones.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
	            	<div class="col-sm-6 col-md-6 ">

	            				<div class="form-group">
		                			{!! Form::label('id_usuario', 'Cuentas Clientes*',['class' => 'control-label']) !!}
							
							 			{!! Form::select('id_usuario', $lista_clientes, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>

	                			<div class="form-group">
		                			{!! Form::label('id_habitacion', 'N°Habitacion*',['class' => 'control-label']) !!}
							
							 			{!! Form::select('id_habitacion', $lista_habitacion, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>
		                	
		                		<div class="form-group">
		                			{!! Form::label('tiempo_reserva', 'Servicio*',['class' => 'control-label']) !!}
							 
								    <div class="input-group">
								     
								      {!! Form::number('tiempo_reserva', null, ['class' => 'form-control ', 'required']) !!}
								      <div class="input-group-addon">Hrs</div>
								    </div>
								</div>
								
									<div class="form-group">	
			                			{!! Form::label('tiempo_inicio', 'Fecha Inicio*') !!}

			                				<div class='input-group' id='calendar1'>
				                                {!! Form::text('tiempo_inicio', null, ['class' => 'form-control', 'required']) !!}
				                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				                            </div>
									</div>
								
								
							
    
		            </div>
		            <div class="col-sm-1"></div>
		            <div class="col-sm-5 col-md-5">
		            	
						<div class="form-group">
		                	{!! Form::label('patente', 'Patente',['class' => 'control-label']) !!}
							 
						    {!! Form::text('patente', null, ['class' => 'form-control ', 'placeholder' => 'AB-CD-43']) !!}
						    
						</div>

						<div class="form-group">
		                			{!! Form::label('observacion', 'Observacion',['class' => 'control-label']) !!}
			
							 		{!! Form::text('observacion', null, ['class' => 'form-control', 'placeholder' => 'habitacion de...']) !!}
						</div>


						<div class="form-group">
				 			{!! Form::label('tipo_pago', 'Tipo Pago*') !!}
				 			{!! Form::select('tipo_pago', array('Efectivo' => 'Efectivo', 'Tarjeta' => 'Tarjeta'), null,['class' => 'form-control', 'placeholder' => 'Seleccione una opcion...']) !!}

						</div>
						<div class="form-group">
		                	{!! Form::label('tarifa', 'Tarifa*',['class' => 'control-label']) !!}
							 
    					    <div class="input-group">
								<div class="input-group-addon">$</div>     
						        {!! Form::number('tarifa', null, ['class' => 'form-control ', 'required']) !!}
						        
						    </div>
						</div>
						<div class="form-group">
							
		                    
		                </div> 
						<div class="form-group">

		                    {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		                </div>
					

				{!! Form::close() !!}
	                 	
	                    </div>
					</div>    
	        </div>
	</div>
</div>

@endsection	

@section('script')
	
 	<script src="{{asset ('datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>

    <script>

	
	 jQuery(function(){
 			jQuery('#tiempo_inicio').datetimepicker({
  				format:'Y-m-d H:i',
  				minDate: new Date(),
  				/*onShow:function( ct ){
  					this.setOptions({
  						maxDate:jQuery('#checkout').val()?jQuery('#checkout').val():false
  					})
  				},*/
 			});
 			
		});
    </script>

@endsection