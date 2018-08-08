<header class="main-header">

  <!-- Logo -->
  <a href="/inicio" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini">{!! $logoMini !!}</span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg">{!! $logoLg !!}</span>
  </a>

  <!-- Header Navbar -->
  <nav class="navbar navbar-static-top" role="navigation">
    <!-- Sidebar toggle button-->
    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
      <span class="sr-only">Toggle navigation</span>
    </a>
    <!-- Navbar Right Menu -->
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        @if(true)
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <span class="hidden-xs">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-body">
                        <div class="row">
                            <div class="col-md-12">
                                <a href="{{ route('logout') }}" class="btn btn-block"><i class="fa fa-unlock-alt"></i> Cerrar sesión</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </li>
        @endif

      </ul>
    </div>
  </nav>
</header>
