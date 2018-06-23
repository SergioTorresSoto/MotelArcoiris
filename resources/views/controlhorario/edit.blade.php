@extends('layouts.app')

@section('title', 'Editar Tipo ' . $control->rut)

@section('style')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Control</div>
                	<div class="panel-body">
						{!! Form::open(['route' => ['controlhorario.update', $control], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
							<div class="form-group">


						 		{!! Form::label('hora_entrada', 'Hora Entrada', ['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
									{!! Form::time('hora_entrada', $control->hora_entrada, ['class' => 'form-control', 'required']) !!}

								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('fecha_entrada', 'Fecha',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			

									{!! Form::text('fecha_entrada', $control->fecha_entrada, array('id' => 'datepicker_entrada','class' => 'form-control', 'required')) !!}

								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('hora_salida', 'Hora Salida',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::time('hora_salida', $control->hora_salida, ['class' => 'form-control', 'required']) !!}
						 			
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('fecha_salida', 'Fecha',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			

									{!! Form::text('fecha_salida', $control->fecha_salida, array('id' => 'datepicker_salida','class' => 'form-control', 'required')) !!}

								</div>
							</div>

							

							
							<div class="form-group">
	                			{!! Form::label('rut', 'Rut',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('rut', $control->lista_users ,$control->id_user, ['class' => 'form-control', 'required']) !!}

								</div>
							</div>

							<div class="form-group">
	                            <div class="col-md-8 col-md-offset-4">
										{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
								</div>
							</div>

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection	

@section('script')
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	  <script>
	  $(function() {
	    $( "#datepicker_salida" ).datepicker({ dateFormat: 'yy-mm-dd ' });
	    $( "#datepicker_entrada" ).datepicker({ dateFormat: 'yy-mm-dd ' });
	  });
    </script>
@endsection

