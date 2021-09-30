@extends('lte.root')

@push('pageTitle')
    Prestamos | A pagar
@endpush

@section('content')
    <div class="row">
        @foreach ($stores as $store)
            <div class="col-md-4">
                <color-box title="{{ $store->name }} debe pagar" color="{{ $store->color }}">
                    <table style="width:100%">
                        <thead>
                            <th>Tienda</th>
                            <th>Monto</th>
                        </thead>
                        <tbody>
                            @foreach ($invoiced->where('to', $store->id) as $toPay)
                                <tr>
                                    <td>{{ $toPay->fromr->name }}</td>
                                    <td>{{ fnumber($toPay->amount) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </color-box>
            </div>
        @endforeach
    </div>
@endsection
