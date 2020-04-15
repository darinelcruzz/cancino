@extends('lte.root')
@push('pageTitle')
    Metas | Agregar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Agregar metas individuales de {{ fdate($now->month, 'F', 'm') . ' ' . $now->year }} "  color="success">
                {!! Form::open(['method' => 'POST', 'route' => 'commision.store', 'enctype' => 'multipart/form-data']) !!}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th><h4>Semana 1</h4></th>
                                    <th><h4>Semana 2</h4></th>
                                    <th><h4>Semana 3</h4></th>
                                    <th><h4>Semana 4</h4></th>
                                    <th><h4>Semana 5</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employers as $name => $employer_id)
                                    <tr>
                                        <td>
                                            <h3>{{ $name }}</h3>
                                        </td>
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
                                    <td><h4>Sumas</h4></td>
                                    <td><h4><week-sum week="1"></week-sum></h4></td>
                                    <td><h4><week-sum week="2"></week-sum></h4></td>
                                    <td><h4><week-sum week="3"></week-sum></h4></td>
                                    <td><h4><week-sum week="4"></week-sum></h4></td>
                                    <td><h4><week-sum week="5"></week-sum></h4></td>
                                    <td><h4><b><goal-sum></goal-sum></b></h4></td>
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
                    <hr>
                    {!! Form::submit('Agregar', ['class' => 'btn btn-success pull-right']) !!}
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
