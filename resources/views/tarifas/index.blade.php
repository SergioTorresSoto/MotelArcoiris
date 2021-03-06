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
					<h3> Tarifas
						<div class="btn-group pull-right">
					        <a href="{{ route('tarifas.create') }}" class="btn btn-info" align="right">Agregar Tarifas</a>
					     </div>  
					</h3>
				</div>


					
					<div class="panel-body" >
						
						  {!! Form::open(['route' => 'tarifas.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right']) !!}
							<div class = "form-group">

								{!! Form::select('tipo', $tarifas->lista_tipo ,null, ['class' => 'form-control', 'placeholder' => 'Tipo']) !!}
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
								<th>Horas</th>	
								<th>Valor</th>
								<th>opciones</th>
								
								
							
							</thead>
							<tbody>
								@foreach($tarifas as $hab)
									<tr>
										
										<td>{{ $hab->id }}</td>
										<td>{{ $hab->tipo }}</td>
										<td>{{ $hab->horas}}</td>
										<td>{{ $hab->precio }}</td>
										
										<td>
											
											<a href="{{ route('tarifas.edit', $hab->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('tarifas.destroy', $hab->id) }}" onclick="return confirm('¿Está seguro de eliminar la habitacion seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
										
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
						
	                </div>
	            </div>
	        </div>
</div>	        
	


@endsection