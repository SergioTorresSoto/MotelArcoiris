@extends('layouts.app')

@section('content')

<div class="container">
		<div class= "col-md-12">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif
				<div class="panel panel-info">
           		 	<div class="panel-heading">  

					   <h3> Lista Compras
					   	<div class="btn-group pull-right">
							<a href="{{ route('proveedoresproductos.create') }}" class="btn btn-info">Comprar Productos</a>
					     </div>  
					   </h3>
					</div>

				
					
						<div class="panel-body">

						{!! Form::open(['route' => 'proveedoresproductos.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right']) !!}

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
							    <th>Precio Total</th>
								<th>Tipo Comprobante</th>
								<th>Fecha Compra</th>
								<th>Acción</th>
							
							</thead>
							<tbody>
								@foreach($proveedoresproductos as $propro)
									<tr>
										<td>{{ $propro->id }}</td>
										<td>{{ $propro->nombre }}</td>
										<td>{{ $propro->total }}</td>
										<td>{{ $propro->tipo_comprobante }}</td>
										<td>{{ $propro->created_at }}</td>
										<td>
											<a href="{{ route('proveedoresproductos.show', $propro->id) }}" class="btn btn-primary"><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span></a> 
											<a href="{{ route('proveedoresproductos.edit', $propro->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('proveedoresproductos.destroy', $propro->id) }}" onclick="return confirm('¿Está seguro de eliminar el suministro seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $proveedoresproductos->links() }}
						</div>
	                </div>
	            </div>
	        </div>
</div>	       


@endsection