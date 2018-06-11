@extends('layouts.admin')

@section('title', 'Consultar Accidentes de Tránsito')
@section('subtitle', 'Panel de Consultas de Accidentes Generales C·A·S')

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

				<button class="btn btn-secondary btn-block waves-effect waves-light" type="button" id="consultar">
                    <i class="fa fa-search m-r-5"></i>
                    <span>Consultar</span>
                </button>
			</form>
        </div>
    </div>
</div>

<div class="row">
	{{-- Grafico de pie --}}
	<div class="col-lg-7">
		<div class="card-box">
			<h4 class="header-title">Cantidad de accidentes de tránsito por meses</h4>
			<div class="accidentes_mes">
				<canvas id="accidentes_mes" height="250"></canvas>
			</div>
		</div>
	</div>

	{{-- Google Map --}}
	<div class="col-lg-5">
		<div class="card-box">
			<h4 class="header-title">Localidades en que han sucedido estos accidentes</h4>
			<div id="mymap" style="width: 100%; height: 400px;"></div>
		</div>
	</div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title mb-3">Información adicional sobre los accidentes ocurridos</h4>
            <div class="table-responsive">
                <table id="datatable-buttons" class="table table-striped table-bordered text-center" cellspacing="0" width="100%">
                    <thead>
                    <tr>
                    	<th>No. Placa</th>
                        <th>Marca & Modelo</th>
                    	<th>Color</th>
                    	<th>Año Fabricación</th>
                        <th>Cant. Accidentes</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('admin/plugins/datatables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/jszip.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/pdfmake.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/vfs_fonts.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/buttons.print.min.js') }}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
<script src="http://maps.google.com/maps/api/js?key=AIzaSyCdH0OxjbEmJx1ZOLMPM5oq_bty_TZA_vk&libraries=visualization"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gmaps.js/0.4.24/gmaps.js"></script>

<script type="text/javascript">

	$('#consultar').click(function () {
		
		$.ajax({
	        type: 'POST',
	        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
	        url: '{{ route('general_consulting_accidents') }}',
	        data: { 'year': $('#year').val() },
	        success: function( response ) {

	            var mes = response.data.nombres_mes;
	            var cant_accidentes = response.data.cant_accidentes;
	            var ubications = response.data.ubications;
	            var datos = response.data.datos;


	            {{-- Grafico de barras --}}
	            // removiendo el lienzo para genera un nuevo grafico
		        $("canvas#accidentes_mes").remove();
				$("div.accidentes_mes").append('<canvas id="accidentes_mes" class="animated fadeIn" height="250"></canvas>');

		        var ctx = document.getElementById("accidentes_mes").getContext('2d');
		        var myChart = new Chart(ctx, {
		            type: 'bar',
		            data: {
		                labels: mes,
		                datasets: [{
		                    data: cant_accidentes,
		                    backgroundColor: [
		                        '#00ACC1',
		                        '#FBC02D',
		                        '#424242',
		                        '#FF3D00',
		                        '#d50000',
		                        '#E040FB',
		                        '#388E3C',
		                        '#03A9F4',
		                        '#EC407A',
		                        '#FFCC80',
		                        '#757575',
		                        '#607D8B'
		                    ],
		                    borderColor: [
		                        '#00ACC1',
		                        '#FBC02D',
		                        '#424242',
		                        '#FF3D00',
		                        '#d50000',
		                        '#E040FB',
		                        '#388E3C',
		                        '#03A9F4',
		                        '#EC407A',
		                        '#FFCC80',
		                        '#757575',
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
		                    text: 'Cantidad de Accidentes'
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
		        	zoom: 14
			    });

			    $.each(ubications, function(index, value) {
				    mymap.addMarker({
				    	lat: value.latitud,
				    	lng: value.longitud,
				    	title: value.ubicacion,
				    	click: function(e) {
				    		infoAlert(value.ubicacion + ', La Vega, Rep. Dom.', 'En esta localidad se han registrado ' + value.total + ' accidente(s)' + ' para el año consultado.');
				      	}
				    });
			   	});

			    $("#datatable-buttons").DataTable().destroy();
				$('#datatable-buttons tbody tr').remove();

			    $.each(datos, function(index, value) {
			    	$('#datatable-buttons').append("<tr><td>"+value.numero_placa+"</td><td>"+value.marca+' '+value.modelo+"</td><td><i class='fa fa-car' style="+'color:'+ value.color+"></i></td><td>"+value.year_fabricacion+"</td><td>"+value.accidentes+"</td></tr>");
			    });

			    // DataTable
			   	var table = $('#datatable-buttons').DataTable({
		            lengthChange: false,
		            buttons: ['copy', 'excel', 'pdf'],
		            "responsive": true,
		            "lengthMenu": [[5, 10, 15, 20], [5, 10, 15, 20]],
		            "language": {
		                "sProcessing": "Procesando...",
		                "sLengthMenu": "Mostrar _MENU_ registros",
		                "sZeroRecords": "No se encontraron resultados",
		                "sEmptyTable": "Ningún dato disponible en esta tabla",
		                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
		                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
		                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
		                "sInfoPostFix": "",
		                "sSearch": "Buscar:",
		                "sUrl": "",
		                "sInfoThousands": ",",
		                "sLoadingRecords": "Cargando...",
		                "oPaginate": {
		                    "sFirst": "Primero",
		                    "sLast": "Último",
		                    "sNext": "Siguiente",
		                    "sPrevious": "Anterior"
		                },
		                "oAria": {
		                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
		                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		                }
		            }
		        });

		        table.buttons().container()
		            .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');

	        } // end ajax
	    });
	});
</script>

@endsection

@section('styles')
	<link href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection