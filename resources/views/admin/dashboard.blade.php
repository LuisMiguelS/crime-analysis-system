@extends('layouts.admin')

@section('title', 'Dashboard')
@section('subtitle', 'Bienvenido al Admin Panel C·A·S !')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card-box">
            <h4 class="header-title mb-4">ESTADÍSTICAS DEL AÑO EN CURSO</h4>

            <div class="row text-center">
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box widget-flat border-secondary bg-secondary text-white">
                        <i class="fa fa-car"></i>
                        <h3 class="m-b-10">{{ $cant_accidentes }}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Cantidad de Accidentes Automovilisticos</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-6 col-xl-3">
                    <div class="card-box bg-warning widget-flat border-warning text-white">
                        <i class="fa fa-warning"></i>
                        <h3 class="m-b-10">{{ $cant_incidentes }}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Cantidad de Incidentes Automovilisticos </p>
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
                        <h3 class="m-b-10">{{ $cant_reclusos }}</h3>
                        <p class="text-uppercase m-b-5 font-13 font-600">Cantidad de Personas Apresadas </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="row">
    <div class="col-lg-6">
        <div class="card-box">
            <h4 class="header-title">Order Overview</h4>

            <div id="website-stats" style="height: 350px;" class="flot-chart mt-5"></div>

        </div>
    </div>

    <div class="col-lg-6">
        <div class="card-box">
            <h4 class="header-title">Sales Overview</h4>

            <div id="combine-chart">
                <div id="combine-chart-container" class="flot-chart mt-5" style="height: 350px;">
                </div>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div id="app">
        <!-- <example-component></example-component> -->
    </div>
    <div class="col-lg-8">


        <div class="card-box">
            <h4 class="header-title mb-3">Wallet Balances</h4>

            <div class="table-responsive">
                <table class="table table-hover table-centered m-0">

                    <thead>
                    <tr>
                        <th>Profile</th>
                        <th>Name</th>
                        <th>Currency</th>
                        <th>Balance</th>
                        <th>Reserved in orders</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <img src="{{ asset('admin/assets/images/users/avatar-2.jpg') }}" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Tomaslau</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-btc text-primary"></i> BTC
                        </td>

                        <td>
                            0.00816117 BTC
                        </td>

                        <td>
                            0.00097036 BTC
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-minus"></i></a>
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <img src="{{ asset('admin/assets/images/users/avatar-3.jpg') }}" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Erwin E. Brown</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-eth text-primary"></i> ETH
                        </td>

                        <td>
                            3.16117008 ETH
                        </td>

                        <td>
                            1.70360009 ETH
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-minus"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('admin/assets/images/users/avatar-4.jpg') }}" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Margeret V. Ligon</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-eur text-primary"></i> EUR
                        </td>

                        <td>
                            25.08 EUR
                        </td>

                        <td>
                            12.58 EUR
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-minus"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('admin/assets/images/users/avatar-5.jpg') }}" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Jose D. Delacruz</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-cny text-primary"></i> CNY
                        </td>

                        <td>
                            82.00 CNY
                        </td>

                        <td>
                            30.83 CNY
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-minus"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="{{ asset('admin/assets/images/users/avatar-6.jpg') }}" alt="contact-img" title="contact-img" class="rounded-circle thumb-sm" />
                        </td>

                        <td>
                            <h5 class="m-0 font-weight-normal">Luke J. Sain</h5>
                            <p class="mb-0 text-muted"><small>Member Since 2017</small></p>
                        </td>

                        <td>
                            <i class="mdi mdi-currency-btc text-primary"></i> BTC
                        </td>

                        <td>
                            2.00816117 BTC
                        </td>

                        <td>
                            1.00097036 BTC
                        </td>

                        <td>
                            <a href="#" class="btn btn-sm btn-custom"><i class="mdi mdi-plus"></i></a>
                            <a href="#" class="btn btn-sm btn-danger"><i class="mdi mdi-minus"></i></a>
                        </td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div class="col-lg-4">
        <div class="card-box">
            <h4 class="m-t-0 header-title">Total Wallet Balance</h4>


            <div id="donut-chart">
                <div id="donut-chart-container" class="flot-chart mt-5" style="height: 340px;">
                </div>
            </div>

        </div>

    </div>
</div> --}}
    
@stop