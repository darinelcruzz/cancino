@extends('lte.root')

@push('pageTitle', 'Tiendas')

@section('content')

    <div class="row">
    @foreach ($stores as $store)
            <div class="col-lg-4 col-md-6">

                <div class="box box-{{ $store->color }}">
                    <div class="box-header">
                      <h3 class="box-title">{{ $store->name }}</h3>
                    </div>
                    <div class="box-body">
                        @foreach($store->bank_accounts as $bank_account)
                            <a href="{{ route('bank_accounts.show', $bank_account) }}" class="btn btn-{{ $store->id == 1 ? 'github': $store->color }} btn-block btn-sm">
                                {{ strtoupper($bank_account->type) }} | ...{{ substr($bank_account->number, -4) }} 
                                @if($bank_account->pending_movements->count())
                                &nbsp;&nbsp;&nbsp;<small class="badge label-default">{{ $bank_account->pending_movements->count() }}</small>
                                @endif
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
    @endforeach
    </div>

@endsection
