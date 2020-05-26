@extends('lte.root')
@push('pageTitle')
    -$200 | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-4">
            <color-box title="Agregar productos" color="danger" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'wastes.store']) !!}

                    <div class="row">
                        <div class="col-md-12">
                            {!! Field::text('item', ['tpl' => 'lte/withicon'], ['icon' => 'barcode']) !!}
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            {!! Field::text('description', ['tpl' => 'lte/withicon'], ['icon' => 'tags']) !!}
                        </div>
                    </div>
                    <hr>
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="store_id" value="{{ auth()->user()->store_id }}">
                    <button type="submit" class="btn btn-danger  btn-block" onclick="submitForm(this);">Agregar</button>

                {!! Form::close() !!}
            </color-box>

            <a href="{{ route('wastes.print', getStore()->id) }}" class="btn btn-github btn-sm btn-block" target="_blank">
                <i class="fa fa-print"></i>&nbsp;&nbsp;IMPRIMIR PENDIENTES
            </a>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-12">
                    <color-box title="Pendientes  {{ count($pendings) }}" color="danger" button>
                        <data-table example="2">
                            {{ drawHeader('Folio','Modelo', 'Descripción', 'Fecha') }}
                            <template slot="body">
                                @foreach($pendings as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->item }}</td>
                                        <td>{{ $row->description }}</td>
                                        <td>{{ fdate($row->created_at, 'd-M-y') }}</td>
                                    </tr>
                                @endforeach
                            </template>
                        </data-table>
                    </color-box>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <color-box title="Destruidos" color="success" button collapsed>
                        <data-table example="1">
                            {{ drawHeader('Folio','Modelo', 'Descripción', 'Pos') }}
                            <template slot="body">
                                @foreach($complete as $row)
                                    <tr>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->item }}</td>
                                        <td>
                                            {{ $row->description }}<br>
                                            {{ fdate($row->created_at, 'd-M-y') }}
                                        </td>
                                        <td>
                                            {{ $row->pos }}<br>
                                            {{ fdate($row->pos_at, 'd-M-y', 'Y-m-d') }}
                                        </td>
                                    </tr>
                                @endforeach
                            </template>
                        </data-table>
                    </color-box>
                </div>
            </div>
        </div>
    </div>
@endsection
