@extends('layouts.app')

@section('title', 'Crear habitacion')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Habitacion</div>
                	<div class="panel-body">

                		{!! Form::open(['route' => 'habitaciones.store','method' => 'POST', 'class' => 'form-horizontal','enctype' => "multipart/form-data"]) !!}
	                	
	                		<div class="form-group">
	                			{!! Form::label('numero_habitacion', 'Numero habitacion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('numero_habitacion', null, ['class' => 'form-control', 'placeholder' => 'No 1', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('descripcion', 'Descripcion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'habitacion de...', 'required']) !!}
								</div>
							</div>

								<div class="form-group">
	                			{!! Form::label('observacion', 'Observacion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('observacion', null, ['class' => 'form-control', 'placeholder' => 'habitacion de...', 'required']) !!}
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
						 			{!! Form::select('id_tipo_habitacion', $lista_tipo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>
							</div>

							  <div class="form-group">
	                			{!! Form::label('id_estado_habitacion', 'estado de habitacion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_estado_habitacion', $lista_estado, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>
							</div>
						


							<div class="form-group">
	                            <div class="col-md-8 col-md-offset-4">
	                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
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

