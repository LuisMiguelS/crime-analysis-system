<!--- Sidemenu -->
<div id="sidebar-menu">

    <ul class="metismenu" id="side-menu">
        <li class="menu-title">Navegación</li>

        <li>
            <a href="{{ route('dashboard') }}">
                <i class="fi-air-play"></i><span> Dashboard </span>
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
                <li><a href="{{ Route('consulting_incident') }}">Incidentes</a></li>
                <li><a href="{{ route('general_consulting_accidents') }}">Accidentes</a></li>
                <li><a href="{{ route('general_consulting') }}">Crímenes</a></li>
            </ul>
        </li>

        <li class="menu-title">Más</li>

        <li>
            <a href="{{ route('danger_person') }}">
                <i class="fi-bell"></i><span> Notificar Base </span>
            </a>
        </li>

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