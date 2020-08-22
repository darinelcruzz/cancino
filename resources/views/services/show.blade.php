@extends('lte.root')

@push('pageTitle', 'Servicios | Detalles')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('services.index') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-angle-double-left"></i>&nbsp;&nbsp;REGRESAR
            </a>
        </div>
    </div>
@endpush

@section('content')

<div class="row">
    <div class="col-md-8">
        
        <color-box title="Lista de pagos a {{ $service->description }} de {{ $service->serviceable->name }}" color="vks">

            <table id="example1" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Método</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($service->payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ fdate($payment->paid_at, 'D, d M Y', 'Y-m-d') }}</td>
                        <td>{{ number_format($payment->amount, 2) }}</td>
                        <td><small>{{ strtoupper($payment->method) }}</small></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </color-box>
    </div>
</div>

@endsection
