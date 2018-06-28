@extends('layouts.app')

@section('content')


    	 <div class="col-md-12">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif


			<h3> Habitaciones</h3>
			<hr/>

		    <a href="{{ route('habitaciones.create') }}" class="btn btn-info" align="right">Agregar Habitaciones</a>
					
					<div class="panel-body" >	
						
						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Numero</th>
								<th>Tipo</th>
								<th>Estado</th>	
								<th>Descripcion</th>
								<th>Observacion</th>
								<th>imagen</th>
								<th>opciones</th>
								
								
							
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
										<td><img width="110px" src=" {{Storage::url($hab->imagen) }}"></td>

								
										<td>
											<div align = "right">
											<a href="{{ route('habitaciones.edit', $hab->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('habitaciones.destroy', $hab->id) }}" onclick="return confirm('¿Está seguro de eliminar la habitacion seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
											</div>
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
	        
	


@endsection