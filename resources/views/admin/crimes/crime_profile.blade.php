@extends('layouts.admin')

@section('title', 'Perfil Criminal')
@section('subtitle', '¡Perfil criminal generado!')

@section('content')

	<div class="row card">
		<div class="col-md-12">
			<h1 class="text-center header-title mb-4 mt-4 text-custom" style="font-size: 25px;">Perfil Criminal C·A·S
				<a href="{{ route('crime_profile') }}"><i class="fa fa-mail-reply text-info" title="Consultar Nuevamente"></i></a></h1>
			</h1>
		</div>

		<div class="col-md-12 card-body">
			<div class="row">
				<div class="col-md-4 text-center">
					<div class="criminal_profile">
						<img class="img img-responsive" src="{{ asset('images/'.$person->id.'.jpg') }}" width="100%" height="auto">
					</div>

					<h4>Status:</h4>
					@if(isset($person->dangerPeople[0]))
						<h3 class="text-danger">{!! strtoupper($person->dangerPeople[0]->status) !!}</h3>
						<span class="text-muted" style="font-size: 15px;">
							<strong>POR: </strong>{{ strtoupper($person->dangerPeople[0]->titular) }}
						</span>
					@else
						<h3 class="text-success">SIN ALERTA</h3>
					@endif

					<h4 class="mt-4">Última Condena: {!! $ultima_condena->status_carcel !!}</h4>
					@if(isset($prision))
						<p>
							<i class="mdi mdi-map-marker text-default"></i> {{ $prision->nombre_prision }} - {{ $prision->direccion }}<br>
							<i class="mdi mdi-calendar-clock text-danger"></i> {{ $ultima_condena->years }} año(s) de prisión <br>
							<i class="mdi mdi-timer-sand text-primary"></i> [{{ $ultima_condena->created_at }}] - [{{ $ultima_condena->fecha_salida }}]
						</p>
					@else
						<p>Ninguna</p>
					@endif
				</div>

				<div class="col-md-7">
					<h3>· Información Básica de: {{ $person->nombres }}</h3>

					<div class="row">
						<div class="form-group col-md-4">
							<label>Nombres:</label>
							<input class="form-control" type="text" id="nombres" disabled="" readonly="" value="{{ $person->nombres }}">
						</div>

						<div class="form-group col-md-4">
							<label>Apellidos:</label>
							<input class="form-control" type="text" id="apellidos" disabled="" readonly="" value="{{ $person->apellidos }}">
						</div>

						<div class="form-group col-md-4">
							<label>Alías:</label>
							<input class="form-control" type="text" id="alias" disabled="" readonly="" value="{{ $person->alias }}">
						</div>

						<div class="form-group col-md-3">
							<label>Cédula:</label>
							<input class="form-control" type="text" id="cedula" disabled="" readonly="" value="{{ $person->identificacion }}">
						</div>

						<div class="form-group col-md-3">
							<label>Fecha de Nac.:</label>
							<input class="form-control" type="text" id="fecha_nac" disabled="" readonly="" value="{{ $person->fecha_nac }}">
						</div>

						<div class="form-group col-md-3">
							<label>Edad:</label>
							<input class="form-control" type="text" id="edad" disabled="" readonly="" value="{{ $person->edad }}">
						</div>

						<div class="form-group col-md-3">
							<label>Sexo:</label>
							<input class="form-control" type="text" id="sexo" disabled="" readonly="" value="{{ $person->sexo }}">
						</div>

						<div class="form-group col-md-4">
							<label>Estado Civil:</label>
							<input class="form-control" type="text" id="estado_civil" disabled="" readonly="" value="{{ $person->estado_civil }}">
						</div>

						<div class="form-group col-md-6">
							<label>Lugar de Residencia:</label>
							<input class="form-control" type="text" id="residencia" disabled="" readonly="" value="{{ $person->residencia }}">
						</div>
					</div>					

					<h3 class="mt-5">· Historial de Condenas</h3>
					
					<ul>
						@if(isset($prision))
							@foreach($person->recluses as $recluse)
								<li>
									{{ $recluse->titular }} el <strong>{{ $recluse->created_at }}</strong> con una condena de <strong>{{ $recluse->years }} año(s)</strong>.

									{{-- imprime cuando el prisionero salio de prision --}}
									@if($recluse->status == 'e' or $recluse->status == 'c')
										El recluso salió de prisión el <strong>{{ $recluse->fecha_salida }}</strong>.
									@endif
								</li>
							@endforeach
						@else
							<li>Ningún historial de prisión.</li>
						@endif
					</ul>

					<h3 class="mt-5">· Antecedentes Criminales</h3>
				</div>

				<div class="col-md-12">
					<table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Titular:</th>
                                <th>Descripción</th>
                                <th>Crimen</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>

                        <tbody>
                        	@foreach($person->crimes as $crime)
	                            <tr>
	                                <td>Acusado(a) por: {{ ucfirst($crime['pivot']->titular) }}</td>
	                                <td>{{ ucfirst($crime['pivot']->descripcion) }}</td>
	                                <td>{{ ucwords($crime->nombre_crimen) }}</td>
	                                <td>{{ $crime['pivot']->created_at }}</td>
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

    <style type="text/css">
    	.criminal_profile
    	{
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			border: solid 2px #02c0ce;
			width: 250px;
			height: auto;
			display: block;
			margin: 0 auto;"
    	}
    </style>
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