<!DOCTYPE html>
<html>

    @include('lte.htmlhead')

    <body class="hold-transition skin-blue sidebar-mini">
        <div id="app">
            <div class="wrapper">
                @include('lte.mainheader', ['logoMini' => "<b>G</b>C", 'logoLg' => "<b>Grupo</b> Cancino"])
                @include('lte.sidebar')

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

        @include('lte.scripts')

    </body>
</html>
