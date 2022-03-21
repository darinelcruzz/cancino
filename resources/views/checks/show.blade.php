@extends('lte.root')

@push('pageTitle', 'Cheques | Gastos')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <color-box title="Cheque # {{ $check->folio }} - {{ fnumber($check->amount) }}" color="primary">
                <data-table example="1">
                    {{ drawHeader('Archivo', 'Ver', 'Importe') }}

                    @php
                        $total = 0;
                    @endphp

                    <template slot="body">
                        @foreach($files as $file)
                            @php
                                $fileArray = explode("___", substr($file, strlen($route) + 1));
                                $total += $fileArray[1] ?? 0;
                            @endphp
                            <tr>
                                <td>{{ $fileArray[0] }}</td>
                                <td>
                                    <a href="{{ Storage::url($file) }}" target="_blank"><i class="fa fa-file-pdf-o"></i></a> &nbsp; &nbsp;
                                    @if (auth()->user()->level ==1)
                                        <a href="{{ route('checks.remove', str_replace('/', '-', $file))}}"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                                <td style="text-align: right;">{{ number_format($fileArray[1] ?? 0, 2) }}</td>
                            </tr>
                        @endforeach
                    </template>

                    <template slot="footer">
                        <tr>
                            <td>
                                <a href="{{ route('checks.print', $check) }}" class="btn btn-primary btn-xs pull-left" target="_blank">
                                    <i class="fa fa-print"></i>&nbsp;&nbsp;&nbsp;IMPRIMIR
                                </a>
                            </td>
                            <th style="text-align: right;"><small>TOTAL</small></th>
                            <td style="text-align: right;">{{ number_format($total, 2) }}</td>
                        </tr>
                        <tr>
                            <td></td>
                            <th style="text-align: right;"><small>DIFERENCIA</small></th>
                            <td style="text-align: right;">{{ number_format($total - $check->amount, 2) }}</td>
                        </tr>
                    </template>
                </data-table>
            </color-box>
        </div>
        <div class="col-md-5">
            <color-box title="Agregar PDFs" color="success" button>
                {!! Form::open(['method' => 'POST', 'route' => ['checks.upload', $check], 'enctype' => 'multipart/form-data']) !!}
                    <file-input></file-input>
                    <input type="hidden" name="route" value="{{ $route }}">
                    <hr>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!}
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            @if($check->bank_account->type == 'gastos')
                <a href="{{ route('checks.index', $check->bank_account->store_id) }}" class="btn btn-danger btn-block btn-sm">
                    <i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;REGRESAR
                </a>
            @else
                <a href="{{ route('terminal.index') }}" class="btn btn-danger btn-block btn-sm">
                    <i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;&nbsp;REGRESAR
                </a>
            @endif
        </div>
    </div>
@endsection
