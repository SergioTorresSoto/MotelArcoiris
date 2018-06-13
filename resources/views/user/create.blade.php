@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Crear Usuario</div>
                	<div class="panel-body">

                		{!! Form::open(['route' => 'users.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
	                	
	                		<div class="form-group">
	                			{!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Sergio', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('apellido', 'Apellido',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('apellido', null, ['class' => 'form-control', 'placeholder' => 'Torres', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('rut', 'RUT',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('rut', null, ['class' => 'form-control', 'placeholder' => '117.969.921-4', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('telefono', 'Telefono',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '64033090', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('email', 'Correo',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'sergio@gmail.com', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('username', 'Username',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'SergioAdmin', 'required']) !!}
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

							<div class="form-group">
	                			{!! Form::label('id_type', 'Tipo de Usuario',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_type', $lista_tipo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

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

