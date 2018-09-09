
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
	 	    renderTo: 'div_grafica_barras',
            type: 'column'
        },
        title: {
            text: 'Numero de Reservas en el Mes'
        },
        subtitle: {
            text: 'Source: plusis.net'
        },
        xAxis: {
            categories: [],
             title: {
                text: 'dias del mes'
            },
            crosshair: true,
        },
        yAxis: {
            min: 0,
            title: {
                text: 'REGISTROS AL DIA'
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
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y} </b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },
        series: [{
            name: 'Reservas',
            data: []

        }, {
            name: 'Online',
            data: []
        }, {
            name: 'Presencial',
            data: []
        }],

}

$("#div_grafica_barras").html( $("#cargador_empresa").html() );

var url = "grafica_registros/"+anio+"/"+mes+"";


$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var totaldias=datos.totaldias;
var registrosdia=datos.registrosdia;
var esOnline = datos.esOnline;
var esPresencial = datos.esPresencial;

var i=0;
	for(i=1;i<=totaldias;i++){
	
	options.series[0].data.push( registrosdia[i] );
    options.series[1].data.push( esOnline[i] );
    options.series[2].data.push( esPresencial[i] );
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
            text: 'Numero de Reservas Anuales',
            x: -20 //center
        },
        subtitle: {
            text: 'Source: Plusis.net',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'REGISTROS POR MESES'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' registros'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
         series: [{
            name: 'Reservas',
            data: []

        }, {
            name: 'Online',
            data: []
        }, {
            name: 'Presencial',
            data: []
        }],
}

$("#div_grafica_lineas").html( $("#cargador_empresa").html() );
var url = "grafica_anio/"+anio+"";

$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);


//var totaldias=datos.totaldias;
var reservas=datos.reservas;
var esOnline = datos.online;
var esPresencial = datos.presencial;


for(i=1;i<=12;i++){
    
    options.series[0].data.push( reservas[i] );
    options.series[1].data.push( esOnline[i] );
    options.series[2].data.push( esPresencial[i] );
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
                text: 'Grafica habitaciones'
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

var url = "grafica_publicaciones/"+anio+"/"+mes+"";

$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var habitaciones=datos.habitaciones;
var totalHabitaciones=datos.totalHabitaciones;
var numeroReservas=datos.numeroReservas;

    for(i=0;i<=totalHabitaciones-1;i++){  
    var idTP=parseInt(habitaciones[i].id);
    var objeto= {name: habitaciones[i].numero_habitacion, y:numeroReservas[idTP] };     
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
                text: 'Grafica habitaciones'
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

var url = "grafica_publicaciones_anios/"+anio+"";

$.get(url,function(resul){

var datos= jQuery.parseJSON(resul);

var habitaciones=datos.habitaciones;
var totalHabitaciones=datos.totalHabitaciones;
var numeroReservas=datos.numeroReservas;

    for(i=0;i<=totalHabitaciones-1;i++){  
    var idTP=parseInt(habitaciones[i].id);
    var objeto= {name: habitaciones[i].numero_habitacion, y:numeroReservas[idTP] };     
    options.series[0].data.push( objeto );  
    }
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})


}