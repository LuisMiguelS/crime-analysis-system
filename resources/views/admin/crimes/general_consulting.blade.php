@extends('layouts.admin')

@section('title', 'Consultar Crímenes')
@section('subtitle', 'Panel de Consultas de Crímenes Generales C·A·S')

@section('content')
	
<div class="row">
	<div class="col-lg-12">
		<div class="card-box">
			<h4 class="header-title">Reporte general de crímenes</h4>
			<p class="text-muted m-b-30 font-13">
                Selecciona los parámetros deseados para generar una consulta general
            </p>

			<form method="" action="">
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="">Tipo de Crímen</label>
						<select class="form-control" id="crimen">
							@foreach($crimenes as $crimen)
								<option value="{{ $crimen->id }}">{{ $crimen->nombre_crimen }}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group col-md-3">
						<label for="">Año</label>
						<select class="form-control" id="year">
							@foreach($years as $year)
								<option value="{{ $year->yyear }}">{{ $year->yyear }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<button class="btn btn-danger btn-block waves-effect waves-light" type="button" id="consultar">
                    <i class="fa fa-search m-r-5"></i>
                    <span>Consultar</span>
                </button>
			</form>
		</div>
	</div>
</div>

<div class="row">
	{{-- Grafico de pie --}}
	<div class="col-lg-6">
		<div class="card-box">
			<h4 class="header-title">Tipos de armas utilizadas en el tipo de crimen consultado</h4>
			<div class="crimen_arma">
				<canvas id="crimen_arma" height="250"></canvas>
			</div>
		</div>
	</div>

	{{-- Grafico de barras --}}
	<div class="col-lg-6">
		<div class="card-box">
			<h4 class="header-title">Ocurrencia del crimen consultado en meses</h4>
			<div class="crimen_mes">
				<canvas id="crimen_mes" height="250"></canvas>
			</div>
		</div>
	</div>

	{{-- Google Map --}}
	<div class="col-lg-12">
		<div class="card-box">
			<h4 class="header-title">Localidades en que ha sucedido el crimen consultado</h4>
			<div id="mymap" style="width: 100%; height: 400px;"></div>
		</div>
	</div>

	{{-- Google Heat Map --}}
	<div class="col-lg-7">
		<div class="card-box">
			<h4 class="header-title">Zonas más activas en que ha sucecido el crimen consultado</h4>
			<div id="heatmap" style="width: 100%; height: 400px;"></div>
		</div>
	</div>

	{{-- Listado de crimenes por año --}}
    <div class="col-lg-5">
        <div class="card-box">
            <h4 class="header-title mb-4">Personas que han cometido el crimen consultado</h4>
            <div class="inbox-widget slimscroll" id="persons" style="height: 340px;"></div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCdH0OxjbEmJx1ZOLMPM5oq_bty_TZA_vk&libraries=visualization"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

<script type="text/javascript">

	$('#consultar').click(function () {
		
		$.ajax({
	        type: 'POST',
	        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	        url: '{{ route('generate_consulting') }}',
	        data: { 'crimen': $('#crimen').val(), 'year': $('#year').val() },
	        success: function( response ) {

	            var label_armas = response.data.nombres_arma;
	            var val_armas = response.data.cant_armas;
	            var mes = response.data.nombres_mes;
	            var cant_crimen = response.data.cant_crimen;
	            var ubications = response.data.ubications;
	            var person_crimen = response.data.person_crimen;

				
				{{-- Grafico de pie --}}
		        // removiendo el lienzo para genera un nuevo grafico
		        $("canvas#crimen_arma").remove();
				$("div.crimen_arma").append('<canvas id="crimen_arma" height="250"></canvas>');

		        var oilCanvas = document.getElementById("crimen_arma");

		        var oilData = {
		            labels: label_armas,
		            datasets: [
		                {
		                    data: val_armas,
		                    backgroundColor: [
		                        "#F57C00",
		                        "#4E342E",
		                        "#0097A7",
		                        "#01579B",
		                        "#DD2C00"
		                    ]
		                }
		            ]
		        };

		        var pieChart = new Chart(oilCanvas, {
		            type: 'pie',
		            data: oilData
		        });


	            {{-- Grafico de barras --}}
	            // removiendo el lienzo para genera un nuevo grafico
		        $("canvas#crimen_mes").remove();
				$("div.crimen_mes").append('<canvas id="crimen_mes" class="animated fadeIn" height="250"></canvas>');

		        var ctx = document.getElementById("crimen_mes").getContext('2d');
		        var myChart = new Chart(ctx, {
		            type: 'bar',
		            data: {
		                labels: mes,
		                datasets: [{
		                    data: cant_crimen,
		                    backgroundColor: [
		                        '#00695C',
		                        '#00BFA5',
		                        '#0277BD',
		                        '#D84315',
		                        '#4E342E',
		                        '#FF8F00',
		                        '#0091EA',
		                        '#d50000',
		                        '#FFD600',
		                        '#4DD0E1',
		                        '#FF5722',
		                        '#607D8B'
		                    ],
		                    borderColor: [
		                        '#00695C',
		                        '#00BFA5',
		                        '#0277BD',
		                        '#D84315',
		                        '#4E342E',
		                        '#FF8F00',
		                        '#0091EA',
		                        '#d50000',
		                        '#FFD600',
		                        '#4DD0E1',
		                        '#FF5722',
		                        '#607D8B'
		                    ],
		                    borderWidth: 2
		                }]
		            },
		            options: {
		                scales: {
		                    yAxes: [{
		                        ticks: {
		                            beginAtZero: true
		                        }
		                    }]
		                },

		                title: {
		                    display: true,
		                    text: 'Cantidad de Crímenes'
		                },

		                legend: {
		                    display: false
		                }
		            }
		        });


		        {{-- Google Map --}}
		        var mymap = new GMaps({
		        	el: '#mymap',
		        	lat: 19.221402559815967,
		        	lng: -70.5266625221688,
		        	zoom: 15
			    });

			    $.each(ubications, function(index, value) {
				    mymap.addMarker({
				    	lat: value.latitud,
				    	lng: value.longitud,
				    	title: value.ubicacion,
				    	click: function(e) {
				    		infoAlert(value.ubicacion + ', La Vega, Rep. Dom.', 'En esta localidad se han registrado ' + value.total + ' crímen(es)' + ' para el año consultado.');
				      	}
				    });
			   	});

			   	{{-- Heat Map --}}
			   	var heatmapData = [];

			   	for (var x = 0; x < ubications.length; x++)
			   	{
			   		heatmapData.push(new google.maps.LatLng(ubications[x].latitud, ubications[x].longitud));
			   	}

		      	// var repDom = new google.maps.LatLng(37.774546, -122.433523);
		      	var repDom = new google.maps.LatLng(19.221402559815967, -70.5266625221688);

		     	map = new google.maps.Map(document.getElementById('heatmap'), {
		          	center: repDom,
		          	zoom: 8,
		          	mapTypeId: 'satellite'
		      	});

		      	var heatmap = new google.maps.visualization.HeatmapLayer({
		          	data: heatmapData
		      	});
		      
		      	heatmap.setMap(map);

		      	$('#persons').empty();
		      	$.each(person_crimen, function(index, value) {
			      	$('#persons').append('<div><div class="inbox-item"><div class="inbox-item-img"><img src="{{ asset('images') }}/'+ value.id +'.jpg" class="rounded-circle bx-shadow-lg" alt=""></div><p class="inbox-item-author">'+ value.nombre +'</p><p class="inbox-item-text">' + value.cedula.substr(0, 3)+'-'+value.cedula.substr(3, 7)+'-'+value.cedula.substr(10) + '</p><p class="inbox-item-date">' + value.total + ' crímen(es)</p></div></div>');
	            });

	        } // end ajax
	    });
	});
</script>

@endsection