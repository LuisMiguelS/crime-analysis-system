@extends('layouts.admin')

@section('title', 'Perfil Criminal')
@section('subtitle', '¡Perfil criminal generado!')

@section('content')

	<div class="row card">
		<div class="col-md-12">
			<h1 class="text-center header-title mb-4 mt-4 text-custom" style="font-size: 25px;">Perfil Criminal C·A·S</h1>
		</div>

		<div class="col-md-12 card-body">
			<div class="row">
				<div class="col-md-4 text-center">
					<div style="/*background: #484848;*/ width: 250px; height: auto; display: block; margin: 0 auto;">
						<img class="img img-responsive" src="{{ asset('images/1.jfif') }}" width="100%" height="auto">
					</div>

					<h4>Status:</h4>
					<h3 class="text-danger">{{ strtoupper($person->dangerPeople[0]->status) }}</h3>
					<span class="text-muted" style="font-size: 15px;">
						<strong>POR: </strong>{{ strtoupper($person->dangerPeople[0]->titular) }}
					</span>

					<h4 class="mt-4">Condena en Curso:</h4>
					<p>
						Carcel La Vega <br>
						3 año(s) de prisión <br>
						2015-12-01 - {{ $person->recluses[0]->fecha_salida }}
					</p>
				</div>

				<div class="col-md-7">
					<h3>· Información de: {{ ucwords($person->nombres) }}</h3>

					<div class="row">
						<div class="form-group col-md-4">
							<label>Nombres:</label>
							<input class="form-control" type="text" id="nombres" disabled="" readonly="" value="{{ ucwords($person->nombres) }}">
						</div>

						<div class="form-group col-md-4">
							<label>Apellidos:</label>
							<input class="form-control" type="text" id="apellidos" disabled="" readonly="" value="{{ ucwords($person->apellidos) }}">
						</div>

						<div class="form-group col-md-4">
							<label>Fecha de Nacimiento:</label>
							<input class="form-control" type="text" id="fecha_nac" disabled="" readonly="" value="{{ $person->fecha_nac }}">
						</div>

						<div class="form-group col-md-4">
							<label>Edad:</label>
							<input class="form-control" type="text" id="nombres" disabled="" readonly="" value="28">
						</div>

						<div class="form-group col-md-8">
							<label>Lugar de Residencia:</label>
							<input class="form-control" type="text" id="nombres" disabled="" readonly="" value="{{ ucwords($person->residencia) }}">
						</div>
					</div>					

					<h3 class="mt-5">· Historial de Incidentes</h3>
					
					<ul>
						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</li>
						
						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</li>
						
						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</li>

						<li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
						tempor incididunt ut labore et dolore magna aliqua.</li>
					</ul>

					<h3 class="mt-5">· Antecedentes Criminales</h3>
				</div>

				<div class="col-md-12">
					<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Acusado por:</th>
                                <th>Descripción</th>
                                <th>Crimen</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>

                        <tbody>
                        	@foreach($person->crimes as $crime)
	                            <tr>
	                                <td>{{ ucfirst($crime['pivot']->titular) }}</td>
	                                <td>{{ ucfirst($crime['pivot']->descripcion) }}</td>
	                                <td>{{ ucwords($crime->nombre_crimen) }}</td>
	                                <td>{{ $crime['pivot']->created_at }}</td>
	                            </tr>
	                        @endforeach
                        </tbody>
	                </table>
				</div>
			</div>

			{{-- <div>
				<button class="btn btn-info waves-effect" id="imprimir">
					<i class="fa fa-print m-r-5"></i>
					<span>Imprimir</span>
				</button>
			</div> --}}
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