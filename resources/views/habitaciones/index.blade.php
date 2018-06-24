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
                <div class="panel-heading">Habitaciones</div>
                	<div class="panel-body">


	                	<div align="right">
						
							<a href="{{ route('habitaciones.create') }}" class="btn btn-info">Agregar Habitaciones</a>
					
						</div>
						
						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Numero De Habitacion</th>
								<th>Tipo De Habitacion</th>
								<th>Estado De habitacion</th>	
								<th>Descripcion</th>
								<th>Observacion</th>
								<th>imagen</th>
								
								
							
							</thead>
							<tbody>
								@foreach($habitacion as $hab)
									<tr>
										<td>{{ $hab->id }}</td>
										<td>{{ $hab->numero_habitacion }}</td>
										<td>{{ $hab->tipo }}</td>
										<td>{{ $hab->estado}}</td>
										<td>{{ $hab->descripcion }}</td>
										<td>{{ $hab->observacion}}</td>
										<td><img width="100px" src=" {{Storage::url($hab->imagen) }}"></td>

								
								
										<td>
											<a href="{{ route('habitaciones.edit', $hab->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('habitaciones.destroy', $hab->id) }}" onclick="return confirm('¿Está seguro de eliminar la habitacion seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $habitacion->links() }}
						</div>
	                </div>
	            </div>
	        </div>
	</div>
</div>

@endsection