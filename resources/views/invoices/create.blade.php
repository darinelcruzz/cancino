@extends('lte.root')

@push('pageTitle')
    Prestamos | Facturar
@endpush

@push('headerTitle')
    <a href="{{ route('loans.index') }}" class="btn btn-success btn"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;atras</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
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
                        <data-table example="2">
                            {{ drawHeader('ID','Modelo', 'Cantidad', 'Fecha') }}
                            <template slot="body">
                                {{-- @foreach ($items as $item)
                                    <tr>
                                        <td>{!! Form::checkboxes('items', [$item->id => $item->id]) !!}</td>
                                        <td>{{ $item->item }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ fdate($item->created_at, 'd-M-Y') }}</td>
                                    </tr>
                                @endforeach --}}
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
        <div class="col-md-4">
            <color-box title="Observaciones" color="danger">
                <p>
                    - Profecionales facturan a precio <b>ESPECIAL</b>. <br>
                    - Shop faturan a precio <b>PÚblico</b> con <b>%15</b> de descuento. <br>
                    - Con uso de CFDI Adquisición de mercancías. <br>
                </p>
                <table class="table">
                    <tbody>
                        <tr>
                            <th colspan="2" style="width:30%">Chiapas</th>
                            <td>3018</td>
                        </tr>
                        <tr>
                            <th colspan="2">Soconusco</th>
                            <td>7873</td>
                        </tr>
                        <tr>
                            <th colspan="2">Altos</th>
                            <td>3030</td>
                        </tr>
                        <tr>
                            <th colspan="2">Gale Tux</th>
                            <td>3480</td>
                        </tr>
                        <tr>
                            <th colspan="2">Gale Tapa</th>
                            <td>0000</td>
                        </tr>
                    </tbody>
                </table>
            </color-box>
        </div>
    </div>
@endsection
