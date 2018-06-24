@extends('layouts.app')

@section('title', 'Editar Tipo ' . $habitacion->numero_habitacion)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Habitaciones</div>
                	<div class="panel-body">
						
						{!! Form::open(['route' => ['habitaciones.update', $habitacion,'files'=>true],'method' => 'PUT', 'class' => 'form-horizontal','enctype' => "multipart/form-data"]) !!}
							
							<div class="form-group">
	                			{!! Form::label('numero_habitacion', 'Numero habitacion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('numero_habitacion', $habitacion->numero_habitacion, ['class' => 'form-control', 'placeholder' => 'No 1', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('descripcion', 'Descripcion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('descripcion', $habitacion->descripcion, ['class' => 'form-control', 'placeholder' => 'producto de...', 'required']) !!}
								</div>
							</div>

								<div class="form-group">
	                			{!! Form::label('observacion', 'Observacion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('observacion', $habitacion->observacion, ['class' => 'form-control', 'placeholder' => 'producto de...', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('imagen', 'Imagen',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::File('imagen', null, ['class' => 'form-control', 'placeholder' => 'examinar...', 'required']) !!}
								</div>
							</div>


							<div class="form-group">
	                			{!! Form::label('id_tipo_habitacion', 'Tipo De Habitacion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_tipo_habitacion', $habitacion->lista_tipo,$habitacion->id_tipo_habitacion , ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>
							</div>

							  <div class="form-group">
	                			{!! Form::label('id_estado_habitacion', 'Tipo de Producto',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_estado_habitacion', $habitacion->lista_estado,$habitacion->id_estado_habitacion , ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>
							</div>
						

							<div class="form-group">
	                            <div class="col-md-8 col-md-offset-4">
										{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
								</div>
							</div>

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection	