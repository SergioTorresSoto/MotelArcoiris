
@extends('layouts.app')
@section('style')
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset ('datetimepicker/jquery.datetimepicker.css')}}"/ >


@endsection

@section('content')
	<div class="container">
		<div class="col-md-12">
	 @if(\Session::has('message'))
           <div class="alert alert-success alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
                 {{ Session::get('message') }}  
            </div>
     @endif
			<div class="panel panel-info">
	            <div class="panel-heading">
	            	<h3 style="margin-bottom: 25px; text-align: left;">Reserva Online</h3>
			                    
		        </div>
			     <div class="panel-body"> 
			     @if(!\Session::has('message'))
			     	
			     
			     	<ul class="nav nav-pills nav-stacked col-md-2">
					  <li id="tab_x" class="active"><a href="#tab_a" data-toggle="pill">Elije Fecha</a></li>
					  <li id="tab_y" ><a href="#tab_b" data-toggle="pill">Elije Habitacion</a></li>
					  
					</ul>
					<div style="border: 1px solid #A9D0F5; border-radius: 5px;" class="tab-content col-md-10">
					        <div class="tab-pane active" style="padding: 20px;" id="tab_a">
				                	<div class="col-md-5">	
					                	<p class="para">Aqui van las intrucciones para tener una reserva exitosa.</p>
										<p class="para">Complete cada uno de los campos -> </p>	
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
					                			{!! Form::label('id_tipo', 'Tipo De Habitacion',['class' => 'control-label']) !!}
										
										 			{!! Form::select('id_tipo', $tipo_habitacion, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

											</div>
											
											<div class="form-group">
					                			{!! Form::label('horas', 'Cantidad de Horas',['class' => 'control-label']) !!}
													<div class='input-group' id='calendar1'>
							                               {!! Form::select('horas', [] , null, ['class' => 'form-control', 'required']) !!}
							                                <div class="input-group-addon">Hrs</div>
							                         </div>
										 			

											</div>

											<div class="form-group">	
						                			{!! Form::label('tiempo_inicio', 'Fecha') !!}

						                				<div class='input-group' id='calendar1'>
							                                {!! Form::date('tiempo_inicio', null, ['class' => 'form-control', 'required']) !!}
							                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							                            </div>
												</div>
											<div class="form-group">	
						                			{!! Form::label('hora_inicio', 'Hora') !!}

						                				<div class='input-group' id='calendar1'>
							                                 {!! Form::select('hora_inicio', [] , null, ['class' => 'form-control', 'required']) !!}
							                                <span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
							                            </div>
												</div>
											 <div  style="max-width:400px"align="center">
					  						<div class="form-group">
					  							<a id="submit" class="btn btn-primary btn-lg btn-block">Consultar <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a> 
					  						</div>
					                </div>
										
									</div>

					        </div>
					        <div  style="padding: 20px;" class="tab-pane" id="tab_b">
					            <div class="col-md-3">	
					                	<p class="para">Aqui van las intrucciones para tener una reserva exitosa .</p>
										<p class="para">Seleccione la habitacion de su preferencia .</p>
								</div>
								
									<div class="col-md-9">
										<table id="habitaciones" class="table table-striped">
											<thead>
											
											<tbody>	

											</tbody>
										</table>
										
								</div>
					        </div>
					        
					</div><!-- tab content -->
				@else
					<div align="center">
						<div class="col-xs-12 .col-sm-5 col-lg-5 col-md-5">
							<a href="{{ action('ReservaOnlineController@downloadPDF', Session::get('reserva')->id) }}" download class="btn btn-success"><span class="glyphicon glyphicon-cloud-download"></span> DOWNLOAD PDF</a>
						</div>
						<div class="col-xs-12 .col-sm-1 col-lg-1 col-md-1">
							<span class="badge">O</span>
						</div>
					
						<div class="col-xs-12 .col-sm-3 col-lg-3 col-md-3">
						   <div class="input-group">
						    	<input id="correo" type="email" class="form-control" placeholder="ejemplo@email.com">
						     	 <span class="input-group-btn">
						        <button type="button" value="{{ Session::get('reserva')->id }}" class="btn btn-success" id="enviar" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Enviando"><span class="glyphicon glyphicon-envelope "></span></button>
						      </span>
						   </div><!-- /input-group -->
						</div><!-- /.col-lg-6 -->
					</div>
					

	  			@endif	
		                 	
		    </div>
	

			<!-- Modal -->
		<div class="modal fade bs-example-modal-sm" id="myModal" role="dialog">
			<div class="modal-dialog">

				<div class="panel panel-info">
                    <div class="panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h4 class="panel-title" id="contactLabel"><span class="glyphicon glyphicon-info-sign"></span> Detalle</h4>
                    </div>
                    {!! Form::open(['route' => ['payment'],'method' => 'GET', 'class' => 'form-horizontal']) !!}
	                    <div class="modal-body" style="padding: 5px;">
	                         
	                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
	                                    {!! Form::label('fechaHora', 'Fecha Entrada', ['class' => 'control-label']) !!}
										{!! Form::text('fechaHora', null, ['class' => 'form-control', 'required']) !!}
	                                </div>
	                                <div class="col-lg-6 col-md-6 col-sm-6" style="padding-bottom: 10px;">
	                                    {!! Form::label('fechaSalida', 'Fecha Salida', ['class' => 'control-label']) !!}
										{!! Form::text('fechaSalida', null, ['class' => 'form-control', 'required']) !!}
	                                </div>
	                          
	                           
	                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
	                                    {!! Form::label('habitacion', 'Habitacion N°', ['class' => 'control-label']) !!}
										{!! Form::text('habitacion', null, ['class' => 'form-control', 'required']) !!}
	                                </div>
	                          
	                          
	                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
	                                    {!! Form::label('fecha', 'Servicio', ['class' => 'control-label']) !!}
											<div class='input-group'>
							                    {!! Form::text('fecha', null, ['class' => 'form-control', 'required']) !!}
							                        <div class="input-group-addon">Hrs</div>
							                </div>
	                                </div>
	                     
	                      
	                                <div class="col-lg-12 col-md-12 col-sm-12" style="padding-bottom: 10px;">
	                                    {!! Form::label('tarifa', 'Valor', ['class' => 'control-label']) !!}
											 <div class='input-group'>
											 	<div class="input-group-addon">$</div>
							                       {!! Form::text('tarifa', null, ['class' => 'form-control', 'required']) !!}
							                           
							                     </div>
	                                </div>
	                        
	                      
	                                <div class="col-lg-12 col-md-12 col-sm-12">   
	                                    {!! Form::label('comentario', 'Comentario', ['class' => 'control-label']) !!}
										{!! Form::textarea('comentario', null, ['class' => 'form-control', 'row'=>1]) !!}
	                                </div>
	                      
	                    </div>  
	                    <div class="panel-footer" style="margin-bottom:-14px;">
	                        	{!! Form::submit('Pagar', ['class' => 'btn btn-success']) !!}
	                                <!--<span class="glyphicon glyphicon-ok"></span>-->
	                                <!--<span class="glyphicon glyphicon-remove"></span>-->
	                            <button style="float: right;" type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
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
	
 	<script src="{{ asset ('datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>
 	<style type="text/css">
 		#comentario{
 			resize:vertical;
 		}
 	</style>
 	<script type="text/javascript">

 		$(document).ready(function(){

			var today = new Date();
			var dd = today.getDate()+1;
			var mm = today.getMonth()+1; //January is 0!
			var yyyy = today.getFullYear();
			 if(dd<10){
			        dd='0'+dd
			    } 
			    if(mm<10){
			        mm='0'+mm
			    } 

			today = yyyy+'-'+mm+'-'+dd;
			document.getElementById("tiempo_inicio").setAttribute("min", today);


		});

 		$(document).on('change','#id_tipo',function(){
 			id_tipo = $("#id_tipo").val();
 			$("#horas option").remove();
 			$("#hora_inicio option").remove();
 		//	alert(id_tipo);

 			$.ajax({

	           type:'POST',

	           url:'/reservaonline/consulta/horas',

	           data:{id_tipo:id_tipo},

	           success:function(data){
	           		  
		          	  $.each(data, function(index, object) {
					      $("#horas").append('<option value="' + object.id + '">'+object.horas+'</option>');				
					}); 	           	
	           }
	        });
               
          });

 		$(document).on('change','#tiempo_inicio',function(){
 		
 			if($("#horas option:selected").text()!=""){
	 			fecha = $("#tiempo_inicio").val();
	 			horas = $("#horas option:selected").text();
	 			$("#hora_inicio option").remove();
	 		

	 			var url = "/reservaonline/disponibles/"+fecha+"/"+horas+"";

				$.get(url,function(resul){
				
				
						var datos= jQuery.parseJSON(resul);
						if(datos !=""){
							for (var i = 0; i < datos.length; i++) {
								
								$("#hora_inicio").append('<option >'+datos[i]+'</option>');	
							}
						}else{
							$.alert('Dia sin disponibilidad', {
                    	 
			                    	type: 'warning', 
			                    	position:  ['top-right', [60, 12]],
							});
							$("#tiempo_inicio").val("");

						}
					
					
		        });
		    }else{
		    	$.alert('Primero selecione un tipo de habitacion', {
                    	 
                    	type: 'warning', 
                    	position:  ['top-right', [60, 12]],
				});
				$("#tiempo_inicio").val("");
		    }
	               
        });

	
    </script>
    <script type="text/javascript">
    	id_tipo ="";
    	tipo="";
    	horas="";
    	fecha="";
    	precio="";
    	fin="";
    	formato="";

    	
    	$('#tab_y').not('.active').addClass('disabled');
    	$('#tab_y').not('.active').find('a').removeAttr("data-toggle");

    	$("#submit").click(function() { 
    		 id_tipo = $("#id_tipo").val();
		     tipo = $("#id_tipo option:selected").text();
		     horas = $("#horas option:selected").text();
		     fecha = $("#tiempo_inicio").val()+" "+$("#hora_inicio option:selected").text()+":00";
		     
		     menor = new Date(fecha).setDate(new Date(fecha).getDate());
		     console.log("sadas",menor);
		     mayor= new Date().setDate(new Date().getDate() + 1);
		     if (id_tipo!="") {
			  if(fecha!="" && menor >= mayor){
			     $.ajax({
		           type:'POST',

		           url:'/reservaonline/consulta',

		           data:{id_tipo:id_tipo, horas:horas, fecha:fecha},

		           success:function(data){
		            if(!data || data.input.length==0){
		              $.alert('No hay habitaciones disponibles', {
                    	
                    	type: 'warning', 
                    	position:  ['top-right', [60, 12]],
					  });

		            }else{
		                
		                precio = data.tarifa[0].precio;
		                fin=data.fin;
		                $("#tab_a , #tab_x").removeClass('active');
		                $( "#tab_b , #tab_y" ).addClass('active');
		                $("#habitaciones tr").remove();  //limpia tr de tabla 
		                for (i = 0; i < data.input.length; i++){
			                var fila = '<tr class="selected" id="fila'+data.input[i].id+'"><td><img width="100px" name="imagen" src=" {{Storage::url('+data.input[i].imagen+') }}"></td><td><input type="text" class="form-control" readonly="readonly" name="descripcion" value="'+data.input[i].descripcion+'"></td><td><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal" onclick="detalle('+data.input[i].numero_habitacion+');"><span class="glyphicon glyphicon-check" aria-hidden="true"></span></button></td></tr>';

			                $('#habitaciones').append(fila);
			            }
		            }
		           }
		        });
			  }else{			
			  	$.alert('Fecha invalida', {
                    	 
                    	type: 'warning', 
                    	position:  ['top-right', [60, 12]],
					});
			  }
			 }else{
			 	$.alert('Seleccione un tipo de habitacion', {
                    	
                    	type: 'warning', 
                    	position:  ['top-right', [60, 12]],
					});
			 }
		});
		function detalle(index){
		/*	document.getElementById('tarifa').innerHTML = precio;
			document.getElementById('habitacion').innerHTML = index;
			document.getElementById('fechaHora').innerHTML = fecha;
			document.getElementById('fecha').innerHTML = horas;
			*/

			$("#habitacion").val(index);
			$("#fechaHora").val(fecha);
			$("#fecha").val(horas);
			$("#tarifa").val(precio);
			format1=fin['date'].split(".")[0];
			format2 =format1.split(":");	
        	$("#fechaSalida").val(format2[0]+':'+format2[1]);

        	$("#habitacion , #fechaHora, #fecha, #tarifa, #fechaSalida").attr("readonly","readonly");
		}
		

    </script>
    <script type="text/javascript">
    	$("#enviar").click(function() { 

    		var $this = $(this);
			  $this.button('loading');
			
			  
			  

    		correo = $("#correo").val();
    		id= $("#enviar").val();
  
    		$.ajax({

	           type:'POST',

	           url:'/reservaonline/consulta/enviar',

	           data:{correo:correo,id:id},

	           success:function(data){
	           		$this.button('reset');
	            	$.alert('Correo enviado', {
                    	
                    	type: 'success', 
                    	position:  ['top-right', [60, 12]],
					});
	           },
	           error: function(XMLHttpRequest, textStatus, errorThrown) { 
	           		$this.button('reset');
                    $.alert('Vuelva a intentarlo !', {
                    	
                    	type: 'warning', 
                    	position:  ['top-right', [60, 12]],
					});
                } 

	        });

    	});


    </script>

@endsection