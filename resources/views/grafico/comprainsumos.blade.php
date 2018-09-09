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
            	<h3>Grafico Compra Insumos
                	
            </div>
               
                	<div class="panel-body">
		<div  class="row" >
			<div class="col-md-6">

 				{!! Form::label('anio_sel', 'Año',['class' => 'control-label']) !!}
			    {!! Form::selectRange('anio_sel', 2015, 2030, $anio, ['class' => 'form-control', 'onchange' => 'cambiar_fecha_grafica()']) !!}


			</div>


			<div class="col-md-6">
			                  
					<label> Meses</label>
			                  <select class="form-control" id="mes_sel" onchange="cambiar_fecha_grafica();" >
			                  <?php  echo '<option value="'.$mes.'" >'.$nombremes[intval($mes)].'</option>';   ?>
			                    <option value="1">ENERO</option>
			                    <option value="2">FEBRERO</option>
			                    <option value="3">MARZO</option>
			                    <option value="4">ABRIL</option>
			                    <option value="5">MAYO</option>
			                    <option value="6">JUNIO</option>
			                    <option value="7">JULIO</option>
			                    <option value="8">AGOSTO</option>
			                    <option value="9">SEPTIEMBRE</option>
			                    <option value="10">OCTUBRE</option>
			                    <option value="11">NOVIEMBRE</option>
			                    <option value="12">DICIEMBRE</option>
			                  	<option value="13">Anual</option>
			                  </select>

			</div>
		</div>

		<div  class="row" >
			<div class="col-md-8">
			<br/>
				<div class="box box-primary">
					<div class="box-header">
					</div>

					<div class="box-body" id="div_grafica_barras">
					</div>

				    <div class="box-footer">
					</div>
				</div>


			</div>
			<div class="col-md-4">
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
					<br/>
					<div class="col-md-6">

	 				{!! Form::label('anio', 'Año',['class' => 'control-label']) !!}
				    {!! Form::selectRange('anio', 2015, 2030, $anio, ['class' => 'form-control', 'onchange' => 'cambiar_anio_grafica()']) !!}

				    <br/>
				</div>
				<div class="col-md-8">
					<br/>
					<div class="box box-primary">
						<div class="box-header">
						</div>

						<div class="box-body" id="div_grafica_lineas">
						</div>

					    <div class="box-footer">
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<br/>
					<div class="box box-primary">
					<div class="box-header">
					</div>

					<div class="box-body" id="div_grafica_pie_anual">
					</div>

				    <div class="box-footer">
				</div>
			</div>


			<br/>
			


		</div>
</div>
</div>


@endsection

@section('script')

	<script src="https://code.highcharts.com/highcharts.js"></script>
	<script src="{{ asset('js/graficos/comprainsumos.js') }}"></script>
	<script src="https://code.highcharts.com/modules/series-label.js"></script>
	<script src="https://code.highcharts.com/modules/exporting.js"></script>
	<script src="https://code.highcharts.com/modules/export-data.js"></script>

	


	<script type="text/javascript">
		cargar_grafica_barras(<?= $anio; ?>,<?= intval($mes); ?>);
		cargar_grafica_lineas(<?= $anio; ?>);
		cargar_grafica_pie(<?= $anio; ?>,<?= intval($mes); ?>);
		cargar_grafica_pie_anual(<?= $anio; ?>);
	</script>

@endsection