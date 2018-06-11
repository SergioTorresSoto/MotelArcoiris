@extends('layouts.app')

@section('title', 'Editar Tipo ' . $tipo_producto->tipo)

@section('content')

<div class="container">
	<div class="row">
		<div >
			{!! Form::open(['route' => ['tipoproducto.update', $tipo_producto], 'method' => 'PUT']) !!}


			 		{!! Form::label('tipo', 'Nombre de Tipo') !!}
					{!! Form::text('tipo', $tipo_producto->tipo, ['class' => 'form-control', 'placeholder' => ' tipo', 'required']) !!}

					<p></p>
					<div align="center">
						{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
					</div>

			{!! Form::close() !!}
		</div>
	</div>
</div>
@endsection	
