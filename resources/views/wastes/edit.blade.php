@extends('lte.root')

@push('pageTitle')
    -$200 | Destruir
@endpush

@section('content')
    <div class="row">
        <div class="col-md-8">
            <color-box title="Destrucción de {{ $store->name }}" color="danger">
                {!! Form::open(['method' => 'POST', 'route' => 'wastes.update']) !!}
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-6">
                                {!! Field::number('pos') !!}
                            </div>
                            <div class="col-md-6">
                                {!! Field::date('pos_at', Date::now()) !!}
                            </div>
                        </div>
                        <data-table example="1">
                            {{ drawHeader('ID','Modelo', 'Fecha') }}
                            <template slot="body">
                                @foreach ($wastes as $waste)
                                    <tr>
                                        <td>{!! Form::checkboxes('items', [$waste->id => $waste->id]) !!}</td>
                                        <td>{{ $waste->item }}</td>
                                        <td>{{ fdate($waste->created_at, 'd-M-Y') }}</td>
                                    </tr>
                                @endforeach
                            </template>
                        </data-table>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="status" value="destruido">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        <input type="hidden" name="store_id" value="{{ auth()->user()->store_id }}">
                        {!! Form::submit('Destruir', ['class' => 'btn btn-danger btn-block']) !!}
                    </div>

                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection
