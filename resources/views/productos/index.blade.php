@extends('layouts.app')

@section('content')
<div class="container">
		  <div class = "col-md-12">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif
   		<div class="panel panel-info">
           	<div class="panel-heading"> 
		    	<h3> Productos
		    		<div class="btn-group pull-right">
							<a href="{{ route('productos.create') }}" class="btn btn-info">Agregar Productos</a>
					 </div> 
		    	</h3>
			</div>
						<div class = "panel-body">
						
						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Tipo</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>imagen</th>
								<th>Stock</th>
								<th>Precio</th>
								
							
							</thead>
							<tbody>
								@foreach($productos as $prod)
									<tr>
										<td>{{ $prod->id }}</td>
										<td>{{ $prod->tipo }}</td>
										<td>{{ $prod->nombre }}</td>
										<td>{{ $prod->descripcion }}</td>
										<td><img width="100px" src=" {{Storage::url($prod->imagen) }}"></td>
										<td>{{ $prod->stock }}</td>
										<td>{{ $prod->precio}}</td>
								
								
										<td>
											<a href="{{ route('productos.edit', $prod->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('productos.destroy', $prod->id) }}" onclick="return confirm('¿Está seguro de eliminar el producto seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $productos->links() }}
						</div>
	                </div>
	            </div>
	    </div>   
</div>
@endsection