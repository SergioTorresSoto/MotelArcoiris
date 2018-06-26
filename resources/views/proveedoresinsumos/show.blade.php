
@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')


<div class = "container">
    <div class="row">
        <div class="col-md-11 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Compra de Insumo</div>
                	<div class="panel-body">

	                		<div class= "row">
		                		<div class="col-sm-6">
									<div class="form-group">

									 	{!! Form::label('proveedor', 'Proveedor',['class' => 'control-label']) !!}
									 	{!! Form::text('proveedor', $insumos[0]->nombreproveedor, ['class' => 'form-control', 'readonly' => 'readonly']) !!}

									</div>
								</div>
								<div class="col-sm-4">
									<div class="form-group">

									 	{!! Form::label('tipo_comprobante', 'Tipo Comprobante',['class' => 'control-label']) !!}
									 	{!! Form::text('tipo_comprobante', $insumos[0]->tipo_comprobante, ['class' => 'form-control', 'readonly' => 'readonly']) !!}

									</div>
								</div>

							</div>
							
							<div class="row">
								<div class="panel panel-primary col-sm-12">
									<div class="panel-body">
										<div class=" ">
											<table id="detalles" class="table table-striped col-md-11">
												<thead style="background-color: #A9D0F5">
													<th>ID</th>
													<th>Insumo</th>
													<th>Marca</th>
													<th>Contenido</th>
													<th>Cantidad</th>
													<th>Precio Unidad</th>
													<th>Subtotal</th>
												</thead>
												<tfoot>
													<th>TOTAL</th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th></th>
													<th><h4 id="total">${{$insumos[0]->total}}</h4></th>
												</tfoot>
												@foreach($insumos as $type)
												<tr>
													<td>{{ $type->id }}</td>
													<td>{{ $type->nombre }}</td>
													<td>{{ $type->marca }}</td>
													<td>{{ $type->contenido }}</td>
													<td>{{ $type->cantidad }}</td>
													<td>{{ $type->precio_unitario }}</td>
													<td>{{ $type->precio_total }}</td>
												</tr>
											@endforeach
											</table>
										</div>
									</div>
								</div>
							</div>
							
						
					</div>
				</div>
			</div>
        </div>
    </div>
</div>
@endsection	
