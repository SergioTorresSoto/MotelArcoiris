@extends('layouts.app')
@section('style')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.min.css"/>
@endsection
@section('content')
<div class="container" >
    <div class="col-md-12">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif
            <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Empleados
                	<div class="btn-group pull-right">
				        <a href="{{ route('usersjornadas.create') }}" class="btn btn-info ">Asignar Jornada</a>
				     </div>
                		
                </h3>
            </div>
                <div class="panel-body">    
	            {!! $calendar->calendar() !!}
	            
	        	</div>

                	
	            </div>
	        </div>

	<div class="col-md-12">
		<div class="panel panel-info">
            <div class="panel-heading">		            
			<h4>Calendario</h4>
			</div>
			<div class="panel-body">

						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Nombre</th>
								
								<th>Hora Entrada</th>
								<th>Fecha Entrada</th>
								<th>Hora Salida</th>
								<th>Fecha Salida</th>
								<th>Duracion</th>
								<th>Acción</th>
							
							</thead>
							<tbody>
								@foreach($horariosPaginados as $user)
								<tr>
									<td>{{ $user->id }} </td>    	 
									<td>{{ $user->nombre }} {{ $user->apellido }}</td> 
									<td>{{ $user->hora_entrada }} </td>
									<td>{{ $user->fecha_entrada }} </td>   
									<td>{{ $user->hora_salida }} </td>
									<td>{{ $user->fecha_salida }} </td>  
									<td>{{ $user->duracion_hora }} {{ $user->duracion_minuto }} </td>  
									<td>
											<a href="{{ route('usersjornadas.edit', $user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('usersjornadas.destroy', $user->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
								</tr>
								@endforeach
								
							</tbody>
								
						</table>
						<div style="text-align: center;">
							{{ $horariosPaginados->links() }}
						</div>
	                </div>
		    
    </div>
    <div id="calendarModal" class="modal fade">
		<div class="modal-dialog">
		    <div class="modal-content">
		        <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span> <span class="sr-only">close</span></button>
		            <h4 id="modalTitle" class="modal-title"></h4>
		        </div>
		        <div id="modalBody" class="modal-body"> 

		        </div>
		        <div class="modal-footer">
		            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        </div>
		    </div>
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
    background-color:#A9D0F5;
}
</style>
@endsection