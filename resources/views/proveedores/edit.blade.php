@extends('layouts.app')

@section('title', 'Editar Tipo ' . $proveedor->nombre)

@section('content')

			 <div class="col-md-12">
					<h3> Proveedores</h3>
						<hr/>

                	<div class="panel-body">
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
	
@endsection	
