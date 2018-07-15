@extends('layouts.app')

@section('content')

<div class="container">
    	 <div class="col-md-12">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif

			<div class="panel panel-info">
	            <div class="panel-heading">  
					<h3> Habitaciones
						<div class="btn-group pull-right">
					        <a href="{{ route('tarifas.create') }}" class="btn btn-info" align="right">Agregar Tarifas</a>
					     </div>  
					</h3>
				</div>


					
					<div class="panel-body" >	
						
						<table class="table table-striped">
							<thead>
							<tr>
							
								<th>ID</th>
								<th>Tipo</th>
								<th>Horas</th>	
								<th>Valor</th>
								<th>Observacion</th>
								
								<th>opciones</th>
								
								
							
							</thead>
							<tbody>
								@foreach($tarifas as $hab)
									<tr>
										
										<td>{{ $hab->id }}</td>
										<td>{{ $hab->tipo }}</td>
										<td>{{ $hab->horas}}</td>
										<td>{{ $hab->precio }}</td>
										
									

								
										<td>
											<div align = "right">
											<a href="{{ route('tarifas.edit', $hab->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('tarifas.destroy', $hab->id) }}" onclick="return confirm('¿Está seguro de eliminar la habitacion seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
											</div>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						
	                </div>
	            </div>
	        </div>
</div>	        
	


@endsection