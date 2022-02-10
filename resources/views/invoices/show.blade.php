@extends('lte.root')
@push('pageTitle')
    Facturas | Articulos
@endpush

@push('headerTitle')
    @if (auth()->user()->store_id > 3)
        <a href="{{ route('loans.index') }}" class="btn btn-success btn"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;Regresar</a><br>
    @endif
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Factura {{ $invoice->folio . ' a ' . $invoice->tor->name }}" color="success" solid>
                <data-table example="1">
                    {{ drawHeader('ID', 'Modelo', 'Cantidad', 'Fecha') }}
                    <template slot="body">
                        @foreach($items as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->item }}</td>
                                <td>{{ $row->quantity }}</td>
                                <td>{{ fdate($row->created_at, 'd/M/y') }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>

        @if (auth()->user()->store_id == 1 && $invoice->pos == NULL)
            <div class="col-md-3">
                <color-box title="POS" color="success" solid>
                    {!! Form::open(['method' => 'POST', 'route' => 'invoices.pos']) !!}
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    {!! Field::number('pos') !!}
                                </div>
                                <div class="col-md-6">
                                    {!! Field::date('pos_at') !!}
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <input type="hidden" name="id" value="{{ $invoice }}">
                            {!! Form::submit('Agregar', ['class' => 'btn btn-success btn-block']) !!}
                        </div>

                    {!! Form::close() !!}
                </color-box>
            </div>
        @endif
    </div>
@endsection
