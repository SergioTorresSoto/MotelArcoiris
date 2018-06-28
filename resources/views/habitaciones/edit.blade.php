@extends('layouts.app')

@section('title', 'Editar Tipo ' . $habitacion->numero_habitacion)

@section('content')

			<div class ="col-md12">
 				<h3>Editar Habitacion</h3>
 				<hr/>

 				  <div class="col-sm-5 col-md-5 ">
                	<div class="panel-body">
						
						{!! Form::open(['route' => ['habitaciones.update', $habitacion,'files'=>true],'method' => 'PUT', 'class' => 'form-horizontal','enctype' => "multipart/form-data"]) !!}
							
							<div class="form-group">
	                			{!! Form::label('numero_habitacion', 'Numero habitacion',['class' => 'control-label']) !!}
						 
						 			{!! Form::text('numero_habitacion', $habitacion->numero_habitacion, ['class' => 'form-control', 'placeholder' => 'No 1', 'required']) !!}
								
							</div>

							<div class="form-group">
	                			{!! Form::label('descripcion', 'Descripcion',['class' => 'control-label']) !!}
						 		
						 			{!! Form::text('descripcion', $habitacion->descripcion, ['class' => 'form-control', 'placeholder' => 'producto de...', 'required']) !!}
								</div>
						

								<div class="form-group">
	                			{!! Form::label('observacion', 'Observacion',['class' => 'control-label']) !!}
						 	
						 			{!! Form::text('observacion', $habitacion->observacion, ['class' => 'form-control', 'placeholder' => 'producto de...', 'required']) !!}
								</div>
						

							<div class="form-group">
	                			{!! Form::label('imagen', 'Imagen',['class' => 'control-label']) !!}
						 			{!! Form::File('imagen', null, ['class' => 'form-control', 'placeholder' => 'examinar...', 'required']) !!}
								</div>
							


							<div class="form-group">
	                			{!! Form::label('id_tipo_habitacion', 'Tipo De Habitacion',['class' => 'control-label']) !!}
						 		
						 			{!! Form::select('id_tipo_habitacion', $habitacion->lista_tipo,$habitacion->id_tipo_habitacion , ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>
							

							  <div class="form-group">
	                			{!! Form::label('id_estado_habitacion', 'estado de Habitacion',['class' => 'control-label']) !!}
						 	
						 			{!! Form::select('id_estado_habitacion', $habitacion->lista_estado,$habitacion->id_estado_habitacion , ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

							
							</div>
						

							<div class="form-group">
	                  
										{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
							
							

						{!! Form::close() !!}
					</div>
				</div>
			</div>
@endsection	