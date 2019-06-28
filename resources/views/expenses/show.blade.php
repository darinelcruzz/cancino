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
                                <td>
                                    <a type="button" data-toggle="modal" data-target="#factura{{ $loop->index }}">
                                        <i class="fa fa-file-pdf-o"></i>
                                    </a> &nbsp;&nbsp;
                                    @if (auth()->user()->level ==1)
                                        <a href="{{ route('expenses.deleteFile', str_replace('/', '-', $file))}}"><i class="fa fa-trash"></i></a>
                                    @endif

                                    <modal id="factura{{ $loop->index }}" title="Factura">
                                        <iframe src="{{ Storage::url($file) }}#view=FitH" width="100%" height="600"></iframe>
                                    </modal>
                                </td>
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
