@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')




		<h3>Crear Tipo Producto</h3>
		<hr/>
			<div class="col-sm-5 col-md-5 ">
				<div class="panel-body">
			{!! Form::open(['route' => 'tipoproducto.store','method' => 'POST']) !!}

				<div class="form-group">

		 		{!! Form::label('tipo', 'Nombre de tipo') !!}
				{!! Form::text('tipo', null, ['class' => 'form-control', 'placeholder' => 'tipo', 'required']) !!}
		        </div>

				
					{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
			

			{!! Form::close() !!}
		</div>
	</div>

@endsection	

