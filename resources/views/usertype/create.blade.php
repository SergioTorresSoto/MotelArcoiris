@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tipo Usuario</div>
                	<div class="panel-body">


	                	{!! Form::open(['route' => 'userstype.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
	                		<div class="form-group">

					 			{!! Form::label('name_type', 'Tipo Usuario',['class' => 'col-md-4 control-label']) !!}
					 		

						 		<div class="col-md-6">
									{!! Form::text('type', null, ['class' => 'form-control', 'placeholder' => 'Tipo', 'required']) !!}

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

