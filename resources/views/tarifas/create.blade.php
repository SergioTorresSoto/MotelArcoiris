@extends('layouts.app')

@section('title', 'Crear habitacion')

@section('content')
	<div class="container">
		    <div class="col-md-12">
		    	<div class="panel panel-info">
		            <div class="panel-heading">  
		                <h3>Crear Tarifa</h3>

              		</div>
              		<div class="panel-body">
	                 	<div class="col-sm-5 col-md-5  col-sm-offset-3 col-md-offset-3 ">
	                  
	                		{!! Form::open(['route' => 'tarifas.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
		                	
									<div class="form-group">
		                			{!! Form::label('horas', 'Horas',['class' => 'control-label']) !!}
			
							 			
							 			<div class="input-group">
									     
									      {!! Form::number('horas', null, ['class' => 'form-control', 'placeholder' => 'habitacion de...', 'required']) !!}
									      <div class="input-group-addon">Hrs</div>
									    </div>
									</div>
								
								<div class="form-group">
		                			{!! Form::label('precio', 'Tarifa',['class' => 'control-label']) !!}
									<div class="input-group">
										<div class="input-group-addon">$</div>     
								       		{!! Form::number('precio', null, ['class' => 'form-control', 'placeholder' => 'habitacion de...', 'required']) !!}
								        
								    </div>
							 			
								</div>


								<div class="form-group">
		                			{!! Form::label('id_tipo', 'Tipo De Habitacion',['class' => 'control-label']) !!}
							
							 			{!! Form::select('id_tipo', $lista_tipo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>
								
						

								<div class="form-group">

		                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		                            </div>
		                        

							{!! Form::close() !!}
		                 	</div>
	                 </div>
	               </div>
	            </div>
</div>

@endsection	

