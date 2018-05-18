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

        <li>
            <a href="javascript: void(0);"><i class="fi-location-2"></i> <span> Maps </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="maps-google.html">Google Maps</a></li>
                <li><a href="maps-vector.html">Vector Maps</a></li>
                <li><a href="maps-mapael.html">Mapael Maps</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript: void(0);"><i class="fi-paper-stack"></i><span> Pages </span> <span class="menu-arrow"></span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="page-starter.html">Starter Page</a></li>
                <li><a href="page-login.html">Login</a></li>
                <li><a href="page-register.html">Register</a></li>
                <li><a href="page-logout.html">Logout</a></li>
                <li><a href="page-recoverpw.html">Recover Password</a></li>
                <li><a href="page-lock-screen.html">Lock Screen</a></li>
                <li><a href="page-confirm-mail.html">Confirm Mail</a></li>
                <li><a href="page-404.html">Error 404</a></li>
                <li><a href="page-404-alt.html">Error 404-alt</a></li>
                <li><a href="page-500.html">Error 500</a></li>
            </ul>
        </li>

        <li>
            <a href="javascript:void(0);"><i class="fi-marquee-plus"></i><span class="badge badge-success pull-right">Hot</span> <span> Extra Pages </span></a>
            <ul class="nav-second-level" aria-expanded="false">
                <li><a href="extras-timeline.html">Timeline</a></li>
                <li><a href="extras-profile.html">Profile</a></li>
                <li><a href="extras-invoice.html">Invoice</a></li>
                <li><a href="extras-faq.html">FAQ</a></li>
                <li><a href="extras-pricing.html">Pricing</a></li>
                <li><a href="extras-email-template.html">Email Templates</a></li>
                <li><a href="extras-ratings.html">Ratings</a></li>
                <li><a href="extras-search-results.html">Search Results</a></li>
                <li><a href="extras-gallery.html">Gallery</a></li>
                <li><a href="extras-maintenance.html">Maintenance</a></li>
                <li><a href="extras-coming-soon.html">Coming Soon</a></li>
            </ul>
        </li>
    </ul>
</div>