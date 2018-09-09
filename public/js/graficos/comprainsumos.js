function cambiar_fecha_grafica(){

    var anio_sel=$("#anio_sel").val();
    var mes_sel=$("#mes_sel").val();

    cargar_grafica_barras(anio_sel,mes_sel);
 //   cargar_grafica_lineas(anio_sel,mes_sel);
    cargar_grafica_pie(anio_sel,mes_sel);

}

function cambiar_anio_grafica(){

    var anio_sel=$("#anio").val();
  

    cargar_grafica_lineas(anio_sel);
    cargar_grafica_pie_anual(anio_sel);
}



function cargar_grafica_barras(anio,mes){

var options={
	 chart: {
	 	    renderTo: 'div_grafica_barras'
            
        },
        title: {
            text: 'Valor compra mensual'
        },
        subtitle: {
            text: 'Source: plusis.net'
        },
        xAxis: {
            categories: [],
             title: {
                text: 'Dias Del Mes'
            },
            crosshair: true,
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Precio Total'
            }
        },
        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                },
                pointStart: 2010
            }
        },


        tooltip: {
            valueSuffix: ' CLP'
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
    
        series: [{
            name: 'Compras Insumos',
            data: []

        }],

}

$("#div_grafica_barras").html( $("#cargador_empresa").html() );

var url = "grafico_compra_insumo_mensual/"+anio+"/"+mes+"";


$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);

var totaldias=datos.totaldias;
var registrosdia=datos.registrosdia;


var i=0;
	for(i=1;i<=totaldias;i++){
	
	options.series[0].data.push( registrosdia[i] );

	options.xAxis.categories.push(i);


	}


 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}



function cargar_grafica_lineas(anio){

var options={
     chart: {
            renderTo: 'div_grafica_lineas',
           
        },
          title: {
            text: 'Valor compra anual',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: Plusis.net',
            x: -20
        },
         xAxis: {
            categories: [],
             title: {
                text: 'Meses'
            },
            crosshair: true,
        },
        yAxis: {
            title: {
                text: 'Precio Total'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' CLP'
        },
        
         series: [{
            name: 'Compra Insumos',
            data: []

        }],
}

$("#div_grafica_lineas").html( $("#cargador_empresa").html() );
var url = "grafica_compra_insumos_anual/"+anio+"";

$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);


//var totaldias=datos.totaldias;
var reservas=datos.compras;



for(i=1;i<=12;i++){
    
    options.series[0].data.push( reservas[i] );

    options.xAxis.categories.push(i);


}
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}




function cargar_grafica_pie(anio,mes){
var options={
     // Build the chart
     
            chart: {
                renderTo: 'div_grafica_pie',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Grafica Insumos'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: []
            }]
     
}

$("#div_grafica_pie").html( $("#cargador_empresa").html() );

var url = "grafico_numero_compras_mensual/"+anio+"/"+mes+"";

$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var habitaciones=datos.insumos;
var totalHabitaciones=datos.totalInsumos;
var numeroReservas=datos.numeroCompras;

    for(i=0;i<=totalHabitaciones-1;i++){  
        var idTP=parseInt(habitaciones[i].id);
        var objeto= {name: habitaciones[i].nombre, y:numeroReservas[idTP] };     
        options.series[0].data.push( objeto );  
    }
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})



}

function cargar_grafica_pie_anual(anio){
var options={
     // Build the chart
     
            chart: {
                renderTo: 'div_grafica_pie_anual',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Grafica Insumos'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: []
            }]
     
}

$("#div_grafica_pie_anual").html( $("#cargador_empresa").html() );

var url = "grafica_numero_compras_anual/"+anio+"";
console.log(url);
$.get(url,function(resul){

var datos= jQuery.parseJSON(resul);
console.log(datos);
var habitaciones=datos.habitaciones;
var totalHabitaciones=datos.totalHabitaciones;
var numeroReservas=datos.numeroReservas;

    for(i=0;i<=totalHabitaciones-1;i++){  
    var idTP=parseInt(habitaciones[i].id);
    var objeto= {name: habitaciones[i].nombre, y:numeroReservas[idTP] };     
    options.series[0].data.push( objeto );  
    }
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}