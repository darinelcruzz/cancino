@extends('lte.root')

@push('pageTitle', 'Metas | Editar')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Editar metas de la semana"  color="vks" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'commision.updateEmployer']) !!}
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="text-align: center;"><h4>Nombre</h4></th>
                                    <th style="text-align: center;"><h4>Semana 1</h4></th>
                                    <th style="text-align: center;"><h4>Semana 2</h4></th>
                                    <th style="text-align: center;"><h4>Semana 3</h4></th>
                                    <th style="text-align: center;"><h4>Semana 4</h4></th>
                                    <th style="text-align: center;"><h4>Semana 5</h4></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <h4>{{ $employer->nickname }}</h4>
                                    </td>
                                    @foreach ($goal->commisions->where('employer_id', $employer->id) as $commision)
                                        <td>
                                            <input type="hidden" name="items[{{ $loop->index }}][id]" value="{{ $commision->id }}">
                                            <input class="form-control" type="number" name="items[{{ $loop->index }}][weekly_goal]" value="{{ $commision->weekly_goal }}" step="0.01">
                                        </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <hr>
                    {!! Form::submit('G U A R D A R', ['class' => 'btn btn-github pull-right']) !!}
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
