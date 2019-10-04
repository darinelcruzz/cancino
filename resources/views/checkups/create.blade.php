@extends('lte.root')

@push('pageTitle')
    Arqueo
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

          {!! Form::open(['method' => 'POST', 'route' => 'checkup.store', 'ref' => 'cform']) !!}

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

            </form-wizard>

          {!! Form::close() !!}

        </div>
    </div>

@endsection
