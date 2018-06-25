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
                <div class="panel-heading">Tipo Usuario</div>
                	<div class="panel-body">


	                	<div align="right">
						
							<a href="{{ route('proveedoresinsumos.create') }}" class="btn btn-info">Asignar Proveedor a Insumo</a>
					
						</div>
						
						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Proveedor</th>
								<th>Insumo</th>
								<th>Marca</th>
								<th>Cantidad</th>
								<th>Precio Unidad</th>
								<th>Precio Total</th>
								<th>Tipo Comprobante</th>
								<th>Fecha Compra</th>
								<th>Acción</th>
							
							</thead>
							<tbody>
								@foreach($proveedoresinsumos as $type)
									<tr>
										<td>{{ $type->id }}</td>
										<td>{{ $type->nombre_proveedor }}</td>
										<td>{{ $type->nombre }}</td>
										<td>{{ $type->marca }}</td>
										<td>{{ $type->cantidad }}</td>
										<td>{{ $type->precio_unitario }}</td>
										<td>{{ $type->precio_total }}</td>
										<td>{{ $type->tipo_comprobante }}</td>
										<td>{{ $type->created_at }}</td>
										<td>
											<a href="{{ route('proveedoresinsumos.edit', $type->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('proveedoresinsumos.destroy', $type->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $proveedoresinsumos->links() }}
						</div>
	                </div>
	            </div>
	        </div>
	</div>
</div>

@endsection