@extends('lte.root')

@push('pageTitle', 'Tiendas')

@section('content')

    @foreach ($stores as $store)

        @if($loop->index == 0)
            <div class="row">
        @endif


            <div class="col-md-4">

                <div class="box box-{{ $store->color }}">
                    <div class="box-header">
                      <h3 class="box-title">{{ $store->name }}</h3>
                    </div>
                    <div class="box-body">
                        @foreach($store->bank_accounts as $bank_account)
                            <a href="{{ route('bank_accounts.show', $bank_account) }}" class="btn btn-{{ $store->id == 1 ? 'github': $store->color }} btn-block btn-sm">
                                {{ strtoupper($bank_account->type) }}
                                @if (isAdmin())
                                    <h4>$ {{ number_format($bank_account->balance, 2) }}</h4>
                                @else
                                    |
                                @endif
                                {{ substr($bank_account->number, -4) }}
                                @if($bank_account->pending_movements->count())
                                    &nbsp;&nbsp;&nbsp;<small class="badge label-default">{{ $bank_account->pending_movements->count() }}</small>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

        @if($loop->iteration % 3 == 0)
            </div>
            <div class="row">
        @endif
    @endforeach


    </div>

    @if(isAdmin())
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <a href="{{ route('account_movements.import') }}" class="btn btn-github btn-block btn-sm">
                <i class="fa fa-2x fa-upload"></i>
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.results') }}" class="btn btn-success btn-block btn-sm">
                <i class="fa fa-2x fa-chart-bar"></i>
            </a>
        </div>
    </div>
    @endif

@endsection
