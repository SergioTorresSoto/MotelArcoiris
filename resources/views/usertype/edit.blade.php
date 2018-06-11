@extends('layouts.app')

@section('title', 'Editar Tipo ' . $users_type->type)

@section('content')

<div class="container">
	<div class="row">
		<div >
			{!! Form::open(['route' => ['userstype.update', $users_type], 'method' => 'PUT']) !!}


			 		{!! Form::label('type', 'Nombre de Tipo') !!}
					{!! Form::text('type', $users_type->type, ['class' => 'form-control', 'placeholder' => ' tipo', 'required']) !!}

					<p></p>
					<div align="center">
						{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
					</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection	
