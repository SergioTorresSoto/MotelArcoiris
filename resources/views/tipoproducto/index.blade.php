@extends('layouts.app')

@section('content')
<div class="container" >
	<p></p>

	<div align="right">
		
		<a href="{{ route('tipoproducto.create') }}" class="btn btn-info">Registrar nuevo tipo</a>
	
</div>
		<p></p>
		<table class="table table-striped">
			<thead>
			<tr>
				<th>ID</th>
				<th>Tipo</th>
				<th>Acción</th>
			
			</thead>
			<tbody>
				@foreach($tipo_producto as $type)
					<tr>
						<td>{{ $type->id }}</td>
						<td>{{ $type->tipo }}</td>
				
						<td>
							<a href="{{ route('tipoproducto.edit', $type->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
							<a href="{{ route('tipoproducto.destroy', $type->id) }}" onclick="return confirm('¿Está seguro de eliminar al tipo seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
</div>

@endsection