@extends('lte.root')

@push('pageTitle')
    Arqueo | Crear
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

        <color-box title="Arqueo" color="success">
            {!! Form::open(['method' => 'POST', 'name' => 'test', 'route' => 'checkup.store', 'ref' => 'cform']) !!}

                <form-wizard
                    title=""
                    subtitle=""
                    color="#00a65a"
                    @on-complete="submit"
                    back-button-text="Anterior"
                    next-button-text="Siguiente"
                    finish-button-text="Completado">

                <tab-content title="Efectivo" icon="fa fa-money">
                    <cash-checkup></cash-checkup>
                </tab-content>

                <tab-content title="Cheques y transferencias" icon="fa fa-money-check-alt">
                    <transfer-checkup></transfer-checkup>
                </tab-content>

                <tab-content title="Tarjetas" icon="fa fa-credit-card">
                    <cards-checkup></cards-checkup>
                </tab-content>

                <tab-content title="Steren Card" icon="fa fa-gift">
                    <sterencard-checkup></sterencard-checkup>
                </tab-content>

                <tab-content title="Devolución / Cancelación" icon="fa fa-ban">
                    <returns-checkup></returns-checkup>
                </tab-content>

                <tab-content title="Confirmar" icon="fa fa-check-double">
                    <confirm-checkup></confirm-checkup>
                </tab-content>

              </form-wizard>

              <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
              <input type="hidden" name="date_sale" value="{{ date('Y-m-d') }}">
              <input type="hidden" name="store_id" value="{{ auth()->user()->store_id }}">

            {!! Form::close() !!}
          </color-box>

        </div>
    </div>

@endsection
