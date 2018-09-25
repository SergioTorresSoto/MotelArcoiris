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

				<h3> Habitaciones
					@auth
					<div class="btn-group pull-right">
				        <a href="{{ route('habitaciones.create') }}" class="btn btn-info" align="right">Agregar Habitaciones</a>
				     </div>  
				     @endauth
				</h3>
				</div>


		    
					
					<div class="panel-body" >	
					

	                {!! Form::open(['route' => 'habitaciones.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right']) !!}
							<div class = "form-group">
								{!! Form::text('numero_habitacion', null ,['class' => 'form-control','placeholder'=>'Nombre Habitacion']) !!}
								{!! Form::select('tipo', $habitacion->lista_tipo ,null, ['class' => 'form-control', 'placeholder' => 'Tipo']) !!}
							</div>
							<div class="form-group">
			                     
								{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
										
							</div>
					{!! Form::close() !!}


						<table class="table table-striped">
							@auth
							<thead>
							<tr>
							
								<th>Hab</th>
								<th>Tipo</th>
								<th>Estado</th>	
								<th>Descripcion</th>
								<th>Observacion</th>
								<th>imagen</th>
								<th>opciones</th>
								
								
							
							</thead>
							<tbody>
								@foreach($habitacion as $hab)
									<tr>
										
										<td>#{{ $hab->numero_habitacion }}</td>
										<td>{{ $hab->tipo }}</td>
										<td>{{ $hab->estado}}</td>
										<td>{{ $hab->descripcion }}</td>
										<td>{{ $hab->observacion}}</td>
										<td><img width="110px" src=" {{Storage::url($hab->imagen) }}"></td>

								
										<td>
											<div align = "right">
											<a href="{{ route('habitaciones.edit', $hab->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
											<a href="{{ route('habitaciones.destroy', $hab->id) }}" onclick="return confirm('¿Está seguro de eliminar la habitacion seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
											</div>
										</td>
									</tr>
									

									

								@endforeach
							</tbody>
							@endauth


							@guest
							<thead>
							<tr>
							
								<th>Hab</th>
								<th>imagen</th>
								<th>Tipo</th>
								<th>Descripcion</th>
								
								
								
							
							</thead>
							<tbody>
								@foreach($habitacion as $hab)
									<tr>
											
										<td>#{{ $hab->numero_habitacion }}</td>
										<td><img width="320px" src=" {{Storage::url($hab->imagen) }}"></td>
										<td>{{ $hab->tipo }}</td>
										<td>{{ $hab->descripcion }}</td>
									

									</tr>
									

									

								@endforeach
							</tbody>
							@endguest


						</table>
						<div style="text-align: center;">
							{{ $habitacion->links() }}
						</div>
	                </div>
	            </div>  
		</div>
</div>

@endsection