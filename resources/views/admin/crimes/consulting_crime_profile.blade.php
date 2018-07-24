@extends('layouts.admin')

@section('title', 'Consultar Perfil Criminal')
@section('subtitle', 'Consulta el perfil criminal de una persona')

@section('content')
	
	<div class="row">
    	<div class="col-md-12">
        	<div class="card-box">
        		<h4 class="header-title mb-4">INGRESA LA INFORMACIÓN NECESARIA PARA PROSEGUIR</h4>
        		<p class="text-muted font-14 m-b-20">
                    Ingresando el número de cédula del civil en cuestión podrás consultar el perfil criminal del mismo, obteniendo así, todo su histórico criminal con la justicia.
                </p>
	        	
	        	<div class="card-body">
                    {{-- @include('admin.partials.errors') --}}

	                <form method="POST" action="{{ route('see_crime_profile') }}">
                        @csrf

                        <div class="form-group col-md-12">
							<label>Busca la persona para emitir la alerta</label>
				            <select name="cedula" id="cedula" class="select2 form-control">
				                <option value="0">Selecciona una persona para continuar...</option>
				                <optgroup label="* No. de Cédula: Nombre(s) y Apellido(s) *">
				                    @foreach($people as $person)
				                    	<option value="{{ $person->id }}">
				                    		{{ $person->identificacion }}: {{ $person->nombres }} {{ $person->apellidos }}
				                    	</option>
				                    @endforeach
				                </optgroup>
				            </select>
						</div>

	                    {{-- <div class="form-group">
	                        <label for="userName">Cédula o Pasaporte<span class="text-danger"> *</span></label>
	                        <input type="text" name="cedula" parsley-trigger="change" required
	                               placeholder="Ingresa la cédula" class="form-control" id="cedula" autocomplete="off">
	                    </div> --}}

	                    <div class="form-group text-right m-b-0">
	                        <button class="btn btn-custom waves-effect waves-light" type="button" id="consultar">
	                            <i class="fa fa-search m-r-5"></i>
	                            <span>Consultar</span>
	                        </button>
	                    </div>
	                </form>
	            </div>
        	</div>
        </div>
    </div>

@endsection

@section('styles')
	<link rel="stylesheet" type="text/css" href="{{ asset('admin/plugins/select2/css/select2.min.css') }}">
@endsection

@section('scripts')
	<script type="text/javascript" src="{{ asset('admin/plugins/select2/js/select2.min.js') }}"></script>
	<script type="text/javascript">
		jQuery(document).ready(function () {
		    $(".select2").select2();

		    $('#consultar').click(function () {

				var cedula = $('#cedula').val();

				if(cedula == 0)
				{
					dangerAlert('¡Oh, espera!', 'Debes seleccionar una persona para proseguir con la alerta.');
					return 0;
				}

				else
				{
					$('form').submit();
				}
			});
		});
	</script>
@endsection