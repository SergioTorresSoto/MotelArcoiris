@extends('layouts.app')

@section('title', 'Crear tipo insumo')

@section('content')


	<div class="col-md-12">
		<h3>Registrar Tipo de Insumo</h3>
		<hr/>
		<div >
			{!! Form::open(['route' => 'tipoinsumo.store','method' => 'POST']) !!}

		 		{!! Form::label('tipo', 'Nombre de tipo') !!}
				{!! Form::text('tipo', null, ['class' => 'form-control', 'placeholder' => 'tipo', 'required']) !!}


				<p></p>

				<div align="center">
					{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
				</div>

			{!! Form::close() !!}
		</div>
	</div>

@endsection	

