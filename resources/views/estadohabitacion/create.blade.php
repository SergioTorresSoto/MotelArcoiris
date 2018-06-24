@extends('layouts.app')

@section('title', 'Crear estado habitacion')

@section('content')

<div class="container">
	<div class="row">
		<div >
			{!! Form::open(['route' => 'estadohabitacion.store','method' => 'POST']) !!}

		 		{!! Form::label('estado', 'Nombre de estado') !!}
				{!! Form::text('estado', null, ['class' => 'form-control', 'placeholder' => 'estado', 'required']) !!}


				<p></p>

				<div align="center">
					{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection	

