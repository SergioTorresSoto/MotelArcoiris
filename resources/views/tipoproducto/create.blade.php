@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')

<div class="container">
	<div class="row">
		<div >
			{!! Form::open(['route' => 'tipoproducto.store','method' => 'POST']) !!}

		 		{!! Form::label('tipo', 'Nombre de tipo') !!}
				{!! Form::text('tipo', null, ['class' => 'form-control', 'placeholder' => 'tipo', 'required']) !!}


				<p></p>

				<div align="center">
					{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection	

