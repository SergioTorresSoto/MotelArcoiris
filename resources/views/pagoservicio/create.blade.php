@extends('layouts.app')

@section('title', 'Crear producto')

@section('content')

<div class="container">
	<div class = "col-md-12">
		<div class="panel panel-info">
           	<div class="panel-heading"> 
				<h3>Crear Pago Servicio</h3>
			</div>
			<div class="panel-body">
				      <div class="col-sm-5 col-md-5 col-sm-offset-3 col-md-offset-3 ">
	
                		{!! Form::open(['route' => 'pagoservicio.store','method' => 'POST', 'class' => 'form-horizontal' ]) !!}
	                	
	                		<div class="form-group">
	                			{!! Form::label('id_tipo_servicio', 'Servicio') !!}
								 		
								 		{!! Form::select('id_tipo_servicio', $lista_tipo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}
								</div>
							

							<div class="form-group">
	                			{!! Form::label('fecha', 'Fecha',['class' => ' control-label']) !!}
						 
						 			{!! Form::date('fecha', null, ['class' => 'form-control', 'placeholder' => 'fecha de pago...', 'required']) !!}
							
							</div>

							<div class="form-group">
	                			{!! Form::label('valor_servicio', 'Valor',['class' => 'control-label']) !!}
						 	
						 			{!! Form::text('valor_servicio', null, ['class' => 'form-control', 'placeholder' => 'valor pago...', 'required']) !!}
					
							</div>

							<div class="form-group">
	                			{!! Form::label('cantidad', 'Cantidad',['class' => 'control-label']) !!}
						 		
						 			{!! Form::text('cantidad', null, ['class' => 'form-control', 'placeholder' => 'cantidad utilizada...', 'required']) !!}
						
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
</div>
@endsection	

