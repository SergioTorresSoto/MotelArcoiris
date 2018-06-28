@extends('layouts.app')

@section('title', 'Editar Tipo ' . $productos->nombre)

@section('content')


			<div class ="col-md12">
				<h3>Editar Productos</h3>
 					<hr/>
  				<div class="col-sm-5 col-md-5 ">
                	<div class="panel-body">
						{!! Form::open(['route' => ['productos.update', $productos,'files'=>true],'method' => 'PUT', 'class' => 'form-horizontal','enctype' => "multipart/form-data"]) !!}
							

							<div class="form-group">


						 		{!! Form::label('nombre', 'Nombre', ['class' => 'control-label']) !!}
						 		
									{!! Form::text('nombre', $productos->nombre, ['class' => 'form-control', 'required']) !!}

								
							</div>

							<div class="form-group">
	                			{!! Form::label('descripcion', 'Descripcion',['class' => 'control-label']) !!}
						 	
						 			{!! Form::text('descripcion', $productos->descripcion, ['class' => 'form-control', 'required']) !!}
								</div>
							

							<div class="form-group">
	                			{!! Form::label('imagen', 'Imagen',['class' => 'control-label']) !!}
						 		

						 		<img width="100px" src="{{Storage::url($productos->imagen)}}" >
						 			{!! Form::file('imagen',null, ['class' => 'form-control', 'required']) !!}
								</div>
							

							<div class="form-group">
	                			{!! Form::label('stock', 'Stock',['class' => 'control-label']) !!}
						 
						 			{!! Form::text('stock', $productos->stock, ['class' => 'form-control', 'required']) !!}
								
							</div>

								<div class="form-group">
	                			{!! Form::label('precio', 'Precio',['class' => 'control-label']) !!}
						 		
						 			{!! Form::text('precio', $productos->precio, ['class' => 'form-control', 'placeholder' => 'valor...', 'required']) !!}
								
							</div>

							
							
							<div class="form-group">
	                			{!! Form::label('id_tipo_producto', 'Tipo de Producto',['class' => 'control-label']) !!}
						 	
						 			{!! Form::select('id_tipo_producto', $productos->lista_tipo ,null, ['class' => 'form-control', 'required']) !!}

					
							</div>

							<div class="form-group">

										{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
							
							</div>

						{!! Form::close() !!}
					</div>
				</div>
			</div>
	

</div>
@endsection	