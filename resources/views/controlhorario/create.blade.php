@extends('layouts.app')

@section('title', 'Crear control')

@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Marcar Horario</div>
                	<div class="panel-body">


	                	{!! Form::open(['route' => 'controlhorario.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
	                		<div class="form-group">

					 			{!! Form::label('rut', 'Rut',['class' => 'col-md-4 control-label']) !!}
					 		

						 		<div class="col-md-6">
									{!! Form::text('rut', null, ['class' => 'form-control', 'placeholder' => '11.111.111-4', 'required']) !!}

								</div>
							</div>

							

							<div class="form-group">
	                            <div class="col-md-8 col-md-offset-4">
	                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
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

