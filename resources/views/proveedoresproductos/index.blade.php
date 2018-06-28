@extends('layouts.app')

@section('content')


		<div class= "col-md-12">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif


					   <h3> Compra Productos</h3>
						<hr/>

							<a href="{{ route('proveedoresproductos.create') }}" class="btn btn-info">Asignar Proveedor a Producto</a>
					
						<div class="panel-body">
						
						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Proveedor</th>
							    <th>Precio Total</th>
								<th>Tipo Comprobante</th>
								<th>Fecha Compra</th>
								<th>Acción</th>
							
							</thead>
							<tbody>
								@foreach($proveedoresproductos as $propro)
									<tr>
										<td>{{ $propro->id }}</td>
										<td>{{ $propro->nombre }}</td>
										<td>{{ $propro->total }}</td>
										<td>{{ $propro->tipo_comprobante }}</td>
										<td>{{ $propro->created_at }}</td>
										<td>
											<a href="{{ route('proveedoresproductos.show', $propro->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a> 
											<a href="{{ route('proveedoresproductos.destroy', $propro->id) }}" onclick="return confirm('¿Está seguro de eliminar el suministro seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $proveedoresproductos->links() }}
						</div>
	                </div>
	            </div>
	       


@endsection