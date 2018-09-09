@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')

<div class="container">
	<div class="col-md-12">
		<div class="panel panel-info">
           	<div class="panel-heading">  
                <h3>Detalle Compra</h3>
            </div>
            <div class= "panel-body">
              					<div class="col-sm-2">
									<div class="form-group">

									 	{!! Form::label('id_usuario', 'Usuario',['class' => 'control-label']) !!}
									 	{!! Form::text('id_usuario', $productosusuarios[0]->nombreusuario, ['class' => 'form-control', 'readonly' => 'readonly']) !!}

								</div>
									  </div>
								
								<div class="col-sm-2">
									<div class="form-group">

									 	{!! Form::label('tipo_comprobante', 'Tipo Comprobante',['class' => 'control-label']) !!}
									 	{!! Form::text('tipo_comprobante', $productosusuarios[0]->tipo_comprobante, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
									 </div>
								</div>
								

						
							
							<div class="row">
								<div class="panel panel-primary col-sm-12">
									<div class="panel-body">
										<div class=" ">
											<table id="detalles" class="table table-striped col-md-11">
												<thead style="background-color: #A9D0F5">
													<th>ID</th>
													<th>Producto</th>
													<th>Marca</th>
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
													<th><h4 id="total">${{$productosusuarios[0]->total}}</h4></th>
												</tfoot>
												@foreach($productosusuarios as $prous)
												<tr>
													<td>{{ $prous->id }}</td>
													<td>{{ $prous->nombre }}</td>
													<td>{{ $prous->marca_producto }}</td>
													<td>{{ $prous->cantidad }}</td>
													<td>{{ $prous->precio_unitario }}</td>
													<td>{{ $prous->precio_total }}</td>
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
