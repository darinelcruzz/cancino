@extends('lte.root')

@push('pageTitle', 'Checklist | Editar')

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="Editar evaluación" color="success">
                {!! Form::open(['method' => 'POST', 'route' => ['checklists.update', $checklist]]) !!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                {!! Field::text('store_id', $checklist->store->name, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'store']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('date', $checklist->date ,['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'calendar-week']) !!}
                            </div>
                            <div class="col-md-4">
                                {!! Field::text('checker', $checklist->checker, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'map-signs'])
                                !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {!! Field::text('observations', $checklist->observations, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'edit'])
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
                                    <td><input type="checkbox" name="q1" value="1" {{ $checklist->q1 == 1 ? 'checked': '' }}></td>
                                    <td>Carpeta de entrenamiento</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q2" value="1" {{ $checklist->q2 == 1 ? 'checked': '' }}></td>
                                    <td>Información digital</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q3" value="1" {{ $checklist->q3 == 1 ? 'checked': '' }}></td>
                                    <td>Pizzara de productividad</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q4" value="1" {{ $checklist->q4 == 1 ? 'checked': '' }}></td>
                                    <td>Análisis de plantillas</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q5" value="1" {{ $checklist->q5 == 1 ? 'checked': '' }}></td>
                                    <td>Cumplimiento de estándares de venta</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q6" value="1" {{ $checklist->q6 == 1 ? 'checked': '' }}></td>
                                    <td>Atención y servicio al cliente</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q7" value="1" {{ $checklist->q7 == 1 ? 'checked': '' }}></td>
                                    <td>Seguimiento a cotizaciones</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q8" value="1" {{ $checklist->q8 == 1 ? 'checked': '' }}></td>
                                    <td>Aplicación de politicas de garantías</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q9" value="1" {{ $checklist->q9 == 1 ? 'checked': '' }}></td>
                                    <td>Respaldo y depuración del sistema</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q10" value="1" {{ $checklist->q10 == 1 ? 'checked': '' }}></td>
                                    <td>Análisis y administración de inventario</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q11" value="1" {{ $checklist->q11 == 1 ? 'checked': '' }}></td>
                                    <td>Valor mínimo de inventario</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q12" value="1" {{ $checklist->q12 == 1 ? 'checked': '' }}></td>
                                    <td>Aplicación de inventario físico</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q13" value="1" {{ $checklist->q13 == 1 ? 'checked': '' }}></td>
                                    <td>Comunicación de información corporativa</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q14" value="1" {{ $checklist->q14 == 1 ? 'checked': '' }}></td>
                                    <td>Cursos gerenciales acreditados</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q15" value="1" {{ $checklist->q15 == 1 ? 'checked': '' }}></td>
                                    <td>Aprovechamiento de herramientas digitales</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q16" value="1" {{ $checklist->q16 == 1 ? 'checked': '' }}></td>
                                    <td>Solución a desviaciones de operación</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q17" value="1" {{ $checklist->q17 == 1 ? 'checked': '' }}></td>
                                    <td>Solución a desviaciones de imagen</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q18" value="1" {{ $checklist->q18 == 1 ? 'checked': '' }}></td>
                                    <td>Actualización de precios y listas</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q19" value="1" {{ $checklist->q19 == 1 ? 'checked': '' }}></td>
                                    <td>Efectividad en venta de Steren Card</td>
                                </tr>
                                <tr>
                                    <td><input type="checkbox" name="q20" value="1" {{ $checklist->q20 == 1 ? 'checked': '' }}></td>
                                    <td>Efectividad en Extensiones de garantía</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr>
                @if (auth()->user()->level < 4)
                    {!! Form::submit('Guardar cambios', ['class' => 'btn btn-success btn-block']) !!}
                @endif
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
