<modal id="{{ $stores->where('store_id', $store_id)->pluck('id')->pop() }}" title="Deposito de {{ fnumber($stores->where('store_id', $store_id)->pluck('cash')->pop()) }}">
    {!! Form::open(['method' => 'POST', 'route' => 'sales.deposit']) !!}
        <div class="row">
            <div class="col-md-6">
                {!! Field::text('observations', ['tpl' => 'lte/withicon'], ['icon' => 'money']) !!}
            </div>
            <div class="col-md-6">
                {!! Field::date('date_deposit', date('Y-m-d'), ['tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <b>Dif Efectivo =</b> ${{ $stores->where('store_id', $store_id)->pluck('checkup')->pluck('cash_sums')->pluck('d')->pop() }}<br>
                <b>Dif Tarjetas =</b> ${{ $stores->where('store_id', $store_id)->pluck('checkup')->pluck('card_sums')->pluck('d')->pop() }}
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                {!! Form::submit('Depositado', ['class' => 'btn btn-success pull-right']) !!}
            </div>
            <input type="hidden" name="status" value="depositado">
            <input type="hidden" name="id" value="{{ $stores->where('store_id', $store_id)->pluck('id')->pop() }}">
        </div>

    {!! Form::close() !!}
</modal>
