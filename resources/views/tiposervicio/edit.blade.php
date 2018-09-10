@extends('layouts.app')

@section('title', 'Editar Tipo insumo ' . $tipo_servicio->tipo)

@section('content')

<div class="container">
	<div class="col-md-12">
		<div class="panel panel-info">
            <div class="panel-heading"> 
				<h3>Editar Tipo Servicio</h3>
			</div>
			<div class="panel-body">
				{!! Form::open(['route' => ['tiposervicio.update', $tipo_servicio], 'method' => 'PUT']) !!}


				 		{!! Form::label('tipo', 'Nombre de Tipo') !!}
						{!! Form::text('tipo', $tipo_servicio->tipo, ['class' => 'form-control', 'placeholder' => ' tipo', 'required']) !!}

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
