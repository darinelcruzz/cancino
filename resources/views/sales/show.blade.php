@extends('lte.root')
@push('pageTitle')
    Ventas | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {!! Form::open(['method' => 'POST', 'route' => 'sales.show']) !!}

                <div class="row">
                    <div class="col-md-10">
                        {!! Field::month('date', $date, ['label' => 'Seleccione mes', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                    </div>
                    <div class="col-md-2">
                        <label>&nbsp;</label><br>
                        <button type="submit" class="btn btn-success btn-sm"><i class="fa fa-search"></i></button>
                    </div>
                </div>

            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <color-box title="Ventas de {{ fdate($date, 'F Y', 'Y-m') }}" color="success">
                <div>
                    {!! $chart->container() !!}
                </div>
                <div>
                    @if ($sumBlack > 0)
                        <div class="col-md-6">
                            <div class="clearfix">
                                <span class="pull-left"><b>Vendido {{ fnumber($total) }}</b></span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-red" style="width: {{ $total * 100 / $sumBlack }}%;"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="clearfix">
                                <span class="pull-left"><b>Negro {{ fnumber($sumBlack) }}</b></span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-black" style="width: {{ ($total - $sumBlack) * 100 / ($sumStar - $sumBlack) }}%;"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="clearfix">
                                <span class="pull-left"><b>Estrella {{ fnumber($sumStar) }}</b></span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-green" style="width: {{ ($total - $sumStar) * 100 / ($sumGolden - $sumStar) }}%;"></div>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="clearfix">
                                <span class="pull-left"><b>Dorada {{ fnumber($sumGolden) }}</b></span>
                            </div>
                            <div class="progress">
                                <div class="progress-bar progress-bar-yellow" style="width: {{ $total - $sumGolden }}%;"></div>
                            </div>
                        </div>
                    @endif
                </div>
            </color-box>
        </div>
    </div>

@endsection

@section('chart')
    {!! $chart->script() !!}
@endsection
