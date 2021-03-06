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
                <h3>Tipo Usuario
                	<div class="btn-group pull-right">
				        <a href="{{ route('userstype.create') }}" class="btn btn-info">Agregar Tipo Usuario</a>
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
								@foreach($users_type as $type)
									<tr>
										<td>{{ $type->id }}</td>
										<td>{{ $type->type }}</td>
								
										<td>
											<a href="{{ route('userstype.edit', $type->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('userstype.destroy', $type->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $users_type->links() }}
						</div>
	                </div>
	         </div>       
	</div>
</div>
@endsection