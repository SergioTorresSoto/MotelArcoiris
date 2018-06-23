@extends('layouts.app')

@section('title', 'Editar Tipo ' . $proveedor->nombre)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tipo Usuario</div>
                	<div class="panel-body">
						{!! Form::open(['route' => ['proveedores.update', $proveedor], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
							<div class="form-group">

						 		{!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
									{!! Form::text('nombre', $proveedor->nombre, ['class' => 'form-control', 'required']) !!}

								</div>
							</div>

							<div class="form-group">

						 		{!! Form::label('direccion', 'Direccion', ['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
									{!! Form::text('direccion', $proveedor->direccion, ['class' => 'form-control', 'required']) !!}

								</div>
							</div>	

							<div class="form-group">

						 		{!! Form::label('telefono', 'Telefono', ['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
									{!! Form::text('telefono', $proveedor->telefono, ['class' => 'form-control', 'required']) !!}

								</div>
							</div>	

							<div class="form-group">

						 		{!! Form::label('descripcion', 'Descripcion', ['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
									{!! Form::text('descripcion', $proveedor->descripcion, ['class' => 'form-control', 'required']) !!}

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
