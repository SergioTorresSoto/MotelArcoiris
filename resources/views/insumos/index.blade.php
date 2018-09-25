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
            	<h3>Insumos
                	<div class="btn-group pull-right">
				        <a href="{{ route('insumos.create') }}" class="btn btn-info">Agregar Insumo</a>
				     </div>  
            </div>
               
                	<div class="panel-body">

                		      {!! Form::open(['route' => 'insumos.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right']) !!}
							<div class = "form-group">
								{!! Form::text('nombre', null ,['class' => 'form-control','placeholder'=>'Nombre Insumo']) !!}
								{!! Form::select('tipo', $insumos->lista_tipo ,null, ['class' => 'form-control', 'placeholder' => 'Tipo']) !!}
							</div>
							<div class="form-group">
			                     
								{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
										
							</div>
					{!! Form::close() !!}

						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Tipo de Insumo</th>
								<th>Nombre</th>
								<th>Descripcion</th>
								<th>Observacion</th>
								<th>Stock</th>
								<th>Opciones</th>
							
							</thead>
							<tbody>
								@foreach($insumos as $ins)
									<tr>
										<td>{{ $ins->id }}</td>
										<td>{{ $ins->tipo }}</td>
										<td>{{ $ins->nombre }}</td>
										<td>{{ $ins->descripcion }}</td>
										<td>{{ $ins->observacion }}</td>
										<td>{{ $ins->stock }}</td>

								
								
										<td>
											<a href="{{ route('insumos.edit', $ins->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('insumos.destroy', $ins->id) }}" onclick="return confirm('¿Está seguro de eliminar el insumo seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $insumos->links() }}
						</div>
	                </div>
	            </div>
	        </div>
	    </div>
	 </div>
</div>
@endsection