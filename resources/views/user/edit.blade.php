@extends('layouts.app')

@section('title', 'Editar Tipo ' . $users->nombre)

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tipo Usuario</div>
                	<div class="panel-body">
						{!! Form::open(['route' => ['users.update', $users], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
							<div class="form-group">


						 		{!! Form::label('nombre', 'Nombre', ['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
									{!! Form::text('nombre', $users->nombre, ['class' => 'form-control', 'required']) !!}

								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('apellido', 'Apellido',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('apellido', $users->apellido, ['class' => 'form-control', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('rut', 'RUT',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('rut', $users->rut, ['class' => 'form-control', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
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

							<div class="form-group">
	                			{!! Form::label('username', 'Username',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('username', $users->username, ['class' => 'form-control', 'required']) !!}
								</div>
							</div>

							
							<div class="form-group">
	                			{!! Form::label('id_type', 'Tipo de Usuario',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_type', $users->lista_tipo ,null, ['class' => 'form-control', 'required']) !!}

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
</div>
@endsection	