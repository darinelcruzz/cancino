@extends('lte.root')

@push('pageTitle')
    Arqueo | Editar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

        <color-box title="Arqueo" color="success">
            {!! Form::open(['method' => 'POST', 'name' => 'test', 'route' => ['checkup.update', $checkup], 'ref' => 'cform']) !!}

                <form-wizard
                    title=""
                    subtitle=""
                    color="#00a65a"
                    @on-complete="submit"
                    back-button-text="Anterior"
                    next-button-text="Siguiente"
                    finish-button-text="Completado">

                <tab-content title="Efectivo" icon="fa fa-money">
                    <cash-checkup :stored="{{ $checkup->toJson() }}"></cash-checkup>
                </tab-content>

                <tab-content title="Cheques y transferencias" icon="fa fa-money-check-alt">
                    <transfer-checkup :stored="{{ $checkup->toJson() }}"></transfer-checkup>
                </tab-content>

                <tab-content title="Tarjetas" icon="fa fa-credit-card">
                    <cards-checkup :stored="{{ $checkup->toJson() }}"></cards-checkup>
                </tab-content>

                @if (auth()->user()->store_id <= 3)
                    <tab-content title="Crédito" icon="fa fa-file-invoice">
                        <credit-checkup :stored="{{ $checkup->toJson() }}" :store="{{ getStore()->id }}"></credit-checkup>
                    </tab-content>

                    <tab-content title="Pago en línea" icon="fa fa-wifi">
                        <online-checkup :stored="{{ $checkup->toJson() }}"></online-checkup>
                    </tab-content>
                @endif

                <tab-content title="Steren Card" icon="fa fa-gift">
                    <sterencard-checkup :stored="{{ $checkup->toJson() }}"></sterencard-checkup>
                </tab-content>

                <tab-content title="Devolución / Cancelación" icon="fa fa-ban">
                    <returns-checkup :stored="{{ $checkup->toJson() }}"></returns-checkup>
                </tab-content>

                @if (auth()->user()->level==1)
                    <tab-content title="Confirmar" icon="fa fa-check-double">
                        <confirm-checkup :stored="{{ $checkup->sale->public }}"></confirm-checkup>
                    </tab-content>
                @endif

              </form-wizard>

            {!! Form::close() !!}
          </color-box>

        </div>
    </div>

@endsection
