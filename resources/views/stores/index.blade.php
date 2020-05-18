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
                                {{ strtoupper($bank_account->type) }} | ...{{ substr($bank_account->number, -4) }} 
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

@endsection
