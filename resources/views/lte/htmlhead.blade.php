<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
      @stack('pageTitle')
  </title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/Ionicons/css/ionicons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/AdminLTE.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/skins/_all-skins.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <link rel="icon" href="{{ asset('/img/logo.ico')}}" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script src="https://unpkg.com/vue-select@latest"></script>
  <link rel="stylesheet" href="https://unpkg.com/vue-select@latest/dist/vue-select.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>

    <style>
        #login-background {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: url(../../../img/background.jpg);
            background-size: cover;
        }

        .login-box-body {
            border-radius: 20px;
            opacity: 0.88;
        }
    </style>
</head>
