@extends('layouts.app')

@section('content')

<div class="container">
		<div class= "col-md-12">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif
			<div class="panel panel-info">
           		 <div class="panel-heading">  
					<h3> Insumos Para Limpieza
						<div class="btn-group pull-right">
					        <a href="{{ route('habitacionesinsumos.create') }}" class="btn btn-info">Asignar Insumos a Habitacion</a>
					
					     </div>  
					</h3>
				 </div>	
						<div class="panel-body">
						
						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Insumo</th>
							    <th>#Habitacion</th>
							    <th>Cantidad</th>
							    <th>Observacion</th>
								<th>Fecha</th>
								<th>Acción</th>
							
							</thead>
							<tbody>
								@foreach($limpieza as $lim)
									<tr>
										<td>{{ $lim->id }}</td>
										<td>{{ $lim->nombre }}</td>
										<td>{{ $lim->numero_habitacion}}</td>
										<td>{{ $lim->cantidad}}</td>
										<td>{{ $lim->observacion}}</td>
										<td>{{ $lim->created_at }}</td>
										<td>
											<a href="{{ route('habitacionesinsumos.edit', $lim->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('habitacionesinsumos.destroy', $lim->id) }}" onclick="return confirm('¿Está seguro de eliminar el suministro seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $limpieza->links() }}
						</div>
	                </div>
	            </div>
	        </div>
</div>	       


@endsection