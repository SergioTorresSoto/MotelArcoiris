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
                <h3>Modificar Reserva</h3>
                </div>
                <div class="panel-body">  
	            {!! Form::open(['route' => ['usuarioshabitaciones.update', $reserva], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
	            	<div class="col-sm-6 col-md-6 ">

	            				<div class="form-group">
		                			{!! Form::label('id_usuario', 'Cuentas Clientes*',['class' => 'control-label']) !!}
							
							 			{!! Form::select('id_usuario', $lista_clientes, $reserva->id_usuario, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>

	                			<div class="form-group">
		                			{!! Form::label('id_habitacion', 'N°Habitacion*',['class' => 'control-label']) !!}
							
							 			{!! Form::select('id_habitacion', $lista_habitacion, $reserva->id_habitacion, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>
		                	
		                		<div class="form-group">
		                			{!! Form::label('tiempo_reserva', 'Servicio*',['class' => 'control-label']) !!}
							 
								    <div class="input-group">
								     
								      {!! Form::number('tiempo_reserva', $reserva->tiempo_reserva, ['class' => 'form-control ', 'required']) !!}
								      <div class="input-group-addon">Hrs</div>
								    </div>
								</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">	
			                			{!! Form::label('tiempo_inicio', 'Fecha Inicio', ['class' => 'calendar1']) !!}

			                				<div class='input-group'>
				                                {!! Form::text('tiempo_inicio', $reserva->tiempo_inicio, ['class' => 'form-control calendar1', 'required']) !!}
				                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				                            </div>

									</div>
								</div>
								<div class="col-md-1"></div>
								<div class="col-md-5">	
									<div class="form-group">	
			                			{!! Form::label('tiempo_fin', 'Fecha Fin') !!}

			                				<div class='input-group'>
				                                {!! Form::text('tiempo_fin', $reserva->tiempo_fin, ['class' => 'form-control', 'required ']) !!}
				                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				                            </div>
				                        
									</div>
								</div>
							</div>
							<div class="form-group">	
			                			{!! Form::label('tiempo_fin_real', 'Fecha Fin Real', ['class' => 'calendar1']) !!}

			                				<div class='input-group' id='calendar1'>
				                                {!! Form::text('tiempo_fin_real', $reserva->tiempo_fin_real, ['class' => 'form-control calendar1']) !!}
				                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
				                            </div>
				                        
									</div>
								
							
    
		            </div>
		            <div class="col-sm-1"></div>
		            <div class="col-sm-5 col-md-5">
		            	
						<div class="form-group">
		                	{!! Form::label('patente', 'Patente',['class' => 'control-label']) !!}
							 
						    {!! Form::text('patente', $reserva->patente, ['class' => 'form-control ']) !!}
						    
						</div>

						<div class="form-group">
		                			{!! Form::label('observacion', 'Observacion',['class' => 'control-label']) !!}
			
							 		{!! Form::text('observacion', $reserva->observacion, ['class' => 'form-control']) !!}
						</div>


						<div class="form-group">
				 			{!! Form::label('tipo_pago', 'Tipo Pago*') !!}
				 			{!! Form::select('tipo_pago', array('Efectivo' => 'Efectivo', 'Tarjeta' => 'Tarjeta'), $reserva->tipo_pago,['class' => 'form-control']) !!}

						</div>
						<div class="form-group">
		                	{!! Form::label('tarifa', 'Tarifa*',['class' => 'control-label']) !!}
							 
    					    <div class="input-group">
								<div class="input-group-addon">$</div>     
						        {!! Form::number('tarifa', $reserva->tarifa, ['class' => 'form-control ', 'required']) !!}
						        
						    </div>
						</div>
						<div class="form-group">
		                	{!! Form::label('tarifa_horas_extras', 'Tarifa Horas Extras',['class' => 'control-label']) !!}
							 
    					    <div class="input-group">
								<div class="input-group-addon">$</div>     
						        {!! Form::number('tarifa_horas_extras', $reserva->tarifa_horas_extras, ['class' => 'form-control ']) !!}
						        
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

@endsection	

@section('script')
	
 	<script src="{{asset ('datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>

    <script>

	
	 jQuery(function(){
 			jQuery('.calendar1').datetimepicker({
 				lang:'es',
  				format:'Y-m-d H:i',
  				allowTimes:['00:00','00:15','00:30','00:35','00:45','01:00','01:15','01:30','01:45','02:00','02:15','02:30','02:45','03:00',
				  '12:00', '13:00', '15:00', 
				  '17:00', '17:05', '17:20', '19:00', '20:00'
				 ],
  				/*onShow:function( ct ){
  					this.setOptions({
  						maxDate:jQuery('#checkout').val()?jQuery('#checkout').val():false
  					})
  				},*/
 			});
 			
		});
	 jQuery(function(){
 			jQuery('#tiempo_fin').datetimepicker({
 				lang:'es',
  				format:'Y-m-d H:i',
  				allowTimes:['00:00','00:15','00:30','00:35','00:45','01:00','01:15','01:30','01:45','02:00','02:15','02:30','02:45','03:00',
				  '12:00', '13:00', '15:00', 
				  '17:00', '17:05', '17:20', '19:00', '20:00'
				 ],
  				/*onShow:function( ct ){
  					this.setOptions({
  						maxDate:jQuery('#checkout').val()?jQuery('#checkout').val():false
  					})
  				},*/
 			});
 			
		});
    </script>

@endsection