@extends('layouts.admin')

@section('title', 'Reporte de Incidente Vehicular')
@section('subtitle', '¡Reporte de Incidente Vehicular generado!')

@section('content')

	<div class="row card">
		<div class="col-md-12">
			<h1 class="text-center header-title mb-4 mt-4 text-custom" style="font-size: 25px;">Reporte de Incidente Vehicular C·A·S</h1>
		</div>

		<div class="col-md-12 card-body">
			<div class="row">
				<div class="col-md-4 text-center">
					<i class="fa fa-car" style="font-size: 150px; color: purple;"></i>

					<h4>Toyota - Modelo</h4>
					<p>
						Color Morado <br>
						Placa <br>
						VIN <br>
					</p>
				</div>

				<div class="col-md-7">
					<h3>· Información del Propietario</h3>

					<div class="row">
						<div class="form-group col-md-4">
							<label>Nombres:</label>
							<input class="form-control" type="text" id="nombres" disabled="" readonly="" value="Luis">
						</div>

						<div class="form-group col-md-4">
							<label>Apellidos:</label>
							<input class="form-control" type="text" id="apellidos" disabled="" readonly="" value="Miguel">
						</div>

						<div class="form-group col-md-4">
							<label>Cédula:</label>
							<input class="form-control" type="text" id="fecha_nac" disabled="" readonly="" value="34343">
						</div>

						<div class="form-group col-md-8">
							<label>Lugar de Residencia:</label>
							<input class="form-control" type="text" id="nombres" disabled="" readonly="" value="La Vega, Rep. Dom.">
						</div>
					</div>

					<h3 class="mt-5">· Información Adicional del Vehículo</h3>
					
					<ul>
						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</li>
						
						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</li>
						
						<li>Lorem i
						tempor incididunt ut labore et dolore magna aliqua.</li>

						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</li>
					</ul>
					
					<h3 class="mt-5">· Historial de Incidentes</h3>
				</div>

				<div class="col-md-12">
					<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Reportado como:</th>
                                <th>Fecha</th>
                                <th>Encontrado</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>perdido</td>
                                <td>23/12/2018</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>perdido</td>
                                <td>23/12/2018</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>perdido</td>
                                <td>23/12/2018</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>perdido</td>
                                <td>23/12/2018</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>perdido</td>
                                <td>23/12/2018</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>perdido</td>
                                <td>23/12/2018</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>perdido</td>
                                <td>23/12/2018</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>perdido</td>
                                <td>23/12/2018</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>perdido</td>
                                <td>23/12/2018</td>
                                <td>-</td>
                            </tr>
                            <tr>
                                <td>perdido</td>
                                <td>23/12/2018</td>
                                <td>-</td>
                            </tr>
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