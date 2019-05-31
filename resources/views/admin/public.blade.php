@extends('lte.root')
@push('pageTitle')
    Ventas | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            {!! Form::open(['method' => 'POST', 'route' => ['admin.public', $store]]) !!}

                <div class="row">
                    <div class="col-md-10">
                        {!! Field::month('date', $date, ['label' => 'Seleccione mes', 'tpl' => 'lte/withicon'], ['icon' => 'calendar']) !!}
                    </div>
                    <div class="col-md-2">
                        <label>&nbsp;</label><br>
                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <color-box title="Ventas de {{ fdate($date, 'F Y', 'Y-m') . ' de ' . $store->name }} " color="{{ $store->color }}">
                {!! $chart->container() !!}
            </color-box>

{{--
            <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              @foreach ($charts as $key => $chart)
                  <li class="{{ $loop->iteration == 1 ? 'active': '' }}">
                      <a href="#{{ $key }}" data-toggle="tab">{{ $key }}</a>
                  </li>
              @endforeach
            </ul>
            <div class="tab-content">

                @foreach ($charts as $key => $chart)

                    <div class="tab-pane" id="{{ $key }}">
                        {!! $chart->container() !!}
                    </div>



                @endforeach

            </div>
          </div> --}}

        </div>
    </div>

    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        </div>
    </div>

@endsection

@section('chart')
    {!! $chart->script() !!}
@endsection
