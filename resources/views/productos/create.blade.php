@extends('layouts.app')

@section('title', 'Crear producto')

@section('content')

<div class="container">
	<div class = "col-md-12">
		<div class="panel panel-info">
           	<div class="panel-heading"> 
				<h3>Crear Producto</h3>
			</div>
			<div class="panel-body">
				      <div class="col-sm-5 col-md-5 col-sm-offset-3 col-md-offset-3 ">
	
                		{!! Form::open(['route' => 'productos.store','method' => 'POST', 'class' => 'form-horizontal','enctype' => "multipart/form-data"]) !!}
	                	
	                		<div class="form-group">
	                			{!! Form::label('nombre', 'Nombre',['class' => 'control-label']) !!}
					
						 			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Jabon', 'required']) !!}
								</div>
							

							<div class="form-group">
	                			{!! Form::label('descripcion', 'Descripcion',['class' => ' control-label']) !!}
						 
						 			{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'producto de...', 'required']) !!}
							
							</div>

							<div class="form-group">
	                			{!! Form::label('imagen', 'Imagen',['class' => 'control-label']) !!}
						 	
						 			{!! Form::File('imagen', null, ['class' => 'form-control', 'placeholder' => 'examinar...', 'required']) !!}
					
							</div>

							<div class="form-group">
	                			{!! Form::label('stock', 'Stock',['class' => 'control-label']) !!}
						 		
						 			{!! Form::text('stock', null, ['class' => 'form-control', 'placeholder' => 'cantidad...', 'required']) !!}
						
							</div>

							<div class="form-group">
	                			{!! Form::label('precio', 'Precio',['class' => 'control-label']) !!}
						 	
						 			{!! Form::text('precio', null, ['class' => 'form-control', 'placeholder' => 'valor...', 'required']) !!}
								</div>
					

							<div class="form-group">
	                			{!! Form::label('id_tipo_producto', 'Tipo de Producto',['class' => 'control-label']) !!}
						 	
						 			{!! Form::select('id_tipo_producto', $lista_tipo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

							
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
</div>
@endsection	

