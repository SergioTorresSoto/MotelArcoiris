@extends('layouts.app')

@section('title', 'Editar Estado habitacion ' . $estado_habitacion->estado)

@section('content')

<div class="container">
	<div class="row">
		<div >
			{!! Form::open(['route' => ['estadohabitacion.update', $estado_habitacion], 'method' => 'PUT']) !!}


			 		{!! Form::label('estado', 'Nombre de Estado') !!}
					{!! Form::text('estado', $estado_habitacion->estado, ['class' => 'form-control', 'placeholder' => ' estado', 'required']) !!}

					<p></p>
					<div align="center">
						{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
					</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection	
