@extends('layouts.app')

@section('content')
<div class="container-fluid">
	<div class="col-md-12">
    		@if(Session::has('message'))
			   <div class="alert alert-success alert-dismissible" role="alert">
			      <button type="button" class="close" data-dismiss="alert" arial-label="Close">×<span aria-      hidden="true">x</span></button>
			         {{ Session::get('message') }}	
			    </div>
			@endif
			<div class="panel panel-info">
            <div class="panel-heading"> 
            	<h3>Grafico Reservas
                	
            </div>
               
            <div class="panel-body">
		

		<div  class="row" >
			<div class="col-md-12">
		
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
				
				
				<div class="col-md-12">
				
					<div class="box box-primary">
						<div class="box-header">
						</div>

						<div class="box-body" id="div_grafica_lineas">
						</div>

					    <div class="box-footer">
						</div>
					</div>
				</div>
				
	</div>		
	</div>
</div>
</div>
</div>

@endsection

@section('script')

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="https://code.highcharts.com/modules/data.js"></script>
	<script src="https://code.highcharts.com/modules/drilldown.js"></script>
	<script src="https://code.highcharts.com/modules/series-label.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>

	


	<script type="text/javascript">
		$(document).ready(function(){

			cargar_grafica_barras();
			cargar_grafica_lineas();


		});


		function cargar_grafica_barras(){


			var url = "grafica_registros";
		

			$.get(url,function(resul){
			var datos= jQuery.parseJSON(resul);
			console.log(datos.reservaOnline);
			var compraAños =datos.reservaOnline[0];
			var comprasMeses = datos.reservaOnline[1];
			var compraDias = datos.reservaOnline[2];
		
			
			series = [];
			drilldown =[];
			
			for(i=0;i<compraAños.length;i++){
			//	console.log(i);
				series.push({
				            y:  parseInt(compraAños[i].total),
				            x:  compraAños[i].ano,
				            myData: "Online: "+compraAños[i].online+" Presencial: "+compraAños[i].presencial+" Total: "+compraAños[i].reservas,
				  			drilldown: 'mes'+i
				        }
				    );

				

				drillSeries=[];

				for(j=0;j<comprasMeses.length;j++){

					drillSeries2 = [];
					año = comprasMeses[j].meses.split(" ");

					for (var k = 0; k < compraDias.length; k++) {
						dia = compraDias[k].dias.split(" ");
						if(dia[0]+" "+dia[1] == año[0]+" "+año[1]){
							drillSeries2.push({
						        y:  parseInt(compraDias[k].total),
						        x:  parseInt(dia[2]),
								name:  dia[2]+" "+dia[0]+" "+dia[1],
								myData:"Online: "+compraDias[k].online+" Presencial: "+compraDias[k].presencial+" Total: "+compraDias[k].reservas
								
							    }
							);	
						}
					}
					
					drilldown.push({
						name: "Reservas",
						id: 'dia'+j,

						data: drillSeries2,
						colorByPoint: true,
			  		//	drilldown: 'animals'
					});

						
					
					if(año[1] == compraAños[i].ano){
						drillSeries.push({
					        y:  parseInt(comprasMeses[j].total),
					        x:  parseInt(año[2]),
							name:  año[0]+" "+año[1],
							myData: "Online: "+comprasMeses[j].online+" Presencial: "+comprasMeses[j].presencial+" Total: "+comprasMeses[j].reservas,
							drilldown: 'dia'+j,
							
						    }
						);	
					}
				}
				drilldown.push({
					name: 'Reservas',
					id: 'mes'+i,
					data: drillSeries,
					colorByPoint: true,
		  		//	drilldown: 'animals'
				});
		//		console.log("dril",drillSeries);
				

			}

			
			$('#div_grafica_barras').highcharts({
		        chart: {
		            type: 'column',
		            zoomType: 'x'
		        },
		        title: {
		            text: 'Ganancias'
		        },
		        yAxis: {
		            title: {
		                text: 'Pesos Chilenos'
		            }
		        },
		        xAxis: {
			        type: 'category',
			        title: {
			            text: 'Fecha'
			        },
			    },
			    tooltip: {
			        formatter: function() {
			          return 'Ingreso: <b>$' + this.point.y+' / '+ this.point.myData + '</b>';
			        }
			      },

		        legend: {
		            enabled: false
		        },

		        

		        series: [{
		            name: 'Reservas',
		            colorByPoint: true,
		            data: series
		        }],
		        drilldown: {
		            series: drilldown
		        }
		    })
			

			})


		}

		function cargar_grafica_lineas(){
			

			var url = "grafica_anio";
		
			$.get(url,function(resul){
				var datos= jQuery.parseJSON(resul);
				
				var productos = datos.productos ;
				
				
				series = [];
				drilldownSerie =[];
				for(i=0;i<productos.length;i++){
				//	console.log(productos[i].años);
					años = productos[i].años;
					meses= productos[i].meses;
					dias= productos[i].dias;
					series2 =[];

					for (var j = 0; j < años.length; j++) {
						series2.push({
				            y:  parseInt(años[j].total),
				            x:  años[j].ano,
				  			drilldown: productos[i].numero_habitacion+'año'+j
					        }
					    );
					    drillSeries2 =[];
					    for (var k = 0; k < meses.length; k++) {
					   // 	console.log(meses.length);
					   		año = meses[k].meses.split(" ");

					   		drillSeries3 = [];
					    	for (var l = 0; l < dias.length; l++) {
					    		dia = dias[l].dias.split(" ");
					    		
					    		if(dia[0]+" "+dia[1] == año[0]+" "+año[1]) {
					    		//	console.log(dia,meses[k].meses);
					    			drillSeries3.push({
								        y:  parseInt(dias[l].total),
								        x:  parseInt(dia[2]),
										name:dia[2]+" "+dia[3]+" "+dia[1],

									    }
									);
					    		}
					    	}
					    	
					    	drilldownSerie.push({
								name: 'Habitacion #'+productos[i].numero_habitacion,
								id: productos[i].numero_habitacion+'mes'+k,
								data: drillSeries3
					  		//	drilldown: 'animals'
							});

					    	

					    	if(año[1] == años[j].ano){
					    		drillSeries2.push({
							        y:  parseInt(meses[k].total),
							        x:parseInt(año[0]),
									name:año[2]+" "+año[1],
									drilldown: productos[i].numero_habitacion+'mes'+k
								    }
								);

					    	}
					    	
					    }
					

					    drilldownSerie.push({
							name: 'Habitacion #'+productos[i].numero_habitacion,
							id: productos[i].numero_habitacion+'año'+j,
								data: drillSeries2,
							//	colorByPoint: true,
					  		//	drilldown: 'animals'
						});					    	
					    
						
					}
				//	console.log(drillSeries);
					series.push({
					            name:'Habitacion #'+productos[i].numero_habitacion,
					        //    colorByPoint: true,
					            data:series2
					        }
					);


				}
			//	console.log(drilldownSerie);

				$('#div_grafica_lineas').highcharts({
			        chart: {
			            type: 'column',
			            zoomType: 'x'
			        },
			        title: {
			            text: 'Cantidad de reservas por habitacion'
			        },
			        yAxis: {
			            title: {
			                text: 'Cantidad'
			            },
			        },
			        legend: {
			            layout: 'vertical',
			            align: 'right',
			            verticalAlign: 'middle',
			            borderWidth: 0
			        },
			        xAxis: {
			            type: 'category',
			            title: {
			                text: 'Fecha'
			            },
			        },

			        tooltip: {
			            valueSuffix: ' registros'
			        },
			        series: series,

			        drilldown: {
			            series: drilldownSerie
			        }
			    })

				

			

			})



		}
	</script>

	
@endsection