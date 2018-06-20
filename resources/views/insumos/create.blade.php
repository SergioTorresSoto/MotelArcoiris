@extends('layouts.app')

@section('title', 'Crear insumo')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Insumo</div>
                	<div class="panel-body">

                		{!! Form::open(['route' => 'insumos.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
	                	
	                		<div class="form-group">
	                			{!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'jabon', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('descripcion', 'Descripcion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'insumo de...', 'required']) !!}
								</div>
							</div>

									<div class="form-group">
	                			{!! Form::label('observacion', 'Observacion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('observacion', null, ['class' => 'form-control', 'placeholder' => 'insumo de...',]) !!}
								</div>
							</div>


							<div class="form-group">
	                			{!! Form::label('stock', 'Stock',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('stock', null, ['class' => 'form-control', 'placeholder' => 'cantidad...', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('id_tipo_insumo', 'Tipo de Insumo',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_tipo_insumo', $lista_tipo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

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

