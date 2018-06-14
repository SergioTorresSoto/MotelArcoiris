@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Productos</div>
                	<div class="panel-body">


	                	<div align="right">
						
							<a href="{{ route('productos.create') }}" class="btn btn-info">Agregar Productos</a>
					
						</div>
						
						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>tipo_producto</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>imagen</th>
								<th>Stock</th>
								
							
							</thead>
							<tbody>
								@foreach($productos as $prod)
									<tr>
										<td>{{ $prod->id }}</td>
										<td>{{ $prod->id_tipo_producto }}</td>
										<td>{{ $prod->nombre }}</td>
										<td>{{ $prod->descripcion }}</td>
										<td>{{ $prod->imagen }}</td>
										<td>{{ $prod->stock }}</td>
								
								
										<td>
											<a href="{{ route('productos.edit', $prod->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('productos.destroy', $prod->id) }}" onclick="return confirm('¿Está seguro de eliminar el producto seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>

	                </div>
	            </div>
	        </div>
	</div>
</div>

@endsection