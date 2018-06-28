@extends('layouts.app')

@section('title', 'Editar Insumo ' . $insumos->nombre)

@section('content')

        <div class="col-md-12">
           
                <h3>Editar Insumos</h3>
                <hr/>
                <div class="col-sm-7 col-md-7 ">
                	<div class="panel-body">
						{!! Form::open(['route' => ['insumos.update', $insumos,'files'=>true],'method' => 'PUT', 'class' => 'form-horizontal']) !!}
							<div class="form-group">


	                		<div class="form-group">
	                			{!! Form::label('nombre', 'Nombre',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('nombre', $insumos->nombre, ['class' => 'form-control', 'placeholder' => 'jabon', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('descripcion', 'Descripcion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('descripcion',$insumos->descripcion, ['class' => 'form-control', 'placeholder' => 'insumo de...', 'required']) !!}
								</div>
							</div>

									<div class="form-group">
	                			{!! Form::label('observacion', 'Observacion',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('observacion',$insumos->observacion, ['class' => 'form-control', 'placeholder' => 'insumo de...', 'required']) !!}
								</div>
							</div>


							<div class="form-group">
	                			{!! Form::label('stock', 'Stock',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::text('stock',$insumos->stock, ['class' => 'form-control', 'placeholder' => 'cantidad...', 'required']) !!}
								</div>
							</div>

							<div class="form-group">
	                			{!! Form::label('id_tipo_insumo', 'Tipo de Insumo',['class' => 'col-md-4 control-label']) !!}
						 		<div class="col-md-6">
						 			{!! Form::select('id_tipo_insumo', $insumos->lista_tipo, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

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