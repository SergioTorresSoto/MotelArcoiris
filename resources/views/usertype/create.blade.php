@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')

<div class="container">
	<div class="row">
		<div >
			{!! Form::open(['route' => 'userstype.store','method' => 'POST']) !!}

		 		{!! Form::label('name_type', 'Nombre de tipo') !!}
				{!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'tipo', 'required']) !!}


				<p></p>

				<div align="center">
					{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection	

