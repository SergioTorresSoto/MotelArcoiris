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
                <div class="panel-heading">Usuarios
                	<div class="btn-group pull-right">
				        <a href="{{ route('usersjornadas.create') }}" class="btn btn-info btn-sm">Asignar Jornada</a>
				     </div>
                	
                		
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
								@foreach($horarios as $user)
								<tr>
									<td>{{ $user->id }} </td>    	 
									<td>{{ $user->nombre }} {{ $user->apellido }}</td> 
									<td>{{ $user->hora_entrada }} </td>
									<td>{{ $user->fecha_entrada }} </td>   
									<td>{{ $user->hora_salida }} </td>
									<td>{{ $user->fecha_salida }} </td>  
									<td>{{ $user->duracion }} </td>  
									<td>
											<a href="{{ route('usersjornadas.edit', $user->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('usersjornadas.destroy', $user->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
								</tr>
								@endforeach
								
							</tbody>
								
						</table>
						
	                </div>
	            </div>
	        </div>
	</div>
</div>

@endsection