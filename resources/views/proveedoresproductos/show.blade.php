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

									 	{!! Form::label('proveedor', 'Proveedor',['class' => 'control-label']) !!}
									 	{!! Form::text('proveedor', $proveedoresproductos[0]->nombreproveedor, ['class' => 'form-control', 'readonly' => 'readonly']) !!}

								</div>
									  </div>
								
								<div class="col-sm-2">
									<div class="form-group">

									 	{!! Form::label('tipo_comprobante', 'Tipo Comprobante',['class' => 'control-label']) !!}
									 	{!! Form::text('tipo_comprobante', $proveedoresproductos[0]->tipo_comprobante, ['class' => 'form-control', 'readonly' => 'readonly']) !!}
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
													<th><h4 id="total">${{$proveedoresproductos[0]->total}}</h4></th>
												</tfoot>
												@foreach($proveedoresproductos as $propro)
												<tr>
													<td>{{ $propro->id }}</td>
													<td>{{ $propro->nombre }}</td>
													<td>{{ $propro->marca }}</td>
													<td>{{ $propro->contenido }}</td>
													<td>{{ $propro->cantidad }}</td>
													<td>{{ $propro->precio_unitario }}</td>
													<td>{{ $propro->precio_total }}</td>
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
