@extends('lte.root')

@push('pageTitle', 'Metas | Agregar')

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

    <div class="row">
        <div class="col-md-12">
            <color-box title="Agregar metas individuales de {{ fdate($now->month, 'F', 'm') . ' ' . $now->year }}" solid color="vks">
                {!! Form::open(['method' => 'POST', 'route' => 'commision.store', 'enctype' => 'multipart/form-data']) !!}
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th style="text-align: center;"><big>SEMANA 1</big></th>
                                    <th style="text-align: center;"><big>SEMANA 2</big></th>
                                    <th style="text-align: center;"><big>SEMANA 3</big></th>
                                    <th style="text-align: center;"><big>SEMANA 4</big></th>
                                    <th style="text-align: center;"><big>SEMANA 5</big></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employers as $name => $employer_id)
                                    <tr>
                                        <th>
                                            <big>{{ strtoupper($name) }}</big>
                                        </th>
                                        @foreach ([1, 2, 3, 4, 5] as $week)
                                            <td>
                                                <employee-week-goal :week="{{ $week }}" :employee="{{ $employer_id }}" :goal="{{ $now->id }}"></employee-week-goal>
                                            </td>
                                        @endforeach
                                        <td>
                                            <h4><employee-sum :employee="{{ $employer_id  }}"></employee-sum></h4>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td><big>SUMAS</big></td>
                                    <td><big><week-sum week="1"></week-sum></big></td>
                                    <td><big><week-sum week="2"></week-sum></big></td>
                                    <td><big><week-sum week="3"></week-sum></big></td>
                                    <td><big><week-sum week="4"></week-sum></big></td>
                                    <td><big><week-sum week="5"></week-sum></big></td>
                                    <th><big><goal-sum></goal-sum></big></th>
                                </tr>
                            </tfoot>                    
                        </table>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-offset-3 col-md-2">
                            <h4 align="center"><b>Venta año pasado:</b></h4>
                            <h4 align="center">{{ fnumber($goal) }}</h4>
                        </div>
                        <div class="col-md-offset-2 col-md-2">
                            <h4 align="center"><b>Días laborales:</b></h4>
                            <h4 align="center">{{ $now->days }}</h4>
                        </div>
                    </div>
                    {!! Form::submit('A G R E G A R', ['class' => 'btn btn-github pull-right']) !!}
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
