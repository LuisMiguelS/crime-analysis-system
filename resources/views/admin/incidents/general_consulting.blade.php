@extends('layouts.admin')

@section('title', 'Consultar Incidentes de Vehículos')
@section('subtitle', 'Panel de Consultas de Incidentes Generales C·A·S')

@section('content')

<div class="row">
	<div class="col-lg-12">
		<div class="card-box">
			<h4 class="header-title">Reporte general de accidentes</h4>
			<p class="text-muted m-b-30 font-13">
                Selecciona los parámetros deseados para generar una consulta general
            </p>

            <form method="" action="">
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="">Año</label>
						<select class="form-control" id="year">
							@foreach($years as $year)
								<option value="{{ $year->yyear }}">{{ $year->yyear }}</option>
							@endforeach
						</select>
					</div>
				</div>

				<button class="btn btn-warning btn-block waves-effect waves-light" type="button" id="consultar">
                    <i class="fa fa-search m-r-5"></i>
                    <span>Consultar</span>
                </button>
			</form>
        </div>
    </div>
</div>

{{-- Grafico de pie --}}
<div class="row">
	<div class="col-lg-6">
		<div class="card-box">
			<h4 class="header-title">Cantidad de incidentes ocurridos por meses</h4>
			<div class="incidentes_mes">
				<canvas id="incidentes_mes" height="250"></canvas>
			</div>
		</div>
	</div>

	<div class="col-lg-6">
        <div class="card-box">
            <h4 class="header-title">Cantidad de incidentes ocurridos por status (expresado en %)</h4>
            <div class="oilChart">
            	<canvas id="oilChart" height="250"></canvas>
            </div>
        </div>
    </div>
</div>

@endsection


@section('scripts')

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script type="text/javascript">
	$('#consultar').click(function () {
		
		$.ajax({
	        type: 'POST',
	        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	        url: '{{ route('consulting_generate_incident') }}',
	        data: { 'year': $('#year').val() },
	        success: function( response ) {

	        	var mes = response.data.nombres_mes;
	            var cant_incidentes = response.data.cant_incidentes;
	            var estados = response.data.estados;
	            var totales = response.data.totales;

	            {{-- Grafico de barras --}}
	            // removiendo el lienzo para genera un nuevo grafico
		        $("canvas#incidentes_mes").remove();
				$("div.incidentes_mes").append('<canvas id="incidentes_mes" class="animated fadeIn" height="250"></canvas>');

		        var ctx = document.getElementById("incidentes_mes").getContext('2d');
		        var myChart = new Chart(ctx, {
		            type: 'bar',
		            data: {
		                labels: mes,
		                datasets: [{
		                    data: cant_incidentes,
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
		                    text: 'Cantidad de Incidentes'
		                },

		                legend: {
		                    display: false
		                }
		            }
		        });

		        {{-- Grafico de pie --}}
		        $("canvas#oilChart").remove();
				$("div.oilChart").append('<canvas id="oilChart" class="animated fadeIn" height="250"></canvas>');

		        var oilCanvas = document.getElementById("oilChart");
		        var oilData = {
		            labels: estados,
		            datasets: [
		                {
		                    data: totales,
		                    backgroundColor: [
		                        "#616161",
		                        "#212121"
		                    ]
		                }]
		        };

		        var pieChart = new Chart(oilCanvas, {
		            type: 'pie',
		            data: oilData
		        });
			    /*$("#datatable-buttons").DataTable().destroy();
				$('#datatable-buttons tbody tr').remove();

			    $.each(datos, function(index, value) {
			    	$('#datatable-buttons').append("<tr><td>"+value.numero_placa+"</td><td>"+value.marca+' '+value.modelo+"</td><td><i class='fa fa-car' style="+'color:'+ value.color+"></i></td><td>"+value.year_fabricacion+"</td><td>"+value.accidentes+"</td></tr>");
			    });*/

	        } // end ajax
	    });
	});
</script>

@endsection