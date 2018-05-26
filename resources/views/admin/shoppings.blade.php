@extends('lte.root')
@push('pageTitle')
    Compras | Lista
@endpush

@section('content')
    @for ($i=2; $i < 6; $i++)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ App\Store::find($i)->name }}" color="{{ App\Store::find($i)->color }}" button collapsed>
                    <data-table example="{{ $i }}">
                        {{ drawHeader('ID', 'Folio','Fecha', 'Monto', 'Tipo', 'Doc POS', 'Estado') }}

                        <template slot="body">
                            @foreach($shoppings->where('store_id', $i) as $shopping)
                                <tr>
                                    <td>{{ $shopping->id }}</td>
                                    <td>{{ $shopping->folio }}</td>
                                    <td>{{ fdate($shopping->date, 'd M Y', 'Y-m-d') }}</td>
                                    <td>{{ fnumber($shopping->amount) }}</td>
                                    <td>{{ $shopping->type }}</td>
                                    <td>{{ $shopping->document }}</td>
                                    <td>
                                        <span class="label label-{{ $shopping->status != 'pendiente' ? 'success': 'danger'}}">
                                            {{ ucfirst($shopping->status) }}
                                        </span> &nbsp;
                                        @if ($shopping->status == 'pendiente')
                                            <a href="{{ route('admin.verify', ['id' => $shopping->id])}}" class="btn btn-xs btn-success"><i class="fa fa-check"></i></a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                </solid-box>
            </div>
        </div>
    @endfor
@endsection
