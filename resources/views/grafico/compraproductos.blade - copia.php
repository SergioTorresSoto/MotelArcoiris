@extends('layouts.app')

@section('content')
<?php  $nombremes=array("","ENERO","FEBRERO","MARZO","ABRIL","MAYO","JUNIO","JULIO","AGOSTO","SEPTIEMBRE","OCTUBRE","NOVIEMBRE","DICIEMBRE"); ?>


	<div class="col-md-12">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif
			<div class="panel panel-info">
            <div class="panel-heading"> 
            	<h3>Grafico Compra Productos
                	
            </div>
               
            <div class="panel-body">
		<div  class="row" >
			<div class="col-md-4">

 				<div class="form-group">	
			        {!! Form::label('tiempo_inicio', 'Fecha Inicio', ['class' => 'calendar1']) !!}
					<div class='input-group'>
				        {!! Form::date('tiempo_inicio', null, ['class' => 'form-control calendar1', 'required']) !!}
			            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
			        </div>
				</div>
			</div>


			<div class="col-md-4">
			    <div class="form-group">	
			        {!! Form::label('tiempo_fin', 'Fecha Fin') !!}
			       		<div class='input-group'>
				        	{!! Form::date('tiempo_fin', null, ['class' => 'form-control', 'required ','onchange' => 'cargar_grafica_barras()']) !!}
				                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	                    </div>
				                        
				</div>  
			</div>
			<div class="col-md-4">
			    <div class="hidden form-group">	
			        {!! Form::label('opcion', 'Filtro',['class' => 'control-label']) !!}
			       		<div class='input-group'>
				        	{!! Form::select('opcion', ['semana'=>'Semana','mes' => 'Mes', 'anio'=>'Año'] , null, ['class' => 'form-control']) !!}
				                <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
	                    </div>
				                        
				</div>  
			</div>
		</div>

		<div  class="row" >
			<div class="col-md-11">
		
				<div class="box box-primary">
					<div class="box-header">
					</div>

					<div class="box-body">
						<div id="div_grafica_barras"></div>
					</div>

				    <div class="box-footer">
					</div>
				</div>


			</div>
				<br/>
				
				<div class="col-md-12">
					<br/>
					<div class="box box-primary">
						<div class="box-header">
						</div>

						<div class="box-body" id="div_grafica_pie">
						</div>

					    <div class="box-footer">
						</div>
					</div>
				</div>
				
			
</div>
</div>


@endsection

@section('script')

<script src="https://code.highcharts.com/stock/highstock.js"></script>
<script src="https://code.highcharts.com/stock/modules/exporting.js"></script>
<script src="https://code.highcharts.com/stock/modules/export-data.js"></script>

	


	<script type="text/javascript">
		$(document).ready(function(){
			var fecha = new Date();
			var ano = fecha.getFullYear();
			fecha_inico = ano+"-01-01";
			fecha_fin = ano+"-12-31";
			cargar_grafica_barras(fecha_inico,fecha_fin);
			cargar_grafica_pie(fecha_inico,fecha_fin);

			$("#tiempo_fin").change(function () {
	           
	            var fecha_inico=$("#tiempo_inicio").val();
			    var fecha_fin=$("#tiempo_fin").val();
			    var opcion = $("#opcion").val();
			//    console.log(opcion);
			    cargar_grafica_barras(fecha_inico,fecha_fin,opcion);
    			cargar_grafica_pie(fecha_inico,fecha_fin);
	       	});

		});


		function cargar_grafica_barras(inicio,fin){



			

			var url = "registro_compras_insumos/"+inicio+"/"+fin+"/"+opcion+"";
			nuevo =[];

			$.get(url,function(resul){
			var datos= jQuery.parseJSON(resul);
			console.log(datos);
			var fechas=datos.fechas;
			var contador=datos.contador;



			for(i=0;i<=fechas.length;i++){
				conver = new Date(fechas[i]);
				nuevo[i]=[conver.getTime(),(contador[i])];

			}
			Highcharts.chart('div_grafica_barras', {
				chart: {
	 	   
            type: 'column'
        },

			    rangeSelector: {
			      selected: 0
			    },


			    title: {
			      text: 'Gastos en compra de productos'
			    },
			    xAxis: {

			    type: 'datetime'
				},


			    series: [{
			      name: 'Total $',
			      data: nuevo,
			      
			    }]
			  });

			

			})


		}

		function cargar_grafica_pie(inicio,fin){
			$("#div_grafica_pie").html( $("#cargador_empresa").html() );

			var url = "registro_compras_insumos_pie/"+inicio+"/"+fin+"";
		
		
			$.get(url,function(resul){
			var datos= jQuery.parseJSON(resul);
			
			var nombre = datos.nombreProducto
			var cantidad = datos.cantidadProducto

		
			Highcharts.chart('div_grafica_pie', {


			    rangeSelector: {
			      selected: 1
			    },

			    title: {
			      text: 'Cantidad Compra de Produtos'
			    },
			    xAxis: {
		            categories: nombre,
		             title: {
		                text: 'Producto'
		            },
		            crosshair: true,
		        },


			    series: [{
			      name: 'Cantidad',
			      data: cantidad,
			      
			    }]
			  });

			

			})



		}
	</script>

	
@endsection