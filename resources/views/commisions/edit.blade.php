@extends('lte.root')

@push('pageTitle', 'Metas | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Agregar ventas de la semana tal de tal mes de tal año "  color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'commision.update', 'enctype' => 'multipart/form-data']) !!}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><h4>Nombre</h4></th>
                                    <th style="text-align: center;"><h4>Venta</h4></th>
                                    <th style="text-align: center;"><h4>SterenCard</h4></th>
                                    <th style="text-align: center;"><h4>Extensiones</h4></th>
                                    <th style="text-align: center;"><h4>Valor Ext</h4></th>
                                    <th style="text-align: center;"><h4>Retrasos</h4></th>
                                    <th style="text-align: center;"><h4>Faltas</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($week as $employer)
                                    <tr>
                                        <td>
                                            <h4>{{ $employer->employer->nickname }}</h4>
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="sales[{{ $employer->id }}][sale]]" value="{{ $employer->sale ?? 0 }}" step="0.01">
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="sales[{{ $employer->id }}][sterencard]" value="{{ $employer->sterencard ?? 0 }}">
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="sales[{{ $employer->id }}][extensions]" value="{{ $employer->extensions ?? 0 }}">
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="sales[{{ $employer->id }}][amount_ext]" value="{{ $employer->amount_ext ?? 0 }}" step="0.01">
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="sales[{{ $employer->id }}][delays]" value="{{ $employer->delays ?? 0 }}" step="1">
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="sales[{{ $employer->id }}][absences]" value="{{ $employer->absences ?? 0 }}" step="1">
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success pull-right']) !!}
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
