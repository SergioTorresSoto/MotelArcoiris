@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')




<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Tipo Usuario</div>
                	<div class="panel-body">


	                	{!! Form::open(['route' => 'proveedores.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
	                		<div class="form-group">

					 			{!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
					 		

						 		<div class="col-md-6">
									{!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Supermercado Lider', 'required']) !!}

								</div>
							</div>

							<div class="form-group">

					 			{!! Form::label('direccion', 'Direccion',['class' => 'col-md-4 control-label']) !!}
					 		

						 		<div class="col-md-6">
									{!! Form::text('direccion', null, ['class' => 'form-control', 'placeholder' => 'Los Notros 123 Coronel', 'required']) !!}

								</div>
							</div>

							<div class="form-group">

					 			{!! Form::label('telefono', 'Telefono',['class' => 'col-md-4 control-label']) !!}
					 		

						 		<div class="col-md-6">
									{!! Form::text('telefono', null, ['class' => 'form-control', 'placeholder' => '12345678', 'required']) !!}

								</div>
							</div>

							<div class="form-group">

					 			{!! Form::label('descripcion', 'Descripcion',['class' => 'col-md-4 control-label']) !!}
					 		

						 		<div class="col-md-6">
									{!! Form::text('descripcion', null, ['class' => 'form-control', 'placeholder' => 'Mayorista', 'required']) !!}

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

