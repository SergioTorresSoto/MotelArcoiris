@extends('layouts.app')

@section('style')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>
@endsection

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
	            <h3>Control de Usuario
	            	<div class="btn-group pull-right">
				        <a href="{{ route('controlhorario.create') }}" class="btn btn-info" align="right">Marcar</a>
				     </div>  
	            </h3>
             </div>
		 				
 				
	                	
               	<div class="panel-body">

					<table class="table table-striped">
						<thead>
							<tr>
								<th>ID</th>
								<th>Rut</th>
								<th>Nombre</th>
								
								<th>Entrada</th>
								<th>Fecha</th>
								<th>Salida</th>
								<th>Fecha</th>
								<th>Acción</th>
							
						</thead>
						<tbody>
								@foreach($controlPaginado as $type)
									<tr>
										<td>{{ $type->id }}</td>
										<td>{{ $type->rut }}</td>
										<td>{{ $type->nombre }}</td>
										<td>{{ $type->hora_entrada }}</td>
										<td>{{ $type->fecha_entrada }}</td>
										<td>{{ $type->hora_salida }}</td>
										<td>{{ $type->fecha_salida }}</td>
								
										<td>
											<a href="{{ route('controlhorario.edit', $type->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('controlhorario.destroy', $type->id) }}" onclick="return confirm('¿Está seguro de eliminar al tipo seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
						</tbody>
					</table>
					<div style="text-align: center;">
						{{ $controlPaginado->links() }}
					</div>
	            </div>
	        </div>
	</div>
	
	            
	<div class="col-md-12">
		<div class="panel panel-info">
            <div class="panel-heading">		            
			<h4>Calendario</h4>
			</div>
		    <div class="panel-body">    
	            {!! $calendar->calendar() !!}
	            
	        </div>
    	</div>
	           
	</div>
</div>

@endsection
	
@section('script')
	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/es.js"></script>
	{!! $calendar->script() !!}
	<style type="text/css">
		.fc-widget-header{
	    background-color:#A9D0F5;	}
	</style>

@endsection