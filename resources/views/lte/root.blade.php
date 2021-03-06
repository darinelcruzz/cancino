<!DOCTYPE html>
<html>

    @include('lte.htmlhead')

    <body class="hold-transition skin-vks sidebar-mini">
        <div id="app">
            <div class="wrapper">
                @include('lte.mainheader', ['logoMini' => "<b>VKS</b>", 'logoLg' => "<b>V K S</b>"])
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
        @yield('chart')
        @include('lte.scripts')

    </body>
</html>
