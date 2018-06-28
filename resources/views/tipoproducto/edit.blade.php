@extends('layouts.app')

@section('title', 'Editar Tipo ' . $tipo_producto->tipo)

@section('content')

   
		    <h3> Habitaciones</h3>
			<hr/>
			<div class="col-sm-5 col-md-5 ">
			<div class="panel-body">
			{!! Form::open(['route' => ['tipoproducto.update', $tipo_producto], 'method' => 'PUT']) !!}

					<div class="form-group">
			 		{!! Form::label('tipo', 'Nombre de Tipo') !!}
					{!! Form::text('tipo', $tipo_producto->tipo, ['class' => 'form-control', 'placeholder' => ' tipo', 'required']) !!}
					</div>
				
						{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
				

			{!! Form::close() !!}
		</div>
	</div>

@endsection	
