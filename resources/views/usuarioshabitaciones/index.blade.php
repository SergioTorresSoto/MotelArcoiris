@extends('layouts.app')

@section('content')


    	 <div class="col-md-12">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif


			
			
			<h3> Reservas 
                	<div class="btn-group pull-right">
				        <a href="{{ route('usuarioshabitaciones.create') }}" class="btn btn-primary" align="right">Registrar Reserva</a>
				     </div>  
            </h3>
            <hr/>
            <div class="row">
             {!! Form::open(['route' => 'usuarioshabitaciones.index', 'method' => 'GET', 'class' => 'navbar-form navbar-right']) !!}
							<div class = "form-group">
								{!! Form::select('ordenar', array('tiempo_inicio,asc' => 'Ingreso ASC','tiempo_inicio,desc' => 'Ingreso DESC','tiempo_fin,asc' => 'Salida ASC','tiempo_fin,desc' => 'Salida DESC') ,null, ['class' => 'form-control', 'placeholder' => 'Ordenar Por:']) !!}
								<div class="input-group">
									<div class="input-group-addon"><span class="glyphicon glyphicon-menu-left"></span></div>
									{!! Form::date('fecha_inicio',null, ['class' => 'form-control']) !!}
								</div>
								<div class="input-group">
									
									{!! Form::date('fecha_fin',null, ['class' => 'form-control']) !!}
									<div class="input-group-addon"><span class="glyphicon glyphicon-menu-right"></span></div>
								</div>
								{!! Form::select('estado', $estados ,null, ['class' => 'form-control', 'placeholder' => 'Estado']) !!}
								{!! Form::select('activa', array('1' => 'Activa', '0' => 'Inactiva') ,null, ['class' => 'form-control', 'placeholder' => 'Todas']) !!}

							</div>
							<div class="form-group">
			                     
								{!! Form::submit('Buscar', ['class' => 'btn btn-primary']) !!}
										
							</div>
					{!! Form::close() !!}
				</div>
		   
				<div class="row">
					<div id="exTab2" >	
					<ul class="nav nav-tabs">
						<li class="active">
					        <a  href="#1" data-toggle="tab">Activas</a>
						</li>
						<li><a href="#2" data-toggle="tab">Reservas</a>
						</li>
					</ul>

					<div class="tab-content ">
					    <div class="tab-pane active" id="1">
					         <div class=" table-responsive panel-body" >	
						
								<table class="table" id="tbl">
									<thead style="background-color: #A9D0F5">
									<tr>
										
										<th>Hab</th>
										<th>Tipo</th>
										<th>Estado</th>
										<th>Servicio</th>
										<th>Ingreso</th>	
										<th>Retirada</th>
										<th>MedioPago</th>
										<th>Tarifa</th>
										<th>Patente</th>
										<th>Observacion</th>
										<th>Print</th>
										<th>RetiradaReal</th>
										<th>HorasExtras</th>
										<th>Finalizar</th>
										<th>Editar</th>
										<th>Eliminar</th>
										
									</tr>
									</thead>
									<tbody>
										@foreach($habitacion as $hab)
										@if($hab->activa==true)
											<tr>
												<td class="id_habitacion hidden">{{ $hab->id }}</td>
												<td>#{{ $hab->numero_habitacion }}</td>
												<td>{{ $hab->tipo }}</td>												
												<td><button type="button" style="{{$hab->estilo}}" >{{ $hab->estado}}</button></td>
												<td>{{ $hab->tiempo_reserva}} Hrs</td>
												<td>{{ $hab->tiempo_inicio }}</td>
												<td class="numero">{{ $hab->tiempo_fin}}</td>
												<td>{{ $hab->tipo_pago}}</td>
												<td>{{ $hab->tarifa}}</td>
												<td>{{ $hab->patente}}</td>
												<td>{{ $hab->observacion }}</td>
												<td>
													<a href="{{ route('usuarioshabitaciones.ticket', $hab->id) }}" onclick="return confirm('¿Está seguro de eliminar la habitacion seleccionada?')" class="btn btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
													
												</td>
												<td>{{ $hab->tiempo_fin_real }}</td>
												<td>{{ $hab->tarifa_horas_extras}}</td>
				
													@if($hab->estado == "Limpieza")
														
														<td align="center" ><a href="{{ route('habitacionesinsumos.create',$hab->id_habitacion) }}" class="btn btn-info"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></a> 

														</td>
													@else
														
														<td align="center" class="botton"><a data-toggle="modal" data-target="#myModal" data-toggle="tooltip" title="Finalizar" class="btn btn-success"><span class="glyphicon glyphicon-bell" aria-hidden="true"></span></a> 
														</td>
													
													@endif

												<td>
													
													<a href="{{ route('usuarioshabitaciones.edit', $hab->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
												</td>
												<td>
													<a href="{{ route('usuarioshabitaciones.destroy', $hab->id) }}" onclick="return confirm('¿Está seguro de eliminar la habitacion seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
													
												</td>
											</tr>
										@endif
										@endforeach
									</tbody>
								</table>
								@if(isset($hab))
														<!-- Modal -->
								  <div class="modal fade" id="myModal" role="dialog">
								    <div class="modal-dialog">
								    
								      <!-- Modal content-->
								      <div class="modal-content">
								      	{!! Form::open(['route' => ['usuarioshabitaciones.update', 0],'method' => 'PUT', 'class' => 'form-horizontal']) !!}

								        <div class="modal-header">
								          <button type="button" class="close" data-dismiss="modal">×</button>
								          <h4 class="modal-title">Finalizar</h4>
								        </div>
								        <div class="modal-body">

								        	
								        	
								        
										 		{!! Form::label('tiempo_fin_real', 'Hora Salida Real', ['class' => 'control-label']) !!}
										 		
													{!! Form::text('tiempo_fin_real', null, ['class' => 'form-control', 'required']) !!}

												{!! Form::label('horas_extras', 'Horas Extras', ['class' => 'control-label']) !!}
											 		
														{!! Form::time('horas_extras', null, ['class' => 'form-control', 'required']) !!}


												{!! Form::label('tarifa_horas_extras', 'Tarifa Horas Extras', ['class' => 'control-label']) !!}
											 		
														{!! Form::number('tarifa_horas_extras', null, ['class' => 'form-control', 'required']) !!}


												{!! Form::label('id', 'Hora Entrada', ['class' => 'control-label hidden']) !!}
										 		
													{!! Form::text('id', $hab->id, ['class' => 'form-control hidden', 'required']) !!}

								        	
													
										 </div>
								        <div class="modal-footer">
							  				 {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
					                        
								        </div>
								       
								      </div>
								      {!! Form::close() !!}
								    </div>
								  </div>
								@endif
			                </div>
						</div>
						<div class="tab-pane" id="2">
					        <div class=" table-responsive panel-body" >	
						
								<table class="table" id="tbl">
									<thead style="background-color: #A9D0F5">
									<tr>
										
										<th>Hab</th>
										<th>Tipo</th>
										
										<th>Servicio</th>
										<th>Ingreso</th>	
										<th>Retirada</th>
										<th>MedioPago</th>
										<th>Tarifa</th>
										<th>Patente</th>
										<th>Observacion</th>
										<th>Print</th>
										<th>RetiradaReal</th>
										<th>HorasExtras</th>
										
										<th>Editar</th>
										<th>Eliminar</th>
										
									</tr>
									</thead>
									<tbody>
										@foreach($habitacion as $hab)
										@if($hab->reserva==true && $hab->activa==false)
											<tr>
												<td class="hidden">{{ $hab->id }}</td>
												<td>#{{ $hab->numero_habitacion }}</td>
												<td>{{ $hab->tipo }}</td>
													
												<td>{{ $hab->tiempo_reserva}} Hrs</td>
												<td>{{ $hab->tiempo_inicio }}</td>
												<td>{{ $hab->tiempo_fin}}</td>
												<td>{{ $hab->tipo_pago}}</td>
												<td>{{ $hab->tarifa}}</td>
												<td>{{ $hab->patente}}</td>
												<td>{{ $hab->observacion }}</td>
												<td>
													<a href="{{ route('usuarioshabitaciones.ticket', $hab->id) }}" onclick="return confirm('¿Está seguro de eliminar la habitacion seleccionada?')" class="btn btn-info"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>
													
												</td>
												<td>{{ $hab->tiempo_fin_real }}</td>
												<td>{{ $hab->tarifa_horas_extras}}</td>
												
												
												<td>
													
													<a href="{{ route('usuarioshabitaciones.edit', $hab->id) }}" class="btn btn-warning"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></a> 
												</td>
												<td>
													<a href="{{ route('usuarioshabitaciones.destroy', $hab->id) }}" onclick="return confirm('¿Está seguro de eliminar la habitacion seleccionada?')" class="btn btn-danger"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
													
												</td>
											</tr>
										@endif
										@endforeach
									</tbody>
								</table>
								
			                </div>
						</div>
					</div>
	    		</div>

					
	            </div>
	       	</div>
	        
	


@endsection

@section('script')
	<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
	  <script>
	  	$(document).ready(function() {
		  $( ".botton" ).click(function() {
		  	  var dNow = new Date();
              var tiempo_fin_real = dNow.getFullYear() + '-' + (dNow.getMonth()+1) + '-' + dNow.getDate() + ' ' + dNow.getHours() + ':' + dNow.getMinutes();
			  $("#tiempo_fin_real").val(tiempo_fin_real);

		       var valores="";
		       var reserva="";
              // Obtenemos todos los valores contenidos en los <td> de la fila

              // seleccionada

              $(this).parents("tr").find(".numero").each(function(){

                valores+=$(this).html();

              });
              $(this).parents("tr").find(".id_habitacion").each(function(){

                reserva+=$(this).html();

              });
               $("#id").val(reserva);

              if( (new Date(valores).getTime() < new Date(tiempo_fin_real).getTime()))
			    {
			       var horas_extras = calcularTiempoDosFechas(valores, tiempo_fin_real);
				   console.log(horas_extras);
				   $("#horas_extras").val(horas_extras);
			    }else{
			    	$("#horas_extras").val("00:00");
			    }

			   
			   
		  });
		});


		  function calcularTiempoDosFechas(date1, date2){
		    start_actual_time = new Date(date1);
		    end_actual_time = new Date(date2);

		    var diff = end_actual_time - start_actual_time;

		    var diffSeconds = diff/1000;
		    var HH = Math.floor(diffSeconds/3600);
		    var MM = Math.floor(diffSeconds%3600)/60;

		    var formatted = ((HH < 10)?("0" + HH):HH) + ":" + ((MM < 10)?("0" + MM):MM)
		    return formatted;
		}

    </script>


   
@endsection