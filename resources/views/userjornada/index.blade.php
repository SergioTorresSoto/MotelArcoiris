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
                <div id="calendar" class="panel-body">    
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
				  {!! Form::open(['route' => 'usersjornadas.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right']) !!}
							<div class = "form-group">
								{!! Form::text('nombre', null ,['class' => 'form-control','placeholder'=>'Nombre Usuario']) !!}
							</div>
							<div class="form-group">
			                     
								{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
										
							</div>
					{!! Form::close() !!}
				
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
		            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
				<h3 class="modal-title" id="lineModalLabel">My Modal</h3>
		        </div>
		        <div id="modalBody" class="modal-body"> 
		 <!-- content goes here -->
					<form>
						<div class="form-group hidden">
	                			{!! Form::label('id', 'id',['class' => 'control-label']) !!}
						 		
						 		{!! Form::number('id', 0, null, ['class' => 'form-control']) !!}

								
						</div>
						<div class="form-group">
	                			{!! Form::label('id_user', 'Usuario',['class' => 'control-label']) !!}
						 		
						 		{!! Form::select('id_user', $users, null, ['class' => 'form-control', 'required']) !!}

								
						</div>
		            	
						<div class="form-group">
	                		{!! Form::label('id_jornada', 'Jornada',['class' => 'control-label']) !!}						 
						 	{!! Form::select('id_jornada',$jornadas, null, ['class' => 'form-control', 'required']) !!}
							
						</div>
						<div class="form-group">
	                			{!! Form::label('fecha_entrada', 'Fecha Entrada',['class' => 'control-label']) !!}
						 		
						 			
									{!! Form::date('fecha_entrada', null, ['class' => 'form-control', 'required']) !!}

							
						</div>
						<div class="form-group">
	                		{!! Form::label('color', 'Color',['class' => 'control-label']) !!}
							{!! Form::color('color', null, ['class' => 'form-control', 'required']) !!}

								
						</div>

		             
		            </form>
		        </div>
		        <div class="modal-footer">
		            <div class="btn-group btn-group-justified" role="group" aria-label="group button">
						<div class="btn-group" role="group">
							<button type="button" class="btn btn-default" data-dismiss="modal"  role="button">Close</button>
						</div>
						<div class="btn-group btn-delete hidden" role="group">
							<button type="button" id="eliminar" class="btn btn-default btn-hover-red" data-dismiss="modal"  role="button">Delete</button>
						</div>
						<div class="btn-group" role="group">
							<button type="button" id="guardar" class="btn btn-default btn-hover-green" data-action="save" role="button">Save</button>
						</div>
					</div>
		        </div>
		    </div>
		</div>
	</div>
</div>
</div>

@endsection

@section('script')

	<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/locale/es.js"></script>

	{!! $calendar->script() !!}
	
	





	<style type="text/css">
		.fc-widget-header{
	    background-color:#A9D0F5;
	}
	</style>
@endsection