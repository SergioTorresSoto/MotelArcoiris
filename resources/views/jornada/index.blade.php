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
                <h3>Jornadas
                	<div class="btn-group pull-right">
				        <a href="{{ route('jornadas.create') }}" class="btn btn-info">Agregar Jornada</a>
				     </div>
                </h3>
            </div>
                	<div class="panel-body">
						
						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Hora Entrada</th>
								<th>Hora Salida</th>
								<th>Duracion</th>
								<th>Acción</th>
							</thead>

							<tbody>
								@foreach($jornadas as $type)
									<tr>
										<td>{{ $type->id }}</td>
										<td>{{ $type->hora_entrada }}</td>
										<td>{{ $type->hora_salida }}</td>
										<td>{{ $type->duracion_hora }} {{ $type->duracion_minuto }}</td>
										<td>
											<a href="{{ route('jornadas.edit', $type->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('jornadas.destroy', $type->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $jornadas->links() }}
						</div>
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>

@endsection