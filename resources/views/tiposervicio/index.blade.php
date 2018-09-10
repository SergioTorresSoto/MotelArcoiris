@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-md-12" >
	<div class="panel panel-info">
        <div class="panel-heading"> 
			<h3>Tipo Servicio

				<div class="btn-group pull-right">
					<a href="{{ route('tiposervicio.create') }}" class="btn btn-info">Registrar nuevo tipo</a>
				</div>  
			</h3>
		</div>
		<div class="panel-body">
		<table class="table table-striped">
			<thead>
			<tr>
				<th>ID</th>
				<th>Tipo</th>
				<th>Acción</th>
			
			</thead>
			<tbody>
				@foreach($tipo_servicio as $type)
					<tr>
						<td>{{ $type->id }}</td>
						<td>{{ $type->tipo }}</td>
				
						<td>
							<a href="{{ route('tiposervicio.edit', $type->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
							<a href="{{ route('tiposervicio.destroy', $type->id) }}" onclick="return confirm('¿Está seguro de eliminar el tipo seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div style="text-align: center;">
			{{ $tipo_servicio->links() }}
		</div>
		</div>
	</div>
</div>
</div>
@endsection