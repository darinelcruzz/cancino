@extends('lte.root')

@push('pageTitle', 'Metas')

@section('content')
    <div class="row">
        <div class="col-md-3">
            {!! Form::open(['method' => 'post', 'route' => ['commision.show', $store]]) !!}
                <div class="input-group input-group-sm">
                    <input type="month" name="date" class="form-control" value="{{ $date }}">
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-github btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            {!! Form::close() !!}
        </div>
    </div><br>

    @if($msg != '') <h1>AÚN NO HAY METAS PARA ESTE MES</h1> @endif

    @if($goal)
        <div class="row">
            <div class="col-md-12">
                <color-box title="Metas {{ $store->name }} ({{ fdate($date, 'F', 'Y-m') . ' ' . fdate($date, 'Y', 'Y-m') }})"  color="vks" solid>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th><big>Semana 1</big></th>
                                        <th><big>Semana 2</big></th>
                                        <th><big>Semana 3</big></th>
                                        <th><big>Semana 4</big></th>
                                        <th><big>Semana 5</big></th>
                                        <th><big>Total</big></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($goal->commisions->groupBy('employer_id') as $employer_id => $commisions)
                                        <tr>
                                            <th>
                                               <big>{{ App\Employer::find($employer_id)->nickname }}</big>
                                            </th>
                                            @foreach($commisions as $commision)
                                                <td>{{ number_format($commision->weekly_goal, 2) }}</td>
                                            @endforeach
                                            <td>
                                                {{ number_format($commisions->sum('weekly_goal'), 2) }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th><big>SUMAS</big></th>
                                        @foreach($goal->commisions->groupBy('week') as $commisions)
                                            <td>
                                                {{ number_format($commisions->sum('weekly_goal'), 2) }}
                                            </td>
                                        @endforeach
                                        <th><big>{{ number_format($goal->commisions->sum('weekly_goal'), 2) }}</big></th>
                                    </tr>
                                </tfoot>                    
                            </table>
                        </div>

                        <br>
                        <div class="row">
                            <div class="col-md-offset-3 col-md-2">
                                <h4 align="center"><b>Venta año pasado:</b></h4>
                                <h4 align="center">{{ fnumber($past_goal->sale) }}</h4>
                            </div>
                            <div class="col-md-offset-2 col-md-2">
                                <h4 align="center"><b>Días laborales:</b></h4>
                                <h4 align="center">{{ $goal->days }}</h4>
                            </div>
                        </div>
                </color-box>
            </div>
        </div>
    @endif
@endsection
