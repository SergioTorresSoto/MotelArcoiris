@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-11 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Compra de Insumo</div>
                	<div class="panel-body">


	                	{!! Form::open(['route' => 'proveedoresinsumos.store','method' => 'POST', 'class' => 'form-horizontal']) !!}
	                		<div  class="col-sm-4">
		                		<div class="form-group">
		                			{!! Form::label('Proveedor', 'Proveedor') !!}
							 		
							 		{!! Form::select('id_proveedor', $proveedores, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

								</div>
							</div>

							<div class="col-md-1">
							</div>
							<div class="col-md-4">

								<div class="form-group">

						 			{!! Form::label('Comprobante', 'Tipo Comprobante') !!}
						 		

							 		
										{!! Form::select('tipo_comprobante', array('Boleta' => 'Boleta', 'Factura' => 'Factura'), null,['class' => 'form-control', 'placeholder' => 'Seleccione una opcion...']) !!}

								</div>
							</div>
						
						
							<div class="row">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="col-sm-12">
											<div class="form-group">
					                			{!! Form::label('id_insumo', 'Insumo',['class' => 'col-md-4 control-label']) !!}
										 		<div class="col-md-6">
										 			{!! Form::select('id_insumo', $insumos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un insumo...', 'required']) !!}

												</div>
											</div>
										</div>

										<div class="col-sm-12">
											<div class="form-group">

									 			{!! Form::label('marca', 'Marca',['class' => 'col-md-4 control-label']) !!}
									 		

										 		<div class="col-md-6">
													{!! Form::text('marca', null, ['class' => 'form-control', 'placeholder' => 'Rinso']) !!}

												</div>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">

									 			{!! Form::label('cantidad', 'Cantidad',['class' => 'col-md-4 control-label']) !!}
									 		

										 		<div class="col-md-6">
													{!! Form::number('cantidad', null, ['class' => 'form-control', 'placeholder' => '20']) !!}

												</div>
											</div>
										</div>
										<div class="col-sm-12">
											<div class="form-group">

									 			{!! Form::label('precio_unitario', 'Precio',['class' => 'col-md-4 control-label']) !!}
									 		

										 		<div class="col-md-6">
													{!! Form::number('precio_unitario', null, ['class' => 'form-control', 'placeholder' => '1000']) !!}

												</div>

												 <button type="button" id="bt_add" class="btn btn-primary agregar">Agregar</button>
											</div>
										</div>

										<div class="col-sm-12 ">
											<table id="detalles" class="table table-striped">
												<thead>
													<th>Opciones</th>
													<th>Insumo</th>
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
													<th><h4 id="total">S/0.00</h4></th>
												</tfoot>
												<tbody>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>

								

								<div class="form-group" id="guardar">
		                            <div class="col-md-8 col-md-offset-4">
		                            	<input value="{{ csrf_token() }}" name="_token" type="hidden"></input>
		                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		                            </div>
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
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
	<script>
		$(document).ready(function(){
			$('.agregar').click(function(){
				agregar();
			});
			
		});

		var cont=0;
		total=0;
		subtotal=[];
		$("#guardar").hide();

		function agregar(){
			id_insumo = $("#id_insumo").val();
			insumo = $("#id_insumo option:selected").text();
			marca = $("#marca").val();
			cantidad = $("#cantidad").val();
			precio_unitario = $("#precio_unitario").val();
			if(id_insumo!="" && marca!="" && cantidad!="" && precio_unitario!=""){
				subtotal[cont] = (cantidad*precio_unitario);
				total = total+subtotal[cont];

				var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="id_insumo[]" value="'+id_insumo+'">'+insumo+'</td><td><input type="text" name="marca[]" value="'+marca+'"></td><td><input type="number" name="cantidad[]" value="'+cantidad+'"></td><td><input type="number" name="precio_unitario[]" value="'+precio_unitario+'"></td><td>'+subtotal[cont]+'</td></tr>';

				cont++;
				limpiar();
				$("#total").html("S/." + total);
				evaluar();
				$('#detalles').append(fila);
			}
			else{
				alert("Error al ingresar los datos")
			}
		}

		function limpiar(){
		  	$("#marca").val("");
		  	$("#cantidad").val("");
		  	$("#precio_unitario").val("");
		  }

	    function evaluar(){
		  	if(total>0){
		  		$("#guardar").show();
		  	}else{
		  		$("#guardar").hide();
		  	}

		  }
		function eliminar(index){
			total=total-subtotal[index];
			$("#total").html("S/," + total);
			$("#fila" + index).remove();
			evaluar();

		}
    </script>
@endsection

