@extends('layouts.app')

@section('title', 'Crear tipo insumo')

@section('content')

<div class="container">
	<div class="col-md-12">
	<div class="panel panel-info">
            <div class="panel-heading"> 	
				<h3>Registrar Tipo de Servicio</h3>
			</div>
		<div class="panel-body">
			{!! Form::open(['route' => 'tiposervicio.store','method' => 'POST']) !!}

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
</div>
@endsection	

