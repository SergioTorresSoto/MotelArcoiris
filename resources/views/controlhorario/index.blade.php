@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
@endsection

@section('content')

    <div class="col-md-12">
        @if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			            {{ Session::get('message') }}	
			    </div>
		@endif
				
	            <h3>Control de Usuario</h3>
                <hr/>
		 				
 				<a href="{{ route('controlhorario.create') }}" class="btn btn-info" align="right">Marcar</a>
	                	
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
								@foreach($control as $type)
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
						{{ $control->links() }}
					</div>
	            </div>
	</div>
	            
	<div class="col-md-8">
			            
		<h4>Calendario</h4>
	    <div class="panel-body">    
            {!! $calendar->calendar() !!}
            {!! $calendar->script() !!}
        </div>
    </div>
	           



@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>
{!! $calendar->script() !!}
@endsection