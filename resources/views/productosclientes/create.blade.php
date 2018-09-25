@extends('layouts.app')

@section('content')

	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	 
<div class = "container-fluid">		   
    <div class="panel panel-info">
        <div class="panel-heading"> 
            <h3> 
            <div class="row">
            	<div class = "col-xs-2 col-sm-2 col-md-2">
            		Lista Productos
            	</div>
                <div class="btn-group pull-right">
                	<div class = "col-xs-8 col-sm-8 col-md-8">
                		 {!! Form::label('nombreProducto', 'Proveedor' ,['class' => 'hidden']) !!}
           				 {!! Form::text('nombreProducto', null ,['class' => 'form-control','placeholder'=>'Nombre Producto']) !!} 
        			</div>	
        			<div class = "col-xs-2 col-sm-2 col-md-2">	
				    	<button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary"><span id="notificacion" class="badge"></span><span class="glyphicon glyphicon-shopping-cart"></span></button>
				    </div>	
				 </div>
				</div>
            </h3>
			 
        </div>
            		
        <div class = "row">
            <div id="listaProductos" class = "form-group">
            	<hr>
                @foreach($productocliente as $procliente)               	  
	                <div class = "eliminarProducto col-sm-5 col-md-2">
						<div class = "thumbnail">		 			
							<img id="imagen{{$procliente->id}}" width="100px" src=" {{Storage::url($procliente->imagen) }}">
							<h4 id="nombre{{$procliente->id}}"> {{$procliente->nombre}} </h4>
							<p id="descripcion{{$procliente->id}}">Descripcion: {{$procliente->descripcion}}</p>	
							<p id="precio{{$procliente->id}}">Precio: ${{$procliente->precio}}</p>
							 
							<div class="input-group">						
						    	<span class="input-group-btn">
						        <button type="button" id="{{ $procliente->id}}" onclick="agregar({{ $procliente->id}})"data-toggle="modal" data-target="#myModal" class="btn btn-success agregarCarro">Agregar</button>
						      </span>
						    </div><!-- /input-group -->
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>						
</div>
					
							
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="container">
		<div  class="row">
			<div class="col-xs-12 col-md-8">
				{!! Form::open(['route' => 'productosclientes.store','method' => 'POST', 'class' => 'form']) !!}
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="panel-title">
							<div class="row">
								<div class="col-xs-6">
									<h5><span class="glyphicon glyphicon-shopping-cart"></span> Shopping Cart</h5>
								</div>
								<div class="col-xs-6 col-xs-6">
									<button type="button" class="btn btn-primary btn-sm btn-block" data-dismiss="modal">
									<span class="glyphicon glyphicon-share-alt"></span> Continue shopping
									</button>
								</div>
							</div>
						</div>
					</div>
					<div id="carrito" class="panel-body">

						<!-- lista carrito -->
					
					</div>
					<div class="panel-footer">

						<div class="row text-center">
						
							<div class="col-xs-3">
								{!! Form::select('tipo_pago', array('Efectivo' => 'Efectivo', 'Tarjeta' => 'Tarjeta'), null,['class' => 'form-control', 'placeholder' => 'Medio de Pago','required']) !!}
							</div>
							<div class="col-xs-3">
								<h4 class="text-right">Total <strong id="total">$0</strong></h4>
							</div>
							<div class="col-xs-3">

								<input value="{{ csrf_token() }}" name="_token" type="hidden"></input>
								{!! Form::submit('Solicitar', ['class' => 'btn btn-success btn-block']) !!}
								
								</button>
							</div>
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
		var total = 0;
		var cont=0;
		var temTotal = [];
		var temPrecio = [];


		$(document).ready(function(){


			$(document).on("keyup",".cantidadVariable",function(){
				cantidad = $(this).val();
	
				if($.isNumeric(cantidad)){
				  
				  total = total-temTotal[this.id];
				  precioInt= temPrecio[this.id].split("$");
				  temTotal[this.id] = parseInt(cantidad)*parseInt(precioInt[1]);
				  total = temTotal[this.id]+total;
				  document.getElementById("total").innerHTML =total;
				 }
			});
			
		});

		function agregar(id){
			cantidad = 1;
				if(cantidad != "" && cantidad > 0){
					
					imagen = document.getElementById("imagen"+id).src;
					nombre = document.getElementById("nombre"+id).innerHTML;
					descripcion = document.getElementById("descripcion"+id).innerHTML;
					precio = document.getElementById("precio"+id).innerHTML;
					temPrecio[id] = precio;
					precioInt= precio.split("$");
			
					temTotal[id] = (parseInt(cantidad)*parseInt(precioInt[1]));
					total = (parseInt(cantidad)*parseInt(precioInt[1]))+parseInt(total);

					var producto ='<div id="producto'+id+'" class="row"><div class="col-xs-2"><img class="img-responsive" src="'+imagen+'"></div><div class="col-xs-4"><h4 class="product-name"><strong>'+nombre+'</strong></h4><h4><small>'+descripcion+'</small></h4></div><div class="col-xs-6"><div class="col-xs-6 text-right"><h6><strong>'+precio+'<span class="text-muted">x</span></strong></h6></div><div class="col-xs-4"><input id="'+id+'" name="cantidad[]" type="number" class="form-control input-sm cantidadVariable" value="'+cantidad+'"><input name="productoId[]" type="text" class="hidden" value="'+id+'"><input name="total" type="text" class="hidden" value="'+total+'"></div><div class="col-xs-2"><button onclick="eliminar('+id+');" type="button" class="btn btn-link btn-xs"><span class="glyphicon glyphicon-trash"> </span></button></div></div></div><hr id="hr'+id+'">' ;

					$('#carrito').append(producto);
					
		
					document.getElementById("total").innerHTML = total;
					
				}
		}
		function eliminar(productoId){
			$("#producto"+productoId).remove();
			$("#hr"+productoId).remove();

			total = total-temTotal[productoId];
			document.getElementById("total").innerHTML = total;
		}
		$('#nombreProducto').on('keyup',function(){
		
 			var value=$(this).val();
			if(value != ""){
				var url = "filtroproductos/"+value+"";
			}else{
				var url = "filtroproductos/1";
			}

				$.get(url,function(resul){

					var datos= jQuery.parseJSON(resul);

					$(".eliminarProducto").remove();
			
					for (var i = 0; i<datos.productos.length; i++) {

						var producto ='<div class="eliminarProducto col-sm-5 col-md-2"><div class = "thumbnail"><img id="imagen'+datos.productos[i].id+'" width="100px" src="http://localhost:8000/storage/'+datos.productos[i].imagen+'"><h4 id="nombre'+datos.productos[i].id+'"> '+datos.productos[i].nombre+' </h4><p id="descripcion'+datos.productos[i].id+'">Descripcion: '+datos.productos[i].descripcion+'</p><p id="precio'+datos.productos[i].id+'">Precio: $'+datos.productos[i].precio+'</p><div class="input-group"><span class="input-group-btn"><button type="button" id="'+datos.productos[i].id+'" data-toggle="modal" data-target="#myModal" onclick="agregar('+datos.productos[i].id+');" class="btn btn-success agregarCarro">Agregar</button></span></div></div></div>';
						
						$('#listaProductos').append(producto);
					}
					 
				})
			
		})
	
    </script>

@endsection