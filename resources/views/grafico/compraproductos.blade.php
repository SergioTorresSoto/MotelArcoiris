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
	            	<h3>Grafico Compra Productos
	                	
	            </div>
               
	            <div class="panel-body">
			

					<div  class="row" >
						<div class="col-md-6">
					
							<div class="box box-primary">
								<div class="box-header">
								</div>

								<div class="box-body">
									<div id="div_grafica_productos_barras"></div>
								</div>

							    <div class="box-footer">
								</div>
							</div>


						</div>
							
							
							<div class="col-md-6">
							
								<div class="box box-primary">
									<div class="box-header">
									</div>

									<div class="box-body" id="div_grafica_productos_lineas">
									</div>

								    <div class="box-footer">
									</div>
								</div>
							</div>
						 </div>	
					</div>	
			</div>
		</div>
	<div class="col-md-12">
    		
			<div class="panel panel-info">
	            <div class="panel-heading"> 
	            	<h3>Grafico Compra Insumos
	                	
	            </div>
               
	            <div class="panel-body">
			

					<div  class="row" >
						<div class="col-md-6">
					
							<div class="box box-primary">
								<div class="box-header">
								</div>

								<div class="box-body">
									<div id="div_grafica_insumos_barras"></div>
								</div>

							    <div class="box-footer">
								</div>
							</div>


						</div>
							
							
							<div class="col-md-6">
							
								<div class="box box-primary">
									<div class="box-header">
									</div>

									<div class="box-body" id="div_grafica_insumos_lineas">
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

			cargar_grafica_productos_barras();
			cargar_grafica_productos_lineas();
			cargar_grafica_insumos_barras();
			cargar_grafica_insumos_lineas();
		});

		function cargar_grafica_insumos_barras(){


			var url = "registro_compras_insumos";
		

			$.get(url,function(resul){
			var datos= jQuery.parseJSON(resul);
			var compraAños =datos.totalComprasAños;
			var comprasMeses = datos.totalComprasMeses;
			var compraDias = datos.totalComprasDias;
		
			
			series = [];
			drilldown =[];
			
			for(i=0;i<compraAños.length;i++){
			//	console.log(i);
				series.push({
				            y:  parseInt(compraAños[i].total),
				            x:  compraAños[i].ano,
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
								
							    }
							);	
						}
					}
					
					drilldown.push({
						name: 'Insumos',
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
							drilldown: 'dia'+j,
							
						    }
						);	
					}
				}
				drilldown.push({
					name: 'Insumos',
					id: 'mes'+i,
					data: drillSeries,
					colorByPoint: true,
		  		//	drilldown: 'animals'
				});
		//		console.log("dril",drillSeries);
				

			}

			
			$('#div_grafica_insumos_barras').highcharts({
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: 'Gastos en Insumos'
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

		        legend: {
		            enabled: false
		        },

		        

		        series: [{
		            name: 'Insumos',
		            colorByPoint: true,
		            data: series
		        },],
		        drilldown: {
		            series: drilldown
		        }
		    })
			

			})


		}

		function cargar_grafica_insumos_lineas(){
			

			var url = "registro_compras_insumos_lineas";
		
			$.get(url,function(resul){
				var datos= jQuery.parseJSON(resul);
				var productos = datos.productos ;
				console.log(productos);
				
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
				  			drilldown: productos[i].nombre+'año'+j
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
								name: productos[i].nombre,
								id: productos[i].nombre+'mes'+k,
								data: drillSeries3
					  		//	drilldown: 'animals'
							});

					    	

					    	if(año[1] == años[j].ano){
					    		drillSeries2.push({
							        y:  parseInt(meses[k].total),
							        x:parseInt(año[0]),
									name:año[2]+" "+año[1],
									drilldown: productos[i].nombre+'mes'+k
								    }
								);

					    	}
					    	
					    }
					

					    drilldownSerie.push({
							name: productos[i].nombre,
							id: productos[i].nombre+'año'+j,
								data: drillSeries2,
							//	colorByPoint: true,
					  		//	drilldown: 'animals'
						});					    	
					    
						
					}
				//	console.log(drillSeries);
					series.push({
					            name:productos[i].nombre,
					        //    colorByPoint: true,
					            data:series2
					        }
					);


				}
			//	console.log(drilldownSerie);

				$('#div_grafica_insumos_lineas').highcharts({
			        chart: {
			            
			        },
			        title: {
			            text: 'Cantidad de Insumos'
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


		function cargar_grafica_productos_barras(){


			var url = "registro_compras_productos";
		

			$.get(url,function(resul){
			var datos= jQuery.parseJSON(resul);
			var compraAños =datos.totalComprasAños;
			var comprasMeses = datos.totalComprasMeses;
			var compraDias = datos.totalComprasDias;
		
			
			series = [];
			drilldown =[];
			
			for(i=0;i<compraAños.length;i++){
			//	console.log(i);
				series.push({
				            y:  parseInt(compraAños[i].total),
				            x:  compraAños[i].ano,
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
								
							    }
							);	
						}
					}
					
					drilldown.push({
						name: 'Productos',
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
							drilldown: 'dia'+j,
							
						    }
						);	
					}
				}
				drilldown.push({
					name: 'Productos',
					id: 'mes'+i,
					data: drillSeries,
					colorByPoint: true,
		  		//	drilldown: 'animals'
				});
		//		console.log("dril",drillSeries);
				

			}

			
			$('#div_grafica_productos_barras').highcharts({
		        chart: {
		            type: 'column'
		        },
		        title: {
		            text: 'Gastos en Productos Comprados'
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

		        legend: {
		            enabled: false
		        },

		        

		        series: [{
		            name: 'Productos',
		            colorByPoint: true,
		            data: series
		        },],
		        drilldown: {
		            series: drilldown
		        }
		    })
			

			})


		}

		function cargar_grafica_productos_lineas(){
			

			var url = "registro_compras_productos_lineas";
		
			$.get(url,function(resul){
				var datos= jQuery.parseJSON(resul);
				var productos = datos.productos ;
				console.log(productos);
				
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
				  			drilldown: productos[i].nombre+'año'+j
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
								name: productos[i].nombre,
								id: productos[i].nombre+'mes'+k,
								data: drillSeries3
					  		//	drilldown: 'animals'
							});

					    	

					    	if(año[1] == años[j].ano){
					    		drillSeries2.push({
							        y:  parseInt(meses[k].total),
							        x:parseInt(año[0]),
									name:año[2]+" "+año[1],
									drilldown: productos[i].nombre+'mes'+k
								    }
								);

					    	}
					    	
					    }
					

					    drilldownSerie.push({
							name: productos[i].nombre,
							id: productos[i].nombre+'año'+j,
								data: drillSeries2,
							//	colorByPoint: true,
					  		//	drilldown: 'animals'
						});					    	
					    
						
					}
				//	console.log(drillSeries);
					series.push({
					            name:productos[i].nombre,
					        //    colorByPoint: true,
					            data:series2
					        }
					);


				}
			//	console.log(drilldownSerie);

				$('#div_grafica_productos_lineas').highcharts({
			        chart: {
			            
			        },
			        title: {
			            text: 'Cantidad de Productos Comprados'
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