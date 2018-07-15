
@extends('layouts.app')
@section('style')
	
    <link rel="stylesheet" href="{{asset ('datetimepicker/jquery.datetimepicker.css')}}"/ >

@endsection

@section('content')
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
	            <div class="panel-heading">
	            	<h3 style="margin-bottom: 25px; text-align: left;">Reserva Online</h3>
			                    
		        </div>
			     <div class="panel-body"> 
			     	<ul class="nav nav-pills nav-stacked col-md-2">
					  <li id="tab_x" class="active"><a href="#tab_a" data-toggle="pill">Pill A</a></li>
					  <li id="tab_y" ><a href="#tab_b" data-toggle="pill">Pill B</a></li>
					  <li><a href="#tab_c" data-toggle="pill">Pill C</a></li>
					  <li><a href="#tab_d" data-toggle="pill">Pill D</a></li>
					</ul>
					<div class="tab-content col-md-10">
					        <div class="tab-pane active" id="tab_a">

				                	<div class="col-md-5">	
					                	<p class="para">Aqui van las intrucciones para tener una reserva exitosa.</p>
											
									</div>
									
									<div class="col-md-6">
										<div class="form-group">
					                			{!! Form::label('id_tipo', 'Tipo De Habitacion',['class' => 'control-label']) !!}
										
										 			{!! Form::select('id_tipo', $tipo_habitacion, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

											</div>

											<div class="form-group">
					                			{!! Form::label('horas', 'Cantidad de Horas',['class' => 'control-label']) !!}
													<div class='input-group' id='calendar1'>
							                               {!! Form::select('horas', $horas, null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}
							                                <div class="input-group-addon">Hrs</div>
							                         </div>
										 			

											</div>
											<div class="form-group">	
						                			{!! Form::label('tiempo_inicio', 'Fecha Y Hora') !!}

						                				<div class='input-group' id='calendar1'>
							                                {!! Form::text('tiempo_inicio', null, ['class' => 'form-control', 'required']) !!}
							                                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
							                            </div>
												</div>
											 <div  style="max-width:400px"align="center">
					  						
					  						<a id="submit" class="btn btn-primary btn-lg btn-block">Consultar <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a> 
					                </div>
										
									</div>

					        </div>
					        <div class="tab-pane" id="tab_b">
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
					        <div class="tab-pane" id="tab_c">
					             <h4>Pane C</h4>
					            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
					                ac turpis egestas.</p>
					        </div>
					        <div class="tab-pane" id="tab_d">
					             <h4>Pane D</h4>
					            <p>Pellentesque habitant morbi tristique senectus et netus et malesuada fames
					                ac turpis egestas.</p>
					        </div>
					</div><!-- tab content -->
	  				
		                 	
		            </div>
			    </div>
			</div>
		</div>
	</div>

@endsection
@section('script')
	
 	<script src="{{asset ('datetimepicker/build/jquery.datetimepicker.full.min.js')}}"></script>

    <script>
	 jQuery(function(){
 			jQuery('#tiempo_inicio').datetimepicker({
 				lang:'es',
  				format:'Y-m-d H:i',
  				allowTimes:['00:00','00:15','00:30','00:35','00:45','01:00','01:15','01:30','01:45','02:00','02:15','02:30','02:45','03:00',
				  '12:00', '13:00', '15:00', 
				  '17:00', '17:05', '17:20', '19:00', '20:00'
				 ],
  				/*onShow:function( ct ){
  					this.setOptions({
  						maxDate:jQuery('#checkout').val()?jQuery('#checkout').val():false
  					})
  				},*/
 			});
 			
		});
    </script>
    <script type="text/javascript">
    	$("#submit").click(function() { 
    		 id_tipo = $("#id_tipo").val();
		     tipo = $("#id_tipo option:selected").text();
		     horas = $("#horas option:selected").text();
		     fecha = $("#tiempo_inicio").val();
		    

		     $.ajax({

	           type:'POST',

	           url:'/reservaonline/consulta',

	           data:{id_tipo:id_tipo, horas:horas, fecha:fecha},

	           success:function(data){
	            if(!data){
	              console.log(data.input);
	            }else{
	                alert(data.input[0].id);
	                $("#tab_a , #tab_x").removeClass('active');
	                $( "#tab_b , #tab_y" ).addClass('active');
	                $("#habitaciones tr").remove();  //limpia tr de tabla 
	                for (i = 0; i < data.input.length; i++){
		                var fila = '<tr class="selected" id="fila'+data.input[i].id+'"><td><img width="100px" name="imagen" src=" {{Storage::url('+data.input[i].imagen+') }}"></td><td><input type="text" class="form-control" readonly="readonly" name="descripcion" value="'+data.input[i].descripcion+'"></td><td><button type="button" class="btn btn-info" onclick="eliminar('+data.input[i].id+');"><span class="glyphicon glyphicon-check" aria-hidden="true"></span></button></td></tr>';

		                $('#habitaciones').append(fila);
		            }
	            }
	           }
	        });
		});
		

    </script>

@endsection