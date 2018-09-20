@extends('lte.root')
@push('pageTitle')
    Gastos | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-7">
            <color-box title="Cheque # {{ $expense->check }}" color="primary">
                <data-table example="1">
                    {{ drawHeader('Archivo','Ver') }}

                    <template slot="body">
                        @foreach($files as $file)
                            <tr>
                                <td>{{ substr($file, strlen($route) + 1) }}</td>
                                <td><a href="{{ Storage::url($file) }}" target="_blank"><i class="fa fa-file-pdf-o"></i></a></td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
        <div class="col-md-5">
            <color-box title="Agregar PDFs" color="success" button collapsed>
                {!! Form::open(['method' => 'POST', 'route' => 'expenses.update', 'enctype' => 'multipart/form-data']) !!}
                    <file-input></file-input>
                    <hr>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!}
                    <input type="hidden" name="id" value="{{ $expense->id }}">
                    <input type="hidden" name="route" value="{{ $route }}">
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
