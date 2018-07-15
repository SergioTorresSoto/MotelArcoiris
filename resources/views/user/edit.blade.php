@extends('layouts.app')

@section('title', 'Editar Tipo ' . $users->nombre)

@section('content')

	<div class="container">
        <div class="col-md-12">
            <div class="panel panel-info">
            <div class="panel-heading">  
                <h3>Editar Usuario</h3>
             </div>
                	<div class="panel-body">
						{!! Form::open(['route' => ['users.update', $users], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}

	                			{!! Form::label('id_type', 'Tipo de Usuario',['class' => 'col-sm-12 col-md-12']) !!}
						 		<div class="col-sm-11 col-md-11 form-group">
						 			{!! Form::select('id_type', $users->lista_tipo ,$users->id_type, ['class' => 'form-control', 'required']) !!}

								</div>
								<div class="col-sm-1 col-md-1">
							        <a href="{{ route('userstype.create','num=>1') }}" class="btn btn-primary"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
							     </div>  
							<div class=" panel panel-primary col-sm-12 col-md-12 ">
								<div class="panel-body">
			                		<div class="form-group nombre">

							 			{!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
								 		<div class="col-md-6">
											{!! Form::text('nombre', $users->nombre, ['class' => 'form-control', 'required']) !!}

										</div>
									</div>

									<div class="form-group apellido">
			                			{!! Form::label('apellido', 'Apellido',['class' => 'col-md-4 control-label']) !!}
								 		<div class="col-md-6">
								 			{!! Form::text('apellido', $users->apellido, ['class' => 'form-control', 'required']) !!}
										</div>
									</div>

									<div class="form-group rut">
			                			{!! Form::label('rut', 'RUT',['class' => 'col-md-4 control-label']) !!}
								 		<div class="col-md-6">
								 			{!! Form::text('rut', $users->rut, ['class' => 'form-control', 'required']) !!}
										</div>
									</div>

									<div class="form-group telefono">
			                			{!! Form::label('telefono', 'Telefono',['class' => 'col-md-4 control-label']) !!}
								 		<div class="col-md-6">
								 			{!! Form::text('telefono', $users->telefono, ['class' => 'form-control', 'required']) !!}
										</div>
									</div>

									<div class="form-group">
			                			{!! Form::label('email', 'Correo',['class' => 'col-md-4 control-label']) !!}
								 		<div class="col-md-6">
								 			{!! Form::text('email', $users->email, ['class' => 'form-control', 'required']) !!}
										</div>
									</div>
								</div>
							</dir>

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
@endsection	

@section('script')
<script type="text/javascript">
	
	$('#id_type').change(function(){
        insumo = $("#id_type option:selected").text();
        if(insumo=="Cliente"){
        	$(".nombre").hide();
        	$(".apellido").hide();
        	$(".rut").hide();
        	$(".telefono").hide();
        }else{
        	$(".nombre").show();
        	$("#nombre").prop('required',true);
        	$(".apellido").show();
        	$("#apellido").prop('required',true);
        	$(".rut").show();
        	$("#rut").prop('required',true);
        	$(".telefono").show();
        	$("#telefono").prop('required',true);
        }
		console.log(insumo);
    });

</script>

@endsection	