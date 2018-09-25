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
                <h3>Compra de Insumos
                	<div class="btn-group pull-right">
				       <a href="{{ route('proveedoresinsumos.create') }}" class="btn btn-info">Comprar Insumo</a>
				     </div>
                </h3>
            </div>
                	<div class="panel-body">
	       			
                
						      {!! Form::open(['route' => 'proveedoresinsumos.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right']) !!}
						      	<div class = "form-group">
								{!! Form::text('nombre', null ,['class' => 'form-control','placeholder'=>'Nombre Proveedor']) !!}
								</div>
								<div class="input-group">
									<div class="input-group-addon"><span class="glyphicon glyphicon-menu-left"></span></div>

									{!! Form::date('created_at',null, ['class' => 'form-control']) !!}
								</div>
							<div class="form-group">
			                     
								{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
										
							</div>
							{!! Form::close() !!}
										

						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Proveedor</th>
								<th>Total</th>
								<th>Tipo Comprobante</th>
								<th>Fecha Compra</th>
								<th>Acción</th>
							
							</thead>
							<tbody>
								@foreach($proveedoresinsumos as $type)
									<tr>
										<td>{{ $type->id }}</td>
										<td>{{ $type->nombre }}</td>
										<td>$ {{ $type->total }}</td>
										<td>{{ $type->tipo_comprobante }}</td>
										<td>{{ $type->created_at }}</td>
										<td>
											<a href="{{ route('proveedoresinsumos.show', $type->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a> 
											<a href="{{ route('proveedoresinsumos.edit', $type->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('proveedoresinsumos.destroy', $type->id) }}" onclick="return confirm('¿Está seguro de eliminar al usuario seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $proveedoresinsumos->links() }}
						</div>
	                </div>
	            </div>
	        </div>
	    </div>    
</dir>
@endsection