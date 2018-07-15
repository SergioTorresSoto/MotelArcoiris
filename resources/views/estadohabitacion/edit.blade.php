@extends('layouts.app')

@section('title', 'Editar Estado habitacion ' . $estado_habitacion->estado)

@section('content')

<div class="container">
	<div class="col-md-12">
		<div class="panel panel-info">
           	<div class="panel-heading"> 
				<h3>Editar Estado</h3>
		    </div>
			<div class="panel-body">
                <div class="col-sm-12 col-md-12 "> 
					{!! Form::open(['route' => ['estadohabitacion.update', $estado_habitacion], 'method' => 'PUT']) !!}


					 		{!! Form::label('estado', 'Nombre de Estado') !!}
							{!! Form::text('estado', $estado_habitacion->estado, ['class' => 'form-control', 'placeholder' => ' estado', 'required']) !!}

							{!! Form::label('color', 'Color') !!}
							{!! Form::color('color', $estado_habitacion->color, ['class' => 'form-control', 'required']) !!}

					

							<p></p>
							<div align="center">
								{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
							</div>

					{!! Form::close() !!}
				</div>
			</div>
	</div>
</div>
@endsection	
