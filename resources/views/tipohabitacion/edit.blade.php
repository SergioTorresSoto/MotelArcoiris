@extends('layouts.app')

@section('title', 'Editar Tipo habitacion ' . $tipo_habitacion->tipo)

@section('content')

<div class="container">
	<div class="col-md-12">
		<div class="panel panel-info">
    	<div class="panel-heading">
		<h3>Editar Tipo Habitacion</h3>
		</div>
		<div class="panel-body ">
		<div >
			{!! Form::open(['route' => ['tipohabitacion.update', $tipo_habitacion], 'method' => 'PUT']) !!}


			 		{!! Form::label('tipo', 'Nombre de Tipo') !!}
					{!! Form::text('tipo', $tipo_habitacion->tipo, ['class' => 'form-control', 'placeholder' => ' tipo', 'required']) !!}

					<p></p>
					<div align="center">
						{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
					</div>

			{!! Form::close() !!}
		</div>
	</div>
	</div>
</div>
</div>
@endsection	
