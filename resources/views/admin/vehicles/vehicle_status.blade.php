@extends('layouts.admin')

@section('title', 'Reporte de Incidente Vehicular')
@section('subtitle', '¡Reporte de Incidente Vehicular generado!')

@section('content')

	<div class="row card">
		<div class="col-md-12">
			<h1 class="text-center header-title mb-4 mt-4 text-custom" style="font-size: 25px;">Reporte de Incidente Vehicular C·A·S
			<a href="{{ route('vehicle_status') }}"><i class="fa fa-mail-reply text-info" title="Consultar Nuevamente"></i></a></h1>
		</div>

		<div class="col-md-12 card-body">
			<div class="row">
				<div class="col-md-4 text-center">
					<i class="fa fa-car" style="font-size: 150px; color: {{ $vehicle['color'] }};"></i>

					{{-- Informacion del vehiculo --}}
					<h4>{{ $vehicle['marca'] }} - {{ $vehicle['modelo'] }}</h4>
					<p>
						<strong>Color: </strong>#{{ $vehicle['color'] }} <br>
						<strong>Placa: </strong>{{ $vehicle['numero_placa'] }} <br>
						<strong>Chasis: </strong>{{ $vehicle['numero_chasis'] }} <br>
					</p>

					{{-- Dueños anteriores --}}
					<br>
					<h4 class="text-secondary">Dueños Anteriores:</h4>
					<ul>
					@if($propietario_anterior)
						<li>{{ $vehicle['person']['nombres'] }} {{ $vehicle['person']['apellidos'] }}</li>
					@else
						<li>Este vehículo no ha tenido <br>otro(s) dueño(s).</li>
					@endif
					</ul>
				</div>

				<div class="col-md-7">
					<h3>· Información del Propietario</h3>

					<div class="row">
						<div class="form-group col-md-4">
							<label>Nombres:</label>
							<input class="form-control" type="text" id="nombres" disabled="" readonly=""
                            value="{{ $propietario[0]['person']['nombres'] }}">
						</div>

						<div class="form-group col-md-4">
							<label>Apellidos:</label>
							<input class="form-control" type="text" id="apellidos" disabled="" readonly=""
                            value="{{ $propietario[0]['person']['apellidos'] }}">
						</div>

						<div class="form-group col-md-4">
							<label>Cédula:</label>
							<input class="form-control" type="text" id="cedula" disabled="" readonly=""
                            value="{{ $propietario[0]['person']['cedula'] }}">
						</div>

						<div class="form-group col-md-8">
							<label>Lugar de Residencia:</label>
							<input class="form-control" type="text" id="residencia" disabled="" readonly=""
                            value="{{ $propietario[0]['person']['residencia'] }}">
						</div>
					</div>

					<h3 class="mt-5">· Historial de Accidentes de Tránsito</h3>
					
					<ul>
					@if($vehicle['vehicle_accidents'])
						@foreach($vehicle['vehicle_accidents'] as $accidente)
							<li>Accidente de trásito {{ $accidente['titular'] }} <br>
								<i class="fa fa-calendar text-danger"></i> {{ $accidente['created_at'] }}
							</li>
						@endforeach
					@else
						<li>No hay ningún accidente registrado.</li>
					@endif
					</ul>
					
					<h3 class="mt-5">· Historial de Incidentes</h3>
				</div>

				<div class="col-md-12">
					<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Fecha</th>
                                <th>Status</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($vehicle['vehicle_incidents'] as $incidents)
                            <tr>
                                <td>Este vehículo se reportó como: {{ $incidents['status'] }}</td>
                                <td>En fecha: {{ $incidents['created_at'] }}</td>
                                <td> {{ isset($incidents['encontrado']) ? 'Se encontró el: '.$incidents['encontrado'] : 'Aún no se ha encontrado' }}</td>
                            </tr>
                        @endforeach
                        </tbody>
	                </table>
				</div>
			</div>
		</div>
	</div>

@endsection

@section('styles')
	<link href="{{ asset('admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
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
	
	<script type="text/javascript">
		$('#consultar').click(function() {
			console.log($('#cedula').val());
		});

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
	</script>
@endsection