@extends('layouts.app')

@section('title', 'Crear tipo')

@section('style')
	
	<link href="{{ asset('multiSelect/css/bootstrap-multiselect.css') }}" rel="stylesheet">
    
@endsection

@section('content')

<div class="container">
        <div class="col-md-12">
            <div class="panel panel-info">
            <div class="panel-heading">
                <h3>Asignar Jornada</h3>
            </div>
                	<div class="panel-body">

                		{!! Form::open(['route' => 'usersjornadas.store','method' => 'POST', 'class' => 'form']) !!}
	                		<div class= "row">
		                		<div  class="col-sm-6">
			                		<div class="form-group">
			                			{!! Form::label('rut', 'Usuario') !!}

								 		{!! Form::select('id_user', $users->pluck('rut','id'), null, ['class' => 'form-control', 'placeholder' => 'Seleccione una opción...', 'required']) !!}

									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">

							 			{!! Form::label('fecha_inicio', 'Desde',['class' => 'control-label']) !!}
										{!! Form::date('fecha_inicio', null, array('id' => 'datepicker_entrada','class' => 'form-control', 'required')) !!}
									</div>
								</div>
								<div class="col-sm-3">
									<div class="form-group">

							 			{!! Form::label('fecha_termino', 'Hasta',['class' => 'control-label']) !!}
										{!! Form::date('fecha_termino', null, array('id' => 'datepicker_entrada','class' => 'form-control', 'required')) !!}
									</div>
								</div>
	                		</div>
	                		<div class="panel panel-primary col-sm-12">
									<div class="panel-body">
										<div class="col-sm-3">
											<div class="form-group">

										 		{!! Form::label('id_jornada', 'Jornada',['class' => 'control-label']) !!}
						 		
						 						{!! Form::select('id_jornada', $jornadas, null, ['class' => 'form-control', 'placeholder' => '', 'required']) !!}

											</div>
										</div>

										<div class="col-sm-3">
											<div class="form-group">

									 			{!! Form::label('dia', 'Dia Semana',['class' => 'control-label']) !!}
						 						{!! Form::select('dia', array('Lunes' => 'Lunes', 'Martes' => 'Martes', 'Miercoles' => 'Miercoles', 'Jueves' => 'Jueves', 'Viernes' => 'Viernes', 'Sabado' => 'Sabado', 'Domingo' => 'Domingo'), null,['class' => 'form-control', 'multiple'=>'multiple']) !!}
											</div>
										</div>
										<div class="col-sm-3">
											<div class="form-group">	
												{!! Form::label('Opcion', '',['class' => 'control-label']) !!}
												<a id="submit" style="width: 200px" class="btn btn-primary">Agregar <span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a> 
											</div>
										</div>

										<div class=" ">
											<table id="detalles" class="table table-striped col-md-11">
												<thead style="background-color: #A9D0F5">
													<th>Eliminar</th>
													<th>Dia</th>
													<th>Entrada</th>
													<th>Salida</th>
													
												</thead>
												
												<tbody>
													
												</tbody>
											</table>
										</div>
									</div>
								</div>
							<div class="form-group">
	                            <div class="col-md-8 col-md-offset-4">
	                                {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
	                            </div>
	                        </div>

						{!! Form::close() !!}

                 	</div>
                </div>
            </div>
        </div>

</div>

@endsection	

@section('script')
	<script src="{{ asset('multiSelect/js/bootstrap-multiselect.js') }}"></script>	
  	<script type="text/javascript">
  		dias=[];
  		diasNuevos="";
  		hora="";
  		cont=0;
  		aux=0;
  		$(document).ready(function() {
		    $('#dia').multiselect({
		    	buttonWidth: '200px',
		    });
		});
		$("#submit").click(function() { 
			 diasNuevos = $("#dia").val()
    		 
    		 hora = $("#id_jornada option:selected").text();
    		 id_jornada = $("#id_jornada").val()
    		 horas= hora.split("/");
    		 if(diasNuevos=="" || hora == ""){
    		 	$.alert('Campos invalidos!', {
	                    	
	                type: 'warning', 
	                position:  ['top-right', [60, 12]],
				});
    		 }else{
    		 	for(i = 0; i < dias.length; i++){
	    			for(j = 0; j < diasNuevos.length; j++){
	    				if(dias[i] == diasNuevos[j]){
	    					cont++;
	    				}
	    			}
	    		 }
	    		 if(cont>0){
	    		 	$.alert('Dias repetidos!', {
	                    	
	                    	type: 'warning', 
	                    	position:  ['top-right', [60, 12]],
					});
	    		 	cont=0;
	    		 }else{

	    		 	dias = dias.concat(diasNuevos);
	    		 	console.log(dias);
					for (i = 0; i < diasNuevos.length; i++){
						var fila = '<tr class="selected" id="fila'+aux+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+aux+','+diasNuevos[i]+');">X</button></td><td><input type="hidden" name="diasNuevos[]" id ="'+diasNuevos[i]+'" value="'+diasNuevos[i]+'">'+diasNuevos[i]+'</td><td><input class="form-control" name="id_jornada[]"  type="hidden" readonly="readonly" value="'+id_jornada+'">'+horas[0]+'</td><td><input type="text" class="form-control" name="salida[]" readonly="readonly" value="'+horas[1]+'"></td></tr>';

						$('#detalles').append(fila);
						aux++;
					}
	    		 }
    		 }	
		});
		function eliminar(index, dia){
		//	console.log(index);
			$("#fila" + index).remove();
			for(i = 0; i < dias.length; i++){
				if (dias[i] ==dia.id) {
					dias.splice(i,1);
				}
			}
			
			diasNuevos="";
	//		console.log(dia.id, dias);
		}
  	</script>

@endsection