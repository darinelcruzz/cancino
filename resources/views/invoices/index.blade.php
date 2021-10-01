@extends('lte.root')

@push('pageTitle', 'Prestamos | A pagar')

@section('content')
    <div class="row">
        @foreach ($stores as $store)
            <div class="col-md-4">
                <color-box title="{{ $store->name }} debe pagar" color="{{ $store->color }}">
                    <table style="width:100%">
                        <thead>
                            <th><small>TIENDA</small></th>
                            <th style="text-align: center;"><small>CANTIDAD</small></th>
                            <th style="text-align: right;"><small>MONTO</small></th>
                        </thead>
                        <tbody>
                            @foreach ($store->invoices->groupBy('fromr.name') as $name => $invoices)
                                <tr>
                                    <td>{{ $name }}</td>
                                    <td style="text-align: center;">{{ $invoices->count() }}</td>
                                    <td style="text-align: right;">{{ fnumber($invoices->sum('amount')) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </color-box>
            </div>
        @endforeach
    </div>
@endsection
