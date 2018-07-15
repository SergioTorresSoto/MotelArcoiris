@extends('layouts.app')

@section('title', 'Editar Tipo ' . $control->rut)

@section('style')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
  
@endsection

@section('content')
	<div class="container">
 		<div class="col-sm-12 col-md-12">
 			<div class="panel panel-info">
            <div class="panel-heading"> 
    			<h3 >Editar Control</h3>
    	 	</div>
    	 		<div class="panel-body">
	       		 <div class="col-sm-12 col-md-12 ">
	                
	                	
							{!! Form::open(['route' => ['controlhorario.update', $control], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
								<div class="form-group ">

							 		{!! Form::label('hora_entrada', 'Hora Entrada', ['class' => 'control-label']) !!}
							 		
									{!! Form::time('hora_entrada', $control->hora_entrada, ['class' => 'form-control', 'required']) !!}

								</div>

								<div class="form-group">
		                			{!! Form::label('fecha_entrada', 'Fecha',['class' => 'control-label']) !!}
							 	
									{!! Form::text('fecha_entrada', $control->fecha_entrada, array('id' => 'datepicker_entrada','class' => 'form-control', 'required')) !!}

									
								</div>

								<div class="form-group">
		                			{!! Form::label('hora_salida', 'Hora Salida',['class' => 'control-label']) !!}
							 		
							 		{!! Form::time('hora_salida', $control->hora_salida, ['class' => 'form-control', 'required']) !!}
							 			
									
								</div>

								<div class="form-group">
		                			{!! Form::label('fecha_salida', 'Fecha',['class' => 'control-label']) !!}
							 		
							 			

										{!! Form::text('fecha_salida', $control->fecha_salida, array('id' => 'datepicker_salida','class' => 'form-control', 'required')) !!}

									
								</div>

								

								
								<div class="form-group">
		                			{!! Form::label('rut', 'Rut',['class' => 'control-label']) !!}
							 		
							 			{!! Form::select('rut', $control->lista_users ,$control->id_user, ['class' => 'form-control', 'required']) !!}

								
								</div>

								<div class="form-group" align="center">
		                            
											{!! Form::submit('Editar', ['class' => 'btn btn-primary']) !!}
									
								</div>

							{!! Form::close() !!}
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

