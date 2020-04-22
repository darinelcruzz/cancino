@extends('lte.root')
@push('pageTitle')
    Deudas | Detalles
@endpush

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $debt->employer->name }}</h3>
                <h4><b>Deuda:</b> {{ fnumber($debt->amount) }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Desde:</b> {{ fdate($debt->requested_at, 'd/m/y', 'Y-m-d') }}</h4>
                <h4><b>Resta:</b> {{ fnumber($debt->difference) }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <b>Abonos:</b> {{ fnumber($debt->deposits->sum('amount')) }} </h4>
            </div>
            <div class="icon">
                <i class="fa fa-user"></i>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <color-box title="Abonos" color="danger">
            <data-table example="1">
                {{ drawHeader('ID','fecha', 'método', 'Abono') }}

                <template slot="body">
                    @foreach($debt->deposits as $deposit)
                        <tr>
                            <td>{{ $deposit->id }}</td>
                            <td>{{ fdate($deposit->paid_at, 'd-M-y', 'Y-m-d') }}</td>
                            <td>{{ $deposit->method }}</td>
                            <td>{{ fnumber($deposit->amount) }}</td>
                        </tr>
                    @endforeach
                </template>
            </data-table>
        </solid-box>
    </div>
</div>
@endsection
