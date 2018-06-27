@extends('layouts.app')

@section('title', 'Crear control')

@section('content')


        <div class="col-md-12">
            
                <h3>Marcar Horario</h3>
                <hr/>
                	<div class="col-sm-5 col-md-5 ">
	                	<div class="panel-body">


		                	{!! Form::open(['route' => 'controlhorario.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
		                		<div class="form-group">

						 			{!! Form::label('rut', 'Rut',['class' => 'control-label']) !!}
						 		

							 		
										{!! Form::text('rut', null, ['class' => 'form-control', 'placeholder' => '11.111.111-4', 'required']) !!}

									
								</div>

								

								<div class="form-group">
		                           
		                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		                            </div>
		                       

							{!! Form::close() !!}

	                 	</div>
	                </div>
                </div>
           
        </div>

@endsection	

