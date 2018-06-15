@extends('layouts.app')

@section('title', 'Editar Tipo ' . $productos->nombre)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Productos</div>
                	<div class="panel-body">
						{!! Form::open(['route' => ['productos.update', $productos,'files'=>true],'method' => 'PUT', 'class' => 'form-horizontal','enctype' => "multipart/form-data"]) !!}
							<div class="form-group">


						 		{!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
									{!! Form::text('nombre', $productos->nombre, ['class' => 'form-control', 'required']) !!}

								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('descripcion', 'Descripcion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('descripcion', $productos->descripcion, ['class' => 'form-control', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('imagen', 'Imagen',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">

						 		<img width="100px" src="{{Storage::url($productos->imagen)}}" >
						 			{!! Form::file('imagen',null, ['class' => 'form-control', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('stock', 'Stock',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('stock', $productos->stock, ['class' => 'form-control', 'required']) !!}
								</div>
							</div>

							

							
							<div class="form-group">
	                			{!! Form::label('id_tipo_producto', 'Tipo de Producto',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_tipo_producto', $productos->lista_tipo ,null, ['class' => 'form-control', 'required']) !!}

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