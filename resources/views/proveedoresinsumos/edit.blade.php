@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')
<div class="container">
	  @if(Session::has('message'))
           <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
                 {{ Session::get('message') }}  
            </div>
  @endif
        <div class="col-md-12">   
        	<div class="panel panel-info">
            <div class="panel-heading"> 
                <h3>Modificar Compra de Insumo</h3>
            </div>
                	<div class="panel-body">

	                	{!! Form::open(['route' => ['proveedoresinsumos.update', $detalleCompra],'method' => 'PUT', 'class' => 'form']) !!}
	                		<div class= "row">
		                		<div  class="col-sm-7">
			                		<div class="form-group">
			                			{!! Form::label('Proveedor', 'Proveedor') !!}
								 		
								 		{!! Form::select('id_proveedor', $proveedores, $insumosComprados[0]->id_proveedor, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

									</div>
								</div>

							
								<div class="col-md-5">
									<div class="form-group">
							 			{!! Form::label('Comprobante', 'Tipo Comprobante') !!}
							 			
							 			{!! Form::select('tipo_comprobante', array('Boleta' => 'Boleta', 'Factura' => 'Factura'), $detalleCompra->tipo_comprobante,['class' => 'form-control', 'placeholder' => 'Seleccione una opcion...']) !!}

									</div>
								</div>
							</div>
							
							
								<div class="panel panel-primary col-sm-12">
									<div class="panel-body">
										<div class="col-sm-2">
											<div class="form-group">
					                			{!! Form::label('id_insumo', 'Insumo',['class' => 'control-label']) !!}
										 		
										 		{!! Form::select('id_insumo', $insumos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un insumo...']) !!}

											</div>
										</div>

										<div class="col-sm-2">
											<div class="form-group">

									 			{!! Form::label('marca', 'Marca',['class' => 'control-label']) !!}
									 			{!! Form::text('marca', null, ['class' => 'form-control', 'placeholder' => 'Rinso']) !!}

											</div>
										</div>
							
										<div class="col-sm-2">
											<div class="form-group">

									 			{!! Form::label('cantidad', 'Cantidad (U)',['class' => 'control-label']) !!}
									 			{!! Form::number('cantidad', null, ['class' => 'form-control', 'placeholder' => '20']) !!}

											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">

									 			{!! Form::label('precio_unitario', 'Precio Unidad',['class' => 'control-label']) !!}
									 			{!! Form::number('precio_unitario', null, ['class' => 'form-control', 'placeholder' => '1000']) !!}
											</div>
										</div>
										<div class="col-sm-2">
											<div class="form-group">	
												{!! Form::label('Opcion', '',['class' => 'control-label']) !!}
												<button type="button" id="bt_add" class="btn btn-primary agregar">Agregar</button>
											</div>
										</div>

										<div class=" ">
											<table id="detalles" class="table table-striped col-md-11">
												<thead style="background-color: #A9D0F5">
													<th>Opciones</th>
													<th>Insumo</th>
													<th>Marca</th>
										
													<th>Cantidad (Unidad)</th>
													<th>Precio Unidad</th>
													<th>Subtotal</th>
												</thead>
												<tfoot>
													<th>TOTAL</th>
													<th></th>
													<th></th>
													<th></th>
												
													<th></th>
													<th><input type="hidden" id="nuevoTotal" name="total" value="{{ $detalleCompra->total}}"><h4 id="total">{{ $detalleCompra->total }}</h4></th>
												</tfoot>
												<tbody>
													@foreach($insumosComprados as $key => $ins)
														<tr class="selected" id= "fila{{$key}}">
			<td>
				<button type="button" class="btn btn-warning" onclick="eliminar({{$key}});"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
		 		<button type="button" class="btn btn-info editar" onclick="editar(fila{{$key}});"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
		 	</td>
			<td><input type="hidden" name="id_insumo[]" value="{{$ins->id}}">{{$ins->nombre}}</td>
			
			<td><input type="text" class="form-control" readonly="readonly" name="marca[]" value="{{$ins->marca}}"></td>
	
			<td><input type="text" class="form-control" readonly="readonly" name="cantidad[]" value="{{$ins->cantidad}}"></td>
			<td><input type="text" class="form-control" name="precio_unitario[]" readonly="readonly" value="{{$ins->precio_unitario}}"></td>
		
			<td id="total{{$key}}">{{ $ins->precio_total }}</td>
				
															
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							
							
							<div class="form-group" id="guardar">
		                            <div class="col-md-8 col-md-offset-10">
		                            	<input value="{{ csrf_token() }}" name="_token" type="hidden"></input>
		                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary desactivar']) !!}
		                            </div>
		                        </div>
		                    </div>
						{!! Form::close() !!}
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

		  $( function() {
		    
		    $( "#getvalue" ).on( "click", function() {
		      console.log("hola");
		    });
		   

		 
		    
		  } );


		var cont=0;
		cont = $("#detalles tr").length - 2;
		total=0;
		total= parseInt($("#total").text());

		subtotal=[];
		$('.desactivar').attr("disabled", true);

		function agregar(){
			id_insumo = $("#id_insumo").val();
			insumo = $("#id_insumo option:selected").text();
			marca = $("#marca").val();

			cantidad = $("#cantidad").val();
			precio_unitario = $("#precio_unitario").val();

			if(id_insumo!="" && marca!="" && cantidad!="" && precio_unitario!=""){
				subtotal[cont] = (cantidad*precio_unitario);
				total = total+subtotal[cont];

				var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button><button type="button" class="btn btn-info editar" onclick="editar(fila'+cont+');"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></td><td><input type="hidden" name="id_insumo[]" value="'+id_insumo+'">'+insumo+'</td><td><input type="text" class="form-control" readonly="readonly" name="marca[]" value="'+marca+'"></td><td><input type="text" class="form-control" readonly="readonly" name="cantidad[]" value="'+cantidad+'"></td><td><input type="text" class="form-control" name="precio_unitario[]" readonly="readonly" value="'+precio_unitario+'"></td><td>'+subtotal[cont]+'</td></tr>';

				cont++;
				limpiar();
				$("#total").html(total);
				$("#nuevoTotal").val(total);
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
		  		$('.desactivar').attr("disabled", false);
		  	}else{
		  		$('.desactivar').attr("disabled", true);
		  	}

		}
		function eliminar(index){
			total=total-parseInt($("#total"+index).text());
			$("#total").html(total);
			$("#nuevoTotal").val(total);
			$("#fila" + index).remove();
			evaluar();

		}
		function editar(key){            
            		var id_insumo = $("#"+key.id).find("td:eq(1) input[type='hidden']").val();
                    var producto = $("#"+key.id).find("td").eq(1).text();
                    var marca = $("#"+key.id).find("td:eq(2) input[type='text']").val();
      			
                    var cantidad = $("#"+key.id).find("td:eq(3) input[type='text']").val();
                    var precio_unitario = $("#"+key.id).find("td:eq(4) input[type='text']").val();
                    $("#id_insumo").val(id_insumo);
                    $("#marca").val(marca);
             
                    $("#cantidad").val(cantidad);
                    $("#precio_unitario").val(precio_unitario);
               //     alert(cantidad + precio_unitario);
                    total=total-(cantidad*precio_unitario);
                    if(total <0){
                    	total= total*-1;
                    }
					$("#total").html(total);
					$("#nuevoTotal").val(total);

					$("#"+key.id).closest('tr').remove();
					
					evaluar();
               
         };
    </script>
@endsection

