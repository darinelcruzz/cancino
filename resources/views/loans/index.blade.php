@extends('lte.root')
@push('pageTitle')
    Ventas | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('loans.create') }}" class="btn btn-danger btn"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;Agregar</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Debo" color="danger" solid button>
                <data-table example="1">
                    {{ drawHeader('ID','Tienda', 'Modelo', 'Cantidad', 'Fecha', 'Pagadas', '') }}

                    <template slot="body">
                        @foreach($lent as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->fromr->name }}</td>
                                <td><a href="{{ route('loans.show', ['id' => $row->id]) }}"> {{ $row->item }} </a></td>
                                <td>{{ $row->quantity }}</td>
                                <td>{{ fdate($row->created_at, 'd/M/y') }}</td>
                                <td>{{ $row->q1 + $row->q2 + $row->q3 }}</td>
                                <td>
                                    @if ($row->status == 'solicitado')
                                        <span class="label label-danger">
                                            {{ ucfirst($row->status) }}
                                        </span>
                                    @elseif ($row->status == 'aceptado')
                                        ¿Lo recibiste?&nbsp;
                                        <a href="{{ route('loans.agree', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                                    @elseif ($row->status == 'recibido')
                                        <span class="label label-info">
                                            {{ ucfirst($row->status) }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <color-box title="Me deben" color="success" solid button>
                <data-table example="2">
                    {{ drawHeader('ID','Tienda', 'Modelo', 'Cantidad', 'Fecha', 'Pagadas', '') }}

                    <template slot="body">
                        @foreach($borrowed as $row)
                            <tr>
                                <td>{{ $row->id }}</td>
                                <td>{{ $row->tor->name }}</td>
                                <td><a href="{{ route('loans.show', ['id' => $row->id]) }}"> {{ $row->item }} </a></td>
                                <td>{{ $row->quantity }}</td>
                                <td>{{ fdate($row->created_at, 'd/M/y') }}</td>
                                <td>{{ $row->q1 + $row->q2 + $row->q3 }}</td>
                                <td>
                                    @if ($row->status == 'solicitado')
                                        ¿Aceptas?&nbsp;
                                        <a href="{{ route('loans.agree', ['id' => $row->id])}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                                    @elseif ($row->status == 'aceptado')
                                        <span class="label label-success">
                                            {{ ucfirst($row->status) }}
                                        </span>
                                    @elseif ($row->status == 'recibido')
                                        <span class="label label-info">
                                            {{ ucfirst($row->status) }}
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
