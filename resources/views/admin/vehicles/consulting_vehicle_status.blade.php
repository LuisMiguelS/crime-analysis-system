@extends('layouts.admin')

@section('title', 'Consultar Status Vehículo')
@section('subtitle', 'Consulta el perfil criminal de una persona')

@section('content')
	
	<div class="row">
    	<div class="col-md-12">
        	<div class="card-box">
        		<h4 class="header-title mb-4">INGRESA LA INFORMACIÓN NECESARIA PARA PROSEGUIR</h4>
        		<p class="text-muted font-14 m-b-20">
                    Ingresando el número de la placa del vehículo en cuestión, podrás consultar el status y el historial con todos los incidentes sucedidos (si aplica) a dicho vehículo.
                </p>
	        	
	        	<div class="card-body">
	                <form>
                        @csrf

	                    <div class="form-group">
	                        <label for="userName">Número de Placa<span class="text-danger"> *</span></label>
	                        <input type="text" name="placa" parsley-trigger="change" required
	                               placeholder="Ingresa el número de placa" class="form-control" id="placa" autocomplete="off">
	                    </div>

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

@section('scripts')

	<script type="text/javascript">
        $(document).ready(function() {
			
            $('#consultar').click(function() {

                var numero_placa = $('#placa').val();

                if(!numero_placa.length)
                {
                	$.toast({
				        heading: '¡Oh, espera!',
				        text: 'Debes ingresar un número de placa para proseguir.',
				        position: 'top-right',
				        loaderBg: '#bf441d',
				        icon: 'error',
				        hideAfter: 7000,
				        stack: 1
				    });
                }

                else
                {
                	$.ajax({
			            type: 'POST',
			            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
			            url: '{{ route('see_vehicle_status') }}',
			            data: { 'placa': numero_placa },
			            success: function( response ) {
			                console.log(response);
			            }
			        });
                }
            });
        });
	</script>
@endsection