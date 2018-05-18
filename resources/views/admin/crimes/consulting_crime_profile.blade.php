@extends('layouts.admin')

@section('title', 'Consultar Perfil Criminal')
@section('subtitle', 'Consulta el perfil criminal de una persona')

@section('content')
	
	<div class="row">
    	<div class="col-md-12">
        	<div class="card-box">
        		<h4 class="header-title mb-4">INGRESA LA INFORMACIÓN NECESARIA PARA PROSEGUIR</h4>
        		<p class="text-muted font-14 m-b-20">
                    Ingresando el número de cédula o pasaporte del civil en cuestión podrás consultar el perfil criminal de la misma, obteniendo así, todo su histórico criminal con la justicia.
                </p>
	        	
	        	<div class="card-body">
                    {{-- @include('admin.partials.errors') --}}

	                <form method="POST" action="{{ route('see_crime_profile') }}">
                        @csrf

	                    <div class="form-group">
	                        <label for="userName">Cédula o Pasaporte<span class="text-danger"> *</span></label>
	                        <input type="text" name="cedula" parsley-trigger="change" required
	                               placeholder="Ingresa la cédula" class="form-control" id="cedula" autocomplete="off">
	                    </div>

	                    <div class="form-group text-right m-b-0">
	                        <button class="btn btn-custom waves-effect waves-light" type="submit" id="consultar">
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

@section('scripts')
	<script type="text/javascript">
        $(document).ready(function() {
            
            $('#consultar').click(function() {
                window.location = '' + "{{ route('see_crime_profile') }}" + '';;
            });
        });
	</script>
@endsection