@extends('layouts.app')

@section('title', 'Editar Tipo ' . $jornadas->id)

@section('style')
	
@endsection

@section('content')


   <div class="container">
        <div class="col-md-12">
            <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Editar Jornada</h3>
            </div>
                	<div class="panel-body">
						{!! Form::open(['route' => ['jornadas.update', $jornadas], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
							<div class="form-group">


						 		{!! Form::label('hora_entrada', 'Hora Entrada', ['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
									{!! Form::time('hora_entrada', $jornadas->hora_entrada, ['class' => 'form-control', 'required']) !!}

								</div>
							</div>

							<div class="form-group">

					 			{!! Form::label('duracion', 'Duracion hora',['class' => 'col-md-4 control-label']) !!}
					 		

						 		<div class="col-md-2">
									{!! Form::select('duracion_hora', array('6 hours' => '6', '12 hours' => '12'), $jornadas->duracion_hora,['class' => 'form-control', 'placeholder' => '']) !!}

								</div>
								<div class="col-md-1">
									{!! Form::label('hora_entrada', 'Hrs', ['class' => 'col-md-3 control-label']) !!}

								</div>
								<div class="col-md-2">
									{!! Form::select('duracion_minuto',
									array('15 minutes' => '15',
									 	  '30 minutes' => '30',
									 	  '45 minutes'=> '45',
									 	  ), $jornadas->duracion_minuto, ['class' => 'form-control', 'placeholder' => '']) !!}

								</div>
								<div class="col-md-1">
									{!! Form::label('hora_entrada', 'Min', ['class' => 'col-md-3 control-label']) !!}

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
@endsection	



