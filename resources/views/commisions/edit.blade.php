@extends('lte.root')

@push('pageTitle', 'Metas | Agregar')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Agregar ventas de la semana tal de tal mes de tal año "  color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'commision.update', 'enctype' => 'multipart/form-data']) !!}
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="text-align: left; width: 12%;">NOMBRE</th>
                                    <th style="text-align: center; width: 22%;">VENTA</th>
                                    <th style="text-align: center; width: 11%;">STEREN <BR> CARD</th>
                                    <th style="text-align: center; width: 11%;">AxT</th>
                                    <th style="text-align: center; width: 11%;">EXT</th>
                                    <th style="text-align: center; width: 11%;">VALOR <br> EXTENSIÓN</th>
                                    <th style="text-align: center; width: 11%;">RR</th>
                                    <th style="text-align: center; width: 11%;">FF</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($week as $employer)
                                    <tr>
                                        <th>{{ strtoupper($employer->employer->nickname) }}</th>
                                        <td>
                                            <input class="form-control" type="number" name="sales[{{ $employer->id }}][sale]]" value="{{ $employer->sale ?? 0 }}" step="0.01">
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="sales[{{ $employer->id }}][sterencard]" value="{{ $employer->sterencard ?? 0 }}">
                                        </td>
                                        <td>
                                            <input class="form-control" type="number" name="sales[{{ $employer->id }}][axt]" value="{{ $employer->axt ?? 0 }}" step="0.01" min="0">
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
