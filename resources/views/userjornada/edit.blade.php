@extends('layouts.app')

@section('title', 'Crear tipo')

@section('style')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

@endsection

@section('content')

<div class="container"> 
        <div class="col-md-12">
            <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Asignar Jornada</h3>
            </div>
                	<div class="panel-body">

                		{!! Form::open(['route' =>  ['usersjornadas.update', $userjornada],'method' => 'PUT', 'class' => 'form-horizontal']) !!}
	                	
	                		<div class="form-group">
	                			{!! Form::label('rut', 'Usuario',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_user', $users, $userjornada->id_user, ['class' => 'form-control', 'required']) !!}

								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('jornada', 'Jornada',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_jornada',$jornadas, $userjornada->id_jornada, ['class' => 'form-control', 'required']) !!}

								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('fecha_entrada', 'Fecha Entrada',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			
									{!! Form::text('fecha_entrada', $userjornada->fecha_entrada, array('id' => 'datepicker_entrada','class' => 'form-control', 'required')) !!}

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

@section('script')
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	  <script>
	  $(function() {
	    
	    $( "#datepicker_entrada" ).datepicker({ dateFormat: 'yy-mm-dd ' });
	  });
    </script>

   
@endsection