@extends('layouts.app')

@section('content')
<div class="container">
		  <div class = "col-md-12">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif
   		<div class="panel panel-info">
           	<div class="panel-heading"> 
		    	<h3> Pago De Servicios
		    		<div class="btn-group pull-right">
							<a href="{{ route('pagoservicio.create') }}" class="btn btn-info">Agregar Pago de servicio</a>
					 </div> 
		    	</h3>
			</div>
						<div class = "panel-body">
						
						      {!! Form::open(['route' => 'pagoservicio.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right']) !!}
							<div class = "form-group">
								{!! Form::select('tipo', $pago_servicio->lista_tipo ,null, ['class' => 'form-control', 'placeholder' => 'Tipo']) !!}
							</div>

							<div class="input-group">
							<div class="input-group-addon"><span class="glyphicon glyphicon-menu-left"></span></div>
							{!! Form::date('fecha',null, ['class' => 'form-control']) !!}
								</div>
							<div class="form-group">
			                     
								{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
										
							</div>
					{!! Form::close() !!}


						<table class="table table-striped">
							<thead>
							<tr>
								<th>ID</th>
								<th>Tipo</th>
								<th>Fecha</th>
								<th>Valor Servicio</th>
								<th>cantidad</th>
					
								
							
							</thead>
							<tbody>
								@foreach($pago_servicio as $pago)
									<tr>
										<td>{{ $pago->id }}</td>
										<td>{{ $pago->tipo }}</td>
										<td>{{ $pago->fecha }}</td>
										<td>{{ $pago->valor_servicio }}</td>
										<td>{{ $pago->cantidad }}</td>
					
								
								
										<td>
											<a href="{{ route('pagoservicio.edit', $pago->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('pagoservicio.destroy', $pago->id) }}" onclick="return confirm('¿Está seguro de eliminar el pago seleccionado?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						<div style="text-align: center;">
							{{ $pago_servicio->links() }}
						</div>
	                </div>
	            </div>
	    </div>   
</div>
@endsection