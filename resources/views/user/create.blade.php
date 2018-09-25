@extends('layouts.app')

@section('content')
	<div class="container">
        <div class="col-md-12">  
        	<div class="form-area">   
        	<div class="panel panel-info">
            <div class="panel-heading">  
                <h3>Crear Usuario</h3>
            </div>
                
                	<div class="panel-body">

                		{!! Form::open(['route' => 'users.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
	                			
	                			{!! Form::label('id_type', 'Tipo de Usuario',['class' => 'col-sm-12 col-md-12']) !!}
						 	
								<div class="col-sm-11 col-md-11 form-group">
		                		
							 		{!! Form::select('id_type', $lista_tipo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>
								<div class="col-sm-1 col-md-1">
							        <a href="{{ route('userstype.create') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
							     </div>  

							<div class=" panel panel-primary col-sm-12 col-md-12 ">
								<div class="panel-body">
			                		<div class="form-group nombre">
			                			{!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
								 		<div class="col-md-6">
								 			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Sergio']) !!}
										</div>
									</div>

									<div class="form-group apellido">
			                			{!! Form::label('apellido', 'Apellido',['class' => 'col-md-4 control-label']) !!}
								 		<div class="col-md-6">
								 			{!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Torres']) !!}
										</div>
									</div>

									<div class="form-group rut">
			                			{!! Form::label('rut', 'RUT',['class' => 'col-md-4 control-label']) !!}
								 		<div class="col-md-6">
								 			{!! Form::text('rut', null, ['class' => 'form-control', 'placeholder' => '117.969.921-4']) !!}
										</div>
									</div>

									<div class="form-group telefono">
			                			{!! Form::label('telefono', 'Telefono',['class' => 'col-md-4 control-label']) !!}
								 		<div class="col-md-6">
								 			{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '64033090']) !!}
										</div>
									</div>

									<div class="form-group">
			                			{!! Form::label('email', 'Correo',['class' => ' email col-md-4 control-label']) !!}
								 		<div class="col-md-6">
								 			{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'sergio@gmail.com', 'required']) !!}
										</div>
									</div>


									<div class="form-group">
			                			{!! Form::label('password_confirmation', 'Contraseña',['class' => 'col-md-4 control-label']) !!}
								 		<div class="col-md-6">
								 			{!! Form::password('password_confirmation',['class' => 'form-control', 'placeholder' => '********', 'required']) !!}
										</div>
									</div>

									<div class="form-group">
			                			{!! Form::label('password', 'Confirmar Contraseña',['class' => 'col-md-4 control-label']) !!}
								 		<div class="col-md-6">
								 			{!! Form::password('password',['class' => 'form-control', 'placeholder' => '********', 'required']) !!}
										</div>
									</div>

								</div>
							</dir>
						
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

@section('script')

<script type="text/javascript">
	
	$('#id_type').change(function(){
        insumo = $("#id_type option:selected").text();
        if(insumo=="Cliente"){
        	$(".nombre").hide("fast");
        	$(".apellido").hide("fast");
        	$(".rut").hide("fast");
        	$(".telefono").hide("fast");
        	$('.email').html('Numero Habitacion');
        	$("#email").val("");
        	$("#email").attr("placeholder", "1");
    
        }else{

        	$(".nombre").show("fast");
        	$("#nombre").prop('required',true);
        	$(".apellido").show("fast");
        	$("#apellido").prop('required',true);
        	$(".rut").show("fast");
        	$("#rut").prop('required',true);
        	$(".telefono").show("fast");
        	$("#telefono").prop('required',true);
        	$('.email').html('Correo');
        	$("#email").attr("placeholder", "sergio@gmail.com");
        }
		console.log(insumo);
    });

</script>

@endsection	