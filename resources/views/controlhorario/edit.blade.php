@extends('layouts.app')

@section('title', 'Editar Tipo ' . $control->rut)

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
	                			{!! Form::label('hora_salida', 'Hora Salida',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::time('hora_salida', $control->hora_salida, ['class' => 'form-control', 'required']) !!}
						 			
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('fechal', 'Fecha',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			

									{!! Form::text('fecha', $control->fecha, array('id' => 'datepicker','class' => 'form-control', 'required')) !!}

								</div>
							</div>

							

							
							<div class="form-group">
	                			{!! Form::label('rut', 'Rut',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('rut', $control->lista_users ,null, ['class' => 'form-control', 'required']) !!}

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

