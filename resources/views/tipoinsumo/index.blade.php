@extends('layouts.app')

@section('content')
<div class="col-md-12" >
	<h3>Tipo Insumo

		<div class="btn-group pull-right">
			<a href="{{ route('tipoinsumo.create') }}" class="btn btn-info">Registrar nuevo tipo</a>
		</div>  
	</h3>
	<hr/>

		<table class="table table-striped">
			<thead>
			<tr>
				<th>ID</th>
				<th>Tipo</th>
				<th>Acción</th>
			
			</thead>
			<tbody>
				@foreach($tipo_insumo as $type)
					<tr>
						<td>{{ $type->id }}</td>
						<td>{{ $type->tipo }}</td>
				
						<td>
							<a href="{{ route('tipoinsumo.edit', $type->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
							<a href="{{ route('tipoinsumo.destroy', $type->id) }}" onclick="return confirm('¿Está seguro de eliminar el tipo seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
		<div style="text-align: center;">
			{{ $tipo_insumo->links() }}
		</div>
</div>

@endsection