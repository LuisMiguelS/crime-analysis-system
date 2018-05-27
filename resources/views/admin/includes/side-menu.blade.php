<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">

        <!--<li class="menu-title">Navigation</li>-->

        <li>
            <a href="{{ route('dashboard') }}">
                <i class="fi-air-play"></i><span class="badge badge-danger badge-pill pull-right">7</span> <span> Dashboard </span>
            </a>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="fi-layers"></i> <span> Consultar </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="{{ route('crime_profile') }}">Perfil Criminal</a></li>
                <li><a href="{{ route('vehicle_status') }}">Placa Automóvil</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="fi-bar-graph-2"></i><span> Reportes </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="#">Incidentes</a></li>
                <li><a href="#">Accidentes</a></li>
                <li><a href="#">Crímenes</a></li>
                <li><a href="#">Prisioneros</a></li>
                <li><a href="#">Prisiones</a></li>
            </ul>
        </li>

        <li class="menu-title">More</li>

        {{-- <li>
            <a href="javascript: void(0);"><i class="fi-location-2"></i> <span> Maps </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="maps-google.html">Google Maps</a></li>
                <li><a href="maps-vector.html">Vector Maps</a></li>
                <li><a href="maps-mapael.html">Mapael Maps</a></li>
            </ul>
        </li> --}}
    </ul>
</div>