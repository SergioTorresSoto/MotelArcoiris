@extends('layouts.app')

@section('title', 'Crear control')

@section('content')

	<div class="container">
        <div class="col-md-12">
        	   @if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			            {{ Session::get('message') }}	
			    </div>
				@endif
        	<div class="panel panel-info">
            <div class="panel-heading">	
                <h3>Marcar Horario</h3>
            </div>
                	
	                	<div class="panel-body">


		                	{!! Form::open(['route' => 'controlhorario.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
		                	<div class="col-sm-12 col-md-12">
		                		<div class="form-group">

						 			{!! Form::label('rut', 'Rut',['class' => 'control-label']) !!}
						 		

							 		
										{!! Form::text('rut', null, ['class' => 'form-control', 'placeholder' => '11.111.111-4', 'required']) !!}

									
								</div>

								

								<div class="form-group" align="center">
		                           
		                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		                            </div>
		                       
		                    </div>
							{!! Form::close() !!}

	                 	
	                </div>
                </div>
           	</div>
        </div>
     </div>
@endsection	

