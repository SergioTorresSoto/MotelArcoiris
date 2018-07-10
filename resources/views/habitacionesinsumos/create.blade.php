@extends('layouts.app')

@section('title', 'Crear tipo')

@section('content')

        <div class="col-md-12">   
                <h3>Insumos Necesarios</h3>
                <hr/>
                	<div class="panel-body">

	                	{!! Form::open(['route' => 'habitacionesinsumos.store','method' => 'POST', 'class' => 'form']) !!}
	                		<div class= "row">
		                		<div  class="col-sm-7">
			                		<div class="form-group">
			                			{!! Form::label('id_habitacion', 'Habitacion') !!}
								 	
								 		{!! Form::select('id_habitacion', $habitaciones, $key, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

									</div>
								</div>

							
								
							</div>
							
							
								<div class="panel panel-primary col-sm-12">
									<div class="panel-body">
										<div class="col-sm-3">
											<div class="form-group">
					                			{!! Form::label('id_insumo', 'Insumo',['class' => 'control-label']) !!}
										 		
										 		{!! Form::select('id_insumo', $insumos, null, ['class' => 'form-control', 'placeholder' => 'Seleccione un insumo...', 'required']) !!}

											</div>
										</div>

										
										
										<div class="col-sm-3">
											<div class="form-group">

									 			{!! Form::label('cantidad', 'Cantidad',['class' => 'control-label']) !!}
									 			{!! Form::number('cantidad', null, ['class' => 'form-control', 'placeholder' => '20']) !!}

											</div>
										</div>
										<div class="col-sm-4">
											<div class="form-group">

									 			{!! Form::label('observacion', 'Observacion',['class' => 'control-label']) !!}
									 			{!! Form::text('observacion', null, ['class' => 'form-control', 'placeholder' => '1000']) !!}
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
													<th>Eliminar</th>
													<th>Insumo</th>
													<th>Cantidad</th>
													<th>Observacion</th>
													
												</thead>
												
												<tbody>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							
							
							<div class="form-group" id="guardar">
		                            <div class="col-md-8 col-md-offset-10">
		                            	<input value="{{ csrf_token() }}" name="_token" type="hidden"></input>
		                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
		                            </div>
		                        </div>
		                    </div>
						{!! Form::close() !!}
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
		total=0;
		subtotal=[];
		$('.desactivar').attr("disabled", true);

		function agregar(){
			id_insumo = $("#id_insumo").val();
			insumo = $("#id_insumo option:selected").text();
			marca = $("#marca").val();
			contenido = $("#contenido").val();
			cantidad = $("#cantidad").val();
			observacion = $("#observacion").val();

			if(id_insumo!="" && marca!="" && cantidad!="" && observacion!=""){
				

				var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="id_insumo[]" value="'+id_insumo+'">'+insumo+'</td><td><input type="text" class="form-control" readonly="readonly" name="cantidad[]" value="'+cantidad+'"></td><td><input type="text" class="form-control" name="observacion[]" readonly="readonly" value="'+observacion+'"></td></tr>';

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
		  	$("#insumo").val("");
		  	$("#cantidad").val("");
		  	$("#contenido").val("");
		  	$("#observacion").val("");
		}

	    function evaluar(){
		  	if(total>0){
		  		$('.desactivar').attr("disabled", false);
		  	}else{
		  		$('.desactivar').attr("disabled", true);
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