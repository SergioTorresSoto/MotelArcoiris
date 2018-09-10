@extends('layouts.app')

@section('title', 'Editar Pago ' . $pago_servicio->tipo)

@section('content')

<div class="container">
	<div class ="col-md12">
		<div class="panel panel-info">
           	<div class="panel-heading"> 
				<h3>Editar Pago Servicio</h3>
 			</div>
 			<div class="panel-body">
  				<div class="col-sm-5 col-md-5 col-sm-offset-3 col-md-offset-3 ">
                	
						{!! Form::open(['route' => ['pagoservicio.update', $pago_servicio],'method' => 'PUT', 'class' => 'form-horizontal']) !!}
							

	                	
	                		<div class="form-group">
	                			{!! Form::label('id_tipo_servicio', 'Servicio') !!}
								 		
								 		{!! Form::select('id_tipo_servicio',$pago_servicio->lista_tipo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}
								</div>
							

							<div class="form-group">
	                			{!! Form::label('fecha', 'Fecha',['class' => ' control-label']) !!}
						 
						 			{!! Form::date('fecha', $pago_servicio->fecha, ['class' => 'form-control', 'placeholder' => 'fecha de pago...', 'required']) !!}
							
							</div>

							<div class="form-group">
	                			{!! Form::label('valor_servicio', 'Valor',['class' => 'control-label']) !!}
						 	
						 			{!! Form::text('valor_servicio',$pago_servicio->valor_servicio, ['class' => 'form-control', 'placeholder' => 'valor pago...', 'required']) !!}
					
							</div>

							<div class="form-group">
	                			{!! Form::label('cantidad', 'Cantidad',['class' => 'control-label']) !!}
						 		
						 			{!! Form::text('cantidad', $pago_servicio->cantidad, ['class' => 'form-control', 'placeholder' => 'cantidad utilizada...', 'required']) !!}
						
							</div>

							
							<div class="form-group">

										{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
							
							</div>

						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
</div>
</div>
@endsection	