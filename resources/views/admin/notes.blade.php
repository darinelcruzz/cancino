@extends('lte.root')
@push('pageTitle')
    NC | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('notes.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
@endpush

@section('content')
    @for ($i=2; $i < 6; $i++)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ App\Store::find($i)->name }}" color="{{ App\Store::find($i)->color }}" button collapsed>
                    <data-table example="{{ $i }}">
                        {{ drawHeader('ID', 'Folio','Fecha NC', 'Monto', 'Doc POS', 'Fecha POS', 'Estado') }}

                        <template slot="body">
                            @foreach($notes->where('store_id', $i) as $note)
                                <tr>
                                    <td>{{ $note->id }}</td>
                                    <td>{{ $note->folio }}</td>
                                    <td>{{ fdate($note->date_nc, 'd M Y', 'Y-m-d') }}</td>
                                    <td>{{ fnumber($note->amount) }}</td>
                                    <td>{{ $note->document }}</td>
                                    <td>{{ $note->date_pos == NULL ? '' : fdate($note->date_pos, 'd M Y', 'Y-m-d') }}</td>

                                    <td><span class="label label-{{ $note->status != 'pendiente' ? 'success': 'danger'}}">
                                        {{ ucfirst($note->status) }}
                                    </span></td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                </solid-box>
            </div>
        </div>
    @endfor
@endsection
