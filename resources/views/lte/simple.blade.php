<!DOCTYPE html>
<html lang="es">

@include('lte.htmlhead')

<body class="hold-transition skin-black sidebar-collapse">
    <div id="app">
        <div class="wrapper">
            <header class="main-header">
                <a href="/inicio" class="logo">
                  <span class="logo-mini"><b>Grupo</b> Cancino</span>
                  <span class="logo-lg"><b>Grupo</b> Cancino</span>
                </a>
              <nav class="navbar navbar-static-top" role="navigation">
              </nav>
            </header>

            <div class="content-wrapper">
                <section class="content-header">
                    <h1>@stack('headerTitle')</h1>
                </section>

                <section class="content container-fluid">
                    @yield('content')
                </section>
            </div>

            @include('lte.footer')
        </div>
    </div>
    @yield('chart')
    @include('lte.scripts')

</body>
</html>
