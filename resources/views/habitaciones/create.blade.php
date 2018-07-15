@extends('layouts.app')

@section('title', 'Crear habitacion')

@section('content')
	<div class="container">
		    <div class="col-md-12">
		    	<div class="panel panel-info">
		            <div class="panel-heading">
		                <h3>Crear Habitacion</h3>

              		</div>
              		<div class="panel-body">
	                 	<div class="col-sm-5 col-md-5 col-sm-offset-3 col-md-offset-3 ">
	                  
	                		{!! Form::open(['route' => 'habitaciones.store','method' => 'POST', 'class' => 'form-horizontal','enctype' => "multipart/form-data"]) !!}
		                	
		                		<div class="form-group">
		                			{!! Form::label('numero_habitacion', 'Numero habitacion',['class' => 'control-label']) !!}
							 
							 			{!! Form::text('numero_habitacion', null, ['class' => 'form-control', 'placeholder' => 'No 1', 'required']) !!}
									</div>
								

								<div class="form-group">
		                			{!! Form::label('descripcion', 'Descripcion',['class' => 'control-label']) !!}
				
							 			{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'habitacion de...', 'required']) !!}
									</div>
								

									<div class="form-group">
		                			{!! Form::label('observacion', 'Observacion',['class' => 'control-label']) !!}
			
							 			{!! Form::text('observacion', null, ['class' => 'form-control', 'placeholder' => 'habitacion de...', 'required']) !!}
									</div>
								

								<div class="form-group">
		                			{!! Form::label('imagen', 'Imagen',['class' => 'control-label']) !!}

							 			{!! Form::File('imagen', null, ['class' => 'form-control', 'placeholder' => 'examinar...', 'required']) !!}
									</div>
								


								<div class="form-group">
		                			{!! Form::label('id_tipo_habitacion', 'Tipo De Habitacion',['class' => 'control-label']) !!}
							
							 			{!! Form::select('id_tipo_habitacion', $lista_tipo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

									</div>
							

								  <div class="form-group">
		                			{!! Form::label('id_estado_habitacion', 'estado de habitacion',['class' => 'control-label']) !!}
			
							 			{!! Form::select('id_estado_habitacion', $lista_estado, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

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

