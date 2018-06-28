@extends('layouts.app')

@section('title', 'Editar Tipo ' . $users_type->type)

@section('content')

        <div class="col-md-12">
                <h3>Tipo Usuario</h3>
                <hr/>
                	<div class="panel-body">
						{!! Form::open(['route' => ['userstype.update', $users_type], 'method' => 'PUT', 'class' => 'form-horizontal']) !!}
							<div class="form-group">


						 		{!! Form::label('type', 'Nombre de Tipo', ['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
									{!! Form::text('type', $users_type->type, ['class' => 'form-control', 'required']) !!}

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
@endsection	
