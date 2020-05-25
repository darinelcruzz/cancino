@extends('lte.root')

@push('pageTitle')
    Prestamos | Agregar
@endpush

@push('headerTitle')
    <a href="{{ route('loans.index') }}" class="btn btn-success btn"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;atras</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Agregar prestamo" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'loans.store']) !!}
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::select('from', $storesArray, null,
                                ['empty' => 'Seleccione una tienda', 'tpl' => 'lte/withicon'], ['icon' => 'map-pin'])
                            !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('item', ['tpl' => 'lte/withicon'], ['icon' => 'tag']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('quantity', ['tpl' => 'lte/withicon', 'min' => '0'], ['icon' => 'list']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('authorized_by', ['tpl' => 'lte/withicon'], ['icon' => 'check']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::text('received_by', ['tpl' => 'lte/withicon'], ['icon' => 'hands']) !!}
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="to" value="{{ auth()->user()->store_id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <button type="submit" class="btn btn-success pull-right" onclick="submitForm(this);">Agregar</button>

                {!! Form::close() !!}
            </color-box>
        </div>
        <div class="col-md-6">
            <color-box title="Agregados recientemente" color="success">
                <data-table example="1">
                    {{ drawHeader('tienda', 'préstamo', 'modelo', 'cantidad') }}

                    <template slot="body">
                        @foreach($recent_loans as $store => $loans)
                            @foreach($loans as $loan)
                                <tr>
                                    @if ($loop->index == 0)
                                        <td rowspan="{{ count($loans) }}">
                                            {{ $loan->fromr->name }} &nbsp;&nbsp;
                                            <a href="{{ route('loans.print', $loan->to) }}" target="_blank"><i class="fa fa-print"></i></a>
                                        </td>
                                    @endif
                                    <td>{{ $loan->id }}</td>
                                    <td>{{ $loan->item }}</td>
                                    <td>{{ $loan->quantity }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>

@endsection
