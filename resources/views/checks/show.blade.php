@extends('lte.root')

@push('pageTitle', 'Cheques | Gastos')

@section('content')
    <div class="row">
        <div class="col-md-7">
            <color-box title="Cheque # {{ $check->folio }}" color="primary">
                <data-table example="1">
                    {{ drawHeader('Archivo','Ver') }}

                    <template slot="body">
                        @foreach($files as $file)
                            <tr>
                                <td>{{ substr($file, strlen($route) + 1) }}</td>
                                <td>
                                    <a href="{{ Storage::url($file) }}" target="_blank"><i class="fa fa-file-pdf-o"></i></a> &nbsp; &nbsp;
                                    @if (auth()->user()->level ==1)
                                        <a href="{{ route('checks.remove', str_replace('/', '-', $file))}}"><i class="fa fa-trash"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
        <div class="col-md-5">
            <color-box title="Agregar PDFs" color="success" button collapsed>
                {!! Form::open(['method' => 'POST', 'route' => ['checks.upload', $check], 'enctype' => 'multipart/form-data']) !!}
                    <file-input></file-input>
                    <hr>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!}
                    <input type="hidden" name="route" value="{{ $route }}">
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