@extends('layouts.app')

@section('content')
<div class="col-md-12" >
	<h3>Estado Habitacion

		<div class="btn-group pull-right">
			<a href="{{ route('estadohabitacion.create') }}" class="btn btn-info">Nuevo Estado</a>
		</div>  
	</h3>
	<hr/>
		
		<table class="table table-striped">
			<thead>
			<tr>
				<th>ID</th>
				<th>Estado</th>
				<th>Acción</th>
			
			</thead>
			<tbody>
				@foreach($estado_habitacion as $est)
					<tr>
						<td>{{ $est->id }}</td>
						<td>{{ $est->estado }}</td>
				
						<td>
							<a href="{{ route('estadohabitacion.edit', $est->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
							<a href="{{ route('estadohabitacion.destroy', $est->id) }}" onclick="return confirm('¿Está seguro de eliminar el estado seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div style="text-align: center;">
			{{ $estado_habitacion->links() }}
		</div>
</div>

@endsection