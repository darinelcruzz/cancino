@extends('lte.root')

@push('pageTitle', 'Insumos | Transferencia')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Editar transferencia" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => ['supplies.transfers.update', $supply_transfer]]) !!}

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('transferred_from', $supply_transfer->origin->name, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'store']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('transferred_to', $supply_transfer->destination->name, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'truck']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::date('sold_at', $supply_transfer->transferred_at, ['label' => 'Fecha creación', 'tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'calendar']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('obsertvations', $supply_transfer->observations, ['tpl' => 'lte/withicon', 'disabled' => 'true'], ['icon' => 'comments']) !!}
                        </div>
                    </div>

                    <supplies-list model="transfer" :old="{{ $supply_transfer->movements()->with('supply')->get() }}" :editable="true"></supplies-list>

                    <hr>

                    {!! Form::submit('G U A R D A R', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>        
    </div>
@endsection
