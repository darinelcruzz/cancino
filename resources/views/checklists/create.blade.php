@extends('lte.root')

@push('pageTitle', 'Checklist | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="Checklist nuevo" color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'checklists.store']) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('store_id', $storesArray, null, ['empty' => 'Seleccione la tienda', 'tpl' => 'lte/withicon'], ['icon' => 'store']) !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('date', date('Y-m-d') ,['tpl' => 'lte/withicon'], ['icon' => 'calendar-week']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::select('checker',
                                    ['Adrian' => 'Adrian', 'Consultor' => 'Consultor', 'Victor' => 'Victor'], null,
                                    ['empty' => 'Seleccione el checador', 'tpl' => 'lte/withicon'], ['icon' => 'map-signs'])
                                !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::text('observations',['tpl' => 'lte/withicon'], ['icon' => 'edit'])
                                !!}
                            </div>
                        </div>

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th> <i class="far fa-check-square"></i> </th>
                                    <th>Reactivo</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="checkbox" name="q1" value="1"></td>
                                    <td>Carpeta de entrenamiento</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q2" value="1"></td>
                                    <td>Información digital</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q3" value="1"></td>
                                    <td>Pizzara de productividad</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q4" value="1"></td>
                                    <td>Análisis de plantillas</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q5" value="1"></td>
                                    <td>Cumplimiento de estándares de venta</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q6" value="1"></td>
                                    <td>Atención y servicio al cliente</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q7" value="1"></td>
                                    <td>Seguimiento a cotizaciones</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q8" value="1"></td>
                                    <td>Aplicación de politicas de garantías</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q9" value="1"></td>
                                    <td>Respaldo y depuración del sistema</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q10" value="1"></td>
                                    <td>Análisis y administración de inventario</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q11" value="1"></td>
                                    <td>Valor mínimo de inventario</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q12" value="1"></td>
                                    <td>Aplicación de inventario físico</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q13" value="1"></td>
                                    <td>Comunicación de información corporativa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q14" value="1"></td>
                                    <td>Cursos gerenciales acreditados</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q15" value="1"></td>
                                    <td>Aprovechamiento de herramientas digitales</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q16" value="1"></td>
                                    <td>Solución a desviaciones de operación</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q17" value="1"></td>
                                    <td>Solución a desviaciones de imagen</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q18" value="1"></td>
                                    <td>Actualización de precios y listas</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q19" value="1"></td>
                                    <td>Efectividad en venta de Steren Card</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q20" value="1"></td>
                                    <td>Efectividad en Extensiones de garantía</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                @if (auth()->user()->level < 4)
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!}
                @endif
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
