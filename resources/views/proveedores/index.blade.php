@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif

            <div class="panel panel-default">
                <div class="panel-heading">Proveedores</div>
                	<div class="panel-body">


	                	<div align="right">
						
							<a href="{{ route('proveedores.create') }}" class="btn btn-info">Agregar Proveedor</a>
					
						</div>
						
						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Nombre</th>
								<th>Direccion</th>
								<th>Telefono</th>
								<th>Descripcion</th>
								<th>Acción</th>
							
							</thead>
							<tbody>
								@foreach($proveedores as $type)
									<tr>
										<td>{{ $type->id }}</td>
										<td>{{ $type->nombre }}</td>
										<td>{{ $type->direccion }}</td>
										<td>{{ $type->telefono }}</td>
										<td>{{ $type->descripcion }}</td>
								
										<td>
											<a href="{{ route('proveedores.edit', $type->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('proveedores.destroy', $type->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $proveedores->links() }}
						</div>
	                </div>
	            </div>
	        </div>
	</div>
</div>

@endsection