



@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
            <div class="panel panel-default">
                <div class="panel-heading">Control Horarios
                	<div align="right">
						
							<a href="{{ route('controlhorario.create') }}" class="btn btn-info" align="right">
							Marcar</a>
							
					
					</div>
                </div>

                	<div class="panel-body">

						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Rut</th>
								<th>Nombre</th>
								
								<th>Entrada</th>
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
										<td>{{ $type->hora_salida }}</td>
										<td>{{ $type->fecha }}</td>
								
										<td>
											<a href="{{ route('controlhorario.edit', $type->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('controlhorario.destroy', $type->id) }}" onclick="return confirm('¿Está seguro de eliminar al tipo seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
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