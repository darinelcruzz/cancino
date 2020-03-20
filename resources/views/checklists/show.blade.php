@extends('lte.root')
@push('pageTitle')
    Checklist | Detalles
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="col-md-12">
                    <div class="small-box bg-{{ $checklist->color }}">
                        <div class="inner">
                            <h3 align="center"><b>{{ $checklist->result * 5 }}</b></h3>
                            <h4 align="center">{{ fdate($checklist->date, 'd/M/Y', 'Y-m-d') }}</h4>
                            <h4 align="center">{{ $checklist->checker }}</h4>
                        </div>
                        <div class="icon">
                            <i class="fa fa-tasks"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <body>
                        {{ $checklist->observations }}
                    </body>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <color-box title="{{ $checklist->store->name }}" color="success">
                <div class= "row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> <i class="far fa-check-square"></i> </th>
                                    <th>Reactivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{!! $checklist->q1 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Carpeta de entrenamiento</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q2 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Información digital</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q3 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Pizzara de productividad</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q4 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Análisis de plantillas</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q5 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Cumplimiento de estándares de venta</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q6 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Atención y servicio al cliente</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q7 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Seguimiento a cotizaciones</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q8 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Aplicación de politicas de garantías</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q9 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Respaldo y depuración del sistema</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q10 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Análisis y administración de inventario</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q11 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Valor mínimo de inventario</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q12 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Aplicación de inventario físico</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q13 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Comunicación de información corporativa</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q14 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Cursos gerenciales acreditados</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q15 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Aprovechamiento de herramientas digitales</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q16 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Solución a desviaciones de operación</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q17 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Solución a desviaciones de imagen</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q18 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Actualización de precios y listas</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q19 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Efectividad en venta de Steren Card</td>
                                </tr>
                                <tr>
                                    <td>{!! $checklist->q20 == 0 ?  "<i class='fa fa-times'></i>" : "<i class='fa fa-check'></i>" !!}</td>
                                    <td>Efectividad en Extensiones de garantía</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </color-box>
        </div>
    </div>
@endsection
