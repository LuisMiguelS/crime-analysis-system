<div class="topbar" id="app">
    <nav class="navbar-custom">

        <ul class="list-unstyled topbar-right-menu float-right mb-0">

            <danger-person v-bind:notifications="notifications"></danger-person>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user" data-toggle="dropdown" href="#" role="button"
                   aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('admin/assets/images/users/avatar-1.jpg') }}" alt="user" class="rounded-circle"> <span class="ml-1">{{ Auth::User()->name }} <i class="mdi mdi-chevron-down"></i> </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h6 class="text-overflow m-0">¡Bienvenido!</h6>
                    </div>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fi-head"></i> <span>Mi perfil</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="fi-lock"></i> <span>Bloquear pantalla</span>
                    </a>

                    <!-- item-->
                    <div>
                        <a href="{{ route('logout') }}" class="dropdown-item notify-item"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="fi-power"></i> <span>{{ __('Logout') }}</span>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
            </li>

        </ul>

        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left">
                    <i class="dripicons-menu"></i>
                </button>
            </li>
            <li>
                <div class="page-title-box">
                    <h4 class="page-title">@yield('title') </h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">@yield('subtitle')</li>
                    </ol>
                </div>
            </li>

        </ul>

    </nav>
</div>