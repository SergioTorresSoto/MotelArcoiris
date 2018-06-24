@extends('layouts.app')

@section('title', 'Crear producto')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Producto</div>
                	<div class="panel-body">

                		{!! Form::open(['route' => 'productos.store','method' => 'POST', 'class' => 'form-horizontal','enctype' => "multipart/form-data"]) !!}
	                	
	                		<div class="form-group">
	                			{!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Jabon', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('descripcion', 'Descripcion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'producto de...', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('imagen', 'Imagen',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::File('imagen', null, ['class' => 'form-control', 'placeholder' => 'examinar...', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('stock', 'Stock',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('stock', null, ['class' => 'form-control', 'placeholder' => 'cantidad...', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('precio', 'Precio',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'valor...', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('id_tipo_producto', 'Tipo de Producto',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_tipo_producto', $lista_tipo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

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

