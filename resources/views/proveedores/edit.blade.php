@extends('layouts.app')

@section('title', 'Editar Tipo ' . $proveedor->nombre)

@section('content')
<div class="container">
	<div class="col-md-12">
		<div class="panel panel-info">
           	<div class="panel-heading"> 
					<h3> Proveedores</h3>
			</div>

                	<div class="panel-body">
                		<div class="col-sm-12 col-md-12 "> 
						{!! Form::open(['route' => ['proveedores.update', $proveedor], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
							<div class="form-group">

						 		{!! Form::label('nombre', 'Nombre', ['class' => 'control-label']) !!}
						 		
									{!! Form::text('nombre', $proveedor->nombre, ['class' => 'form-control', 'required']) !!}

								</div>
							

							<div class="form-group">

						 		{!! Form::label('direccion', 'Direccion', ['class' => 'control-label']) !!}
						 		
									{!! Form::text('direccion', $proveedor->direccion, ['class' => 'form-control', 'required']) !!}

								
							</div>	

							<div class="form-group">

						 		{!! Form::label('telefono', 'Telefono', ['class' => 'control-label']) !!}
						 		
									{!! Form::text('telefono', $proveedor->telefono, ['class' => 'form-control', 'required']) !!}

								
							</div>	

							<div class="form-group">

						 		{!! Form::label('descripcion', 'Descripcion', ['class' => 'control-label']) !!}
						 		
									{!! Form::text('descripcion', $proveedor->descripcion, ['class' => 'form-control', 'required']) !!}

								
							</div>		
							<div class="form-group">
	                            
										{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
								
							</div>

						{!! Form::close() !!}
					</div>
					</div>
				</div>
			</div>
		</div>
</div>
	
@endsection	
