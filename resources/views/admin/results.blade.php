@extends('lte.root')

@push('pageTitle', 'Terminales')

@section('content')

    <div class="row">
        {!! Form::open(['method' => 'post', 'route' => 'admin.results']) !!}
            <div class="col-md-3">
                <div class="input-group-sm">
                    <input type="date" name="start" class="form-control" value="{{ $start }}">
                </div>
            </div>
            <div class="col-md-3">
                <div class="input-group input-group-sm">
                    <input type="date" name="end" class="form-control" value="{{ $end }}">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </div>
        {!! Form::close() !!}
    </div><br>

    <div class="row">
        @foreach(['chiapas', 'soconusco', 'altos', 'gale_tux', 'gale_tapa', 'comitan'] as $store_name)
          <div class="col-md-6">
              <color-box title="{{ ucwords(str_replace('_', ' ', $store_name)) }}"
                  color="{{ $loop->index < 3 ? 'primary': 'danger' }}">

                  <div>{!! $$store_name->container() !!}</div>

              </color-box>
          </div>
        @endforeach
    </div>
@endsection

@section('chart')
    {!! $chiapas->script() !!}
    {!! $soconusco->script() !!}
    {!! $altos->script() !!}
    {!! $gale_tux->script() !!}
    {!! $gale_tapa->script() !!}
    {!! $comitan->script() !!}
@endsection
