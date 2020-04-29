<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body>
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h3>Nuevo empleado en: {{ ucfirst($employer->store->social) }}</h3>
			<table class="table table-striped table-bordered">
				<tr>
					<td style="text-align: center;">
						<img src="{{ env('APP_URL') . $employer->photo }}" alt="nuevo colaborador" border="0" width="100px" style="border-radius: 50%;"/>
					</td>
					<td style="width: 70%">
						Ingreso: {{ fdate($employer->ingress, 'd/m/y', 'Y-m-d') }} <br>
					    Nombre:  {{ ucfirst($employer->name) }} <br>
					    Puesto:  {{ ucfirst($employer->job)}} <br>
					    Sueldo:  {{ fnumber($employer->store->salary) }} quincenales <br> <br>
					</td>
				</tr>
			</table>
		</div>
	</div>

</body>
