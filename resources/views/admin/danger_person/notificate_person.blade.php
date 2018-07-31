@extends('layouts.admin')

@section('title', 'Notificar Persona Peligrosa')
@section('subtitle', '¡Notifica a toda la base central de la Policía Nacional sobre cualquier incoveniente de urgencia!')

@section('content')

<div class="row">
	<div class="col-md-12">
		<div class="card-box">
			<h4 class="header-title mb-4">REGISTRA UNA NUEVA ALERTA PARA LA BASE CENTRAL DE LA POLICÍA NACIONAL</h4>

			<div class="card-body">
				<form action="{{ route('save_notification') }}" method="POST">
					@csrf

					<div class="row">
						<div class="form-group col-md-12">
							<label>Busca la Persona Para Emitir la Alerta</label>
				            <select name="person_id" id="person_id" class="select2 form-control">
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

						<div class="form-group col-md-6">
							<label>Titular de la Alerta</label>
							<input class="form-control" type="text" name="titular" id="titular" autocomplete="off">
						</div>

						<div class="form-group col-md-6">
							<label>Status de la Persona</label>
							<select name="status" id="status" class="form-control">
								<option value="buscado">Buscado</option>
								<option value="desaparecido">Desaparecido</option>
							</select>
						</div>

						<div class="form-group col-md-12">
							<button class="btn btn-success btn-block waves-effect waves-light" type="button" id="registrar">
			                    <i class="fa fa-pencil m-r-5"></i>
			                    <span>Registrar</span>
			                </button>
			            </div>
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

	    $('#registrar').click(function () {

			var titular = $('#titular').val();
			var person_id = $('#person_id').val();

			if(!titular.length)
			{
				dangerAlert('¡Oh, espera!', 'Debes ingresar un titular para proseguir con la alerta.');
				return 0;
			}

			else if(person_id == 0)
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