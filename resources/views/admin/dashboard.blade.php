@extends('layouts.admin')

@section('title', 'Dashboard')
@section('subtitle', '¡Bienvenido al Admin Panel C·A·S!')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">ESTADÍSTICAS DEL AÑO EN CURSO</h4>

            <div class="row text-center">
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box widget-flat border-secondary bg-secondary text-white">
                        <i class="fa fa-car"></i>
                        <h3 class="m-b-10">{{ $cant_accidentes[0]->cant }}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Cantidad de Accidentes Automovilístico</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box bg-warning widget-flat border-warning text-white">
                        <i class="fa fa-warning"></i>
                        <h3 class="m-b-10">{{ $cant_incidentes[0]->cant }}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Cantidad de Incidentes Automovilístico</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box widget-flat border-danger bg-danger text-white">
                        <i class="fa fa-times"></i>
                        <h3 class="m-b-10">{{ $cant_crimenes[0]->cant }}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Cantidad de Crímenes Ocurridos</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box bg-primary widget-flat border-primary text-white">
                        <i class="fa fa-expeditedssl"></i>
                        <h3 class="m-b-10">{{ $cant_reclusos[0]->cant }}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Cantidad de Personas Apresadas </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Graficos estadisticos --}}
<div class="row">
    <div class="col-lg-6">
        <div class="card-box">
            <h4 class="header-title">Estadísticas de Crímenes del año anterior <span class="text-muted">({{ date('Y') - 1 }})</span></h4>
            <canvas id="myChart" height="250"></canvas>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="card-box">
            <h4 class="header-title">Estadísticas de crímenes por tipo de arma del año anterior <span class="text-muted">({{ date('Y') - 1 }})</span> Expresado en %</h4>
            <canvas id="oilChart" height="250"></canvas>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title">Estadísticas de crímenes por localidades del año anterior <span class="text-muted">({{ date('Y') - 1 }})</span></h4>
            <div id="crimenes_ubicacion" height="200"></div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card-box">
            <h4 class="header-title mb-3">Personas apresadas recientemente</h4>
            <div class="table-responsive">
                <table class="table table-hover table-centered m-0">
                    <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Nombre</th>
                        <th>Acusado por:</th>
                        <th>Prisión</th>
                        <th>Sentencia</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($reclusos as $recluso)
                        <tr>
                            <td>
                                <img src="{{ asset('images/'.$recluso->id.'.jpg') }}" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                            </td>

                            <td>
                                <h5 class="m-0 font-weight-normal">{{ $recluso->nombre }}</h5>
                                <p class="mb-0 text-muted"><small>Apresado desde el {{ $recluso->created_at }}</small></p>
                            </td>

                            <td>
                                {{ ucfirst($recluso->titular) }}
                            </td>

                            <td>
                                <i class="mdi mdi-map-marker text-default"></i> {{ $recluso->prision }}
                            </td>

                            <td>
                                <i class="mdi mdi-calendar-clock text-info"></i> {{ $recluso->years }} año(s)
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card-box">
            <h4 class="header-title mb-3">últimas alertas de personas peligrosas</h4>
            <div class="table-responsive">
                <table class="table table-hover table-centered m-0">
                    <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Nombre</th>
                        <th>Alerta</th>
                        <th>Status</th>
                        <th>Fecha Emisión</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($alerts)
                        @foreach($alerts as $alert)
                            <tr>
                                <td>
                                    <img src="{{ asset('images/'.$alert->person_id.'.jpg') }}" title="contact-img" class="rounded-circle thumb-sm" />
                                </td>

                                <td>
                                    <h5 class="m-0 font-weight-normal">{{ $alert['person']['nombres'] }}</h5>
                                    {{-- <p class="mb-0 text-muted"><small>Apresado desde el {{ $recluso->created_at }}</small></p> --}}
                                </td>

                                <td>{{ $alert['titular'] }}</td>

                                <td>{!! $alert['status_person'] !!}</td>

                                <td>
                                    <i class="mdi mdi-calendar-clock text-info"></i> {{ $alert['created_at'] }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Cantidad de prisioneros por año</h4>

            <div id="donut-chart">
                <div id="donut-chart-container" class="flot-chart mt-5" style="height: 340px;">
                    <div class="inbox-widget slimscroll" style="max-height: 370px;">
                        @if($prisioneros_yyear)
                            @foreach($prisioneros_yyear as $prisionero)
                            <a>
                                <div class="inbox-item">
                                    <p class="inbox-item-author">Cant. de Prisioneros: {{ $prisionero->cant }}</p>
                                    <p class="inbox-item-text"><i class="fa fa-calendar text-success"></i> {{ $prisionero->yyear }}</p>
                                    <p class="inbox-item-date">C·A·S</p>
                                </div>
                            </a>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@stop


@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/css/c3.min.css') }}">
@endsection


@section('scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/d3.v5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('admin/assets/js/c3.min.js') }}"></script>

    <script>
        {{-- Configuraciones globales --}}
        Chart.defaults.global.defaultFontFamily = "Arial Narrow";
        Chart.defaults.global.defaultFontSize = 15;


        {{-- Grafico de barras --}}
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    <?php
                        foreach ($crimenes as $crimen)
                        {
                            echo "'$crimen->crimen',";
                        }
                    ?>
                ],
                datasets: [{
                    data: [
                        <?php
                            foreach ($crimenes as $crimen)
                            {
                                echo "'$crimen->total',";
                            }
                        ?>
                    ],
                    backgroundColor: [
                        '#263238',
                        '#BF360C',
                        '#0D47A1',
                        '#004D40'
                    ],
                    borderColor: [
                        '#263238',
                        '#BF360C',
                        '#0D47A1',
                        '#004D40'
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
                    text: 'Cantidad de Crímenes'
                },

                legend: {
                    display: false
                }
            }
        });

        
        {{-- Grafico de pie --}}
        var oilCanvas = document.getElementById("oilChart");

        var oilData = {
            labels: [
                <?php
                    foreach ($crimenes_arma as $crimen)
                    {
                        echo "'$crimen->arma',";
                    }
                ?>
            ],
            datasets: [
                {
                    data: [
                        <?php
                            foreach ($crimenes_arma as $crimen)
                            {
                                echo "'$crimen->total',";
                            }
                        ?>
                    ],
                    backgroundColor: [
                        "#880E4F",
                        "#00B8D4",
                        "#FFAB00",
                        "#3E2723",
                        "#b71c1c"
                    ]
                }]
        };

        var pieChart = new Chart(oilCanvas, {
            type: 'pie',
            data: oilData
        });


        {{-- Grafico de barras crimenes-ubicacion --}}
        var chart = c3.generate({
            bindto: '#crimenes_ubicacion',
            data: {
                x: 'x',
                columns: [
                ['x', 
                    <?php
                        foreach ($crimenes_ubicacion as $crimen)
                        {
                            echo "'$crimen->ubicacion',";
                        }
                    ?>
                ],
                ['Cant. de crímenes:', 
                    <?php
                        foreach ($crimenes_ubicacion as $crimen)
                        {
                            echo "'$crimen->total',";
                        }
                    ?>
                ],
              ],
              // type: 'bar'
            },
            /*bar: {
                width: {
                    ratio: 0.5 // this makes bar width 50% of length between ticks
                }
                // or
                //width: 100 // this makes bar width 100px
            },
            type: 'bar',*/
            axis: {
                x: {
                    type: 'category'
                }
            }
        });
    </script>
@endsection