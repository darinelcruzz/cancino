@extends('lte.root')

@push('pageTitle')
    Prestamos | Facturar
@endpush

@push('headerTitle')
    <a href="{{ route('loans.index') }}" class="btn btn-success btn"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;atras</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <color-box title="Nueva factura a {{ $store->name }}" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'invoices.store']) !!}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::text('folio') !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('date') !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::number('amount', ['step' => '0.01', 'min' => '0', 'v-model' => 'total']) !!}
                            </div>
                        </div>
                        <data-table example="1">
                            {{ drawHeader('ID','Modelo', 'Cantidad', 'Fecha') }}
                            <template slot="body">
                                @foreach ($items as $item)
                                    <tr>
                                        <td>{!! Form::checkboxes('items', [$item->id => $item->id]) !!}</td>
                                        <td>{{ $item->item }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ fdate($item->created_at, 'd-M-Y') }}</td>
                                    </tr>
                                @endforeach
                            </template>
                        </data-table>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="from" value="{{ auth()->user()->store_id }}">
                        <input type="hidden" name="to" value="{{ $store->id }}">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
