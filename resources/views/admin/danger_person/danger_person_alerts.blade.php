@extends('layouts.admin')

@section('title', 'Historial de Alertas')
@section('subtitle', 'Todas las alertas efectuadas de Personas Peligrosas')

@section('content')

<div class="row card">
	<div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title mb-3">todas las alertas de personas peligrosas</h4>
            <div class="table-responsive">
                <table class="table table-hover table-centered m-0">
                    <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Nombre</th>
                        <th>Alerta</th>
                        <th>Status</th>
                        <th>Fecha Emisión</th>
                        <th>Fecha Conclusión</th>
                        <th>Último Informe</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($alerts))
                        @foreach($alerts as $alert)
                            <tr>
                                <td>
                                    <img src="{{ asset('images/'.$alert->person_id.'.jpg') }}" title="contact-img" class="rounded-circle thumb-sm" />
                                </td>

                                <td>
                                    <h5 class="m-0 font-weight-normal">{{ $alert['person']['nombres'] }}</h5>
                                    <p class="mb-0 text-muted"><small>{{ $alert->person->identificacion }}</small></p>
                                </td>

                                <td>{{ $alert['titular'] }}</td>

                                <td>{!! $alert['status_person'] !!}</td>

                                <td>
                                    <i class="mdi mdi-calendar-clock text-danger"></i> {{ $alert['created_at'] }}
                                </td>

                                <td>
                                	@if($alert->atrapado)
                                		<i class="mdi mdi-calendar-clock text-success"></i> {{ $alert->updated_at }}
                                	@else
                                		-
                                	@endif
                                </td>

                                <td>
                                	@if($alert->atrapado)
                                		{!! $alert->fue_atrapado !!}
                                	@else
                                		<form method="POST" action="{{ route('danger_person_found', ['id' => $alert->id]) }}">
                                			@csrf

                                			<button type="submit" class="btn btn-rounded btn-success">
                                				<i class="fa fa-check"></i> Encontrado
                                			</button>
                                		</form>
                                	@endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                    	<tr>
                    		<th colspan="1" class="text-center">No hay alertas registradas.</th>
                    	</tr>
                    @endif
                    </tbody>
                </table>

                <br>
                {{ $alerts->links() }}
            </div>
        </div>
    </div>
</div>

@endsection