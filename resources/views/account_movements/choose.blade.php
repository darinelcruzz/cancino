@extends('lte.root')

@push('pageTitle', 'Cuentas | Tiendas')

@section('content')
    <div class="row">
        @foreach ($stores as $store)
            <div class="col-lg-4 col-md-6">
                <div class="small-box bg-{{ $store->color }}">
                    <div class="inner">
                        <h4><b>{{ $store->name }}</b></h4>
                        <h3 align="center"><b>{{ fnumber(App\Expense::balanceByStore($store->id)) }}</b></h3>
                        <h4 align="center">{{ fdate(App\Expense::lastUpdate($store->id)->date, 'd/M/Y', 'Y-m-d') }}</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-dollar"></i>
                    </div>
                </div>
                <a href="{{ route('account_movements.index', $store)}}" class="btn btn-block btn-{{ $store->color }}">Movimientos</a>
                <br>
            </div>
        @endforeach
    </div>
@endsection
