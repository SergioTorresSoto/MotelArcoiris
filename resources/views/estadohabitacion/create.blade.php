@extends('layouts.app')

@section('title', 'Crear estado habitacion')

@section('style')

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	
@endsection

@section('content')

<div class="container">
	<div class="col-md-12">
		<div class="panel panel-info">
           	<div class="panel-heading"> 
				<h3>Crear Estado</h3>
	        </div>
			<div class="panel-body">
                <div class="col-sm-12 col-md-12 "> 
					{!! Form::open(['route' => 'estadohabitacion.store','method' => 'POST']) !!}

				 		{!! Form::label('estado', 'Nombre de estado') !!}
						{!! Form::text('estado', null, ['class' => 'form-control', 'placeholder' => 'estado', 'required']) !!}

						{!! Form::label('color', 'Color') !!}
						{!! Form::color('color', null, ['class' => 'form-control', 'required']) !!}



						<p></p>

					<div align="center">
						{!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
					</div>

					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>

@endsection	

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
	<script type="text/javascript">
$('#icono').selectpicker();
	</script>

@endsection

