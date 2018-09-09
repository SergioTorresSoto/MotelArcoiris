@extends('layouts.app')

@section('content')



	
	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	 
			<div class = "container">		   
        <div class="panel panel-info">
            <div class="panel-heading"> 
                <h3> Lista Productos </h3>
					 
            </div>
            		
                	      <div class = "row">
                	      	<div class = "form-group">
                	     @foreach($productocliente as $procliente)
                	  
                	   	<div class = "col-sm-5 col-md-3">
					<div class = "thumbnail">		 			
					 
					  <img width="100px" src=" {{Storage::url($procliente->imagen) }}">
						<h4> {{$procliente->nombre}} </h4>
						<p>Descripcion: {{$procliente->descripcion}}</p>	
						<p>Precio: ${{number_format($procliente->precio)}}</p>
						 {!! Form::number('cantidad', null, ['class' => 'form-control', 'placeholder' => 'cantidad...', 'required']) !!}
						<button type="button" id="bt_add" class="btn btn-primary agregar">Agregar</button>
						
						
						</div>
							
							</div>
								


					@endforeach



							</div>
						</div>
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
		$('.desactivar').attr("disabled", true);

		function agregar(){
			id_producto = $("#id_producto").val();
			producto = $("#id_producto option:selected").text();
			marca_producto = $("#marca_producto").val();
			cantidad = $("#cantidad").val();
			precio_unitario = $("#precio_unitario").val();


			if(id_producto!="" && marca_producto!="" && cantidad!="" && precio_unitario!=""){
				subtotal[cont] = (cantidad*precio_unitario);
				total = total+subtotal[cont];

					var fila = '<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+producto+'</td><td><input type="text" class="form-control" readonly="readonly" name="marca_producto[]" value="'+marca_producto+'"></td><td><input type="text" class="form-control" readonly="readonly" name="cantidad[]" value="'+cantidad+'"></td><td><input type="text" class="form-control" name="precio_unitario[]" readonly="readonly" value="'+precio_unitario+'"></td><td>'+subtotal[cont]+'</td></tr>';

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
		  	$("#marca_producto").val("");
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
			total=total-subtotal[index];
			$("#total").html("S/," + total);
			$("#fila" + index).remove();
			evaluar();

		}
    </script>