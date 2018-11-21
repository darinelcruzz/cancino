@extends('lte.root')
@push('pageTitle')
    Prestamos | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('loans.index') }}" class="btn btn-info btn"><i class="fa fa-arrow-left"></i>&nbsp;&nbsp;atras</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="{{ $loan->fromr->name . ' ' . $loan->item }}" color="info">
                {!! Form::open(['method' => 'POST', 'route' => 'loans.pay']) !!}
                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th width="25%"><h3>Préstamo</h3></th>
                                <th width="25%"><h3>Pago 1</h3></th>
                                <th width="25%"><h3>Pago 2</h3></th>
                                <th width="25%"><h3>Pago 3</h3></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <h4><B>Fecha:</B></h4><h4>{{ fdate($loan->created_at, 'd/M/y') }}</h4><br>
                                    <h4><B>Cantidad:</B></h4><h4>{{ $loan->quantity }}</h4>
                                </td>
                                <td>
                                    <h4><B>Fecha:</B></h4><h4>{{ fdate($loan->d1, 'd/M/y', 'Y-m-d') }}</h4><br>
                                    <h4><B>Cantidad:</B></h4>
                                    @if ($loan->q1 == 0 && $loan->status != 'facturado' && $loan->status != 'pagado' && $loan->from != auth()->user()->store_id)
                                        {!! Field::number('q1', ['tpl' => 'loans/input', 'min' => '0', 'max' => $loan->rest]) !!}
                                        <input type="hidden" name="d1" value="{{ Date::now()->format('Y-m-d') }}">
                                    @else
                                        <h4>{{ $loan->q1 }}</h4>
                                    @endif
                                </td>
                                <td>
                                    <h4><B>Fecha:</B></h4><h4>{{ fdate($loan->d2, 'd/M/y', 'Y-m-d') }}</h4><br>
                                    <h4><B>Cantidad:</B></h4>
                                    @if ($loan->q1 >= 1 && $loan->q2 == 0 && $loan->status != 'devuelto' && $loan->from != auth()->user()->store_id && $loan->rest != 0)
                                        {!! Field::number('q2', ['tpl' => 'loans/input', 'min' => '0', 'max' => $loan->rest]) !!}
                                        <input type="hidden" name="d2" value="{{ Date::now()->format('Y-m-d') }}">
                                    @else
                                        <h4>{{ $loan->q2 }}</h4>
                                    @endif
                                </td>
                                <td>
                                    <h4><B>Fecha:</B></h4><h4>{{ fdate($loan->d3, 'd/M/y', 'Y-m-d') }}</h4><br>
                                    <h4><B>Cantidad:</B></h4>
                                    @if ($loan->q2 >= 1 && $loan->q3 == 0 && $loan->status != 'devuelto' && $loan->from != auth()->user()->store_id && $loan->rest != 0)
                                        {!! Field::number('q3', ['tpl' => 'loans/input', 'min' => '0', 'max' => $loan->rest]) !!}
                                        <input type="hidden" name="d3" value="{{ Date::now()->format('Y-m-d') }}">
                                    @else
                                        <h4>{{ $loan->q3 }}</h4>
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <input type="hidden" name="id" value="{{ $loan->id }}">
                    <input type="hidden" name="status" value="{{ $loan->status }}">
                    @if ($loan->from != auth()->user()->store_id && $loan->rest != 0)
                        {!! Form::submit('Agregar', ['class' => 'btn btn-info pull-right']) !!}
                    @endif
                {!! Form::close() !!}
            </color-box>
        </div>
        @if ($loan->from != auth()->user()->store_id && $loan->rest != 0 && $loan->status != 'facturado' && $loan->status != 'pagado')
            <div class="col-md-4">
                <color-box title="Facturar" color="primary" button collapsed solid>
                    {!! Form::open(['method' => 'POST', 'route' => 'loans.invoice', 'class' => 'form-horizontal']) !!}
                        {!! Field::number('invoice', ['tpl' => 'lte/oneline'], ['icon' => 'tag']) !!}
                        {!! Field::date('invoice_date', ['tpl' => 'lte/oneline'], ['icon' => 'tag']) !!}
                        <input type="hidden" name="status" value="facturado">
                        <input type="hidden" name="id" value="{{ $loan->id }}">
                        {!! Form::submit('Agregar', ['class' => 'btn btn-primary pull-right']) !!}
                    {!! Form::close() !!}
                </color-box>
            </div>
        @endif
    </div>

@endsection
