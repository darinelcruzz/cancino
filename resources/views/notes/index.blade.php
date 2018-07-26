@extends('lte.root')
@push('pageTitle')
    NC | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Ventas" color="success">
                <data-table example="1">
                    {{ drawHeader('Folio','Fecha NC', 'Monto', 'Productos', 'Doc POS', 'Fecha POS', 'Observaciones', 'Estado') }}
                    <template slot="body">
                        @foreach($notes as $note)
                            <tr>
                                <td>{{ $note->folio }}</td>
                                <td>{{ fdate($note->date_nc, 'd M Y', 'Y-m-d') }}</td>
                                <td>{{ fnumber($note->amount) }}</td>
                                <td>{{ $note->items }}</td>
                                <td>{{ $note->document }}</td>
                                <td>{{ $note->date_pos == NULL ? '' : fdate($note->date_pos, 'd M Y', 'Y-m-d') }}</td>
                                <td>{{ $note->observations }}</td>
                                <td>
                                    <span class="label label-{{ $note->status == 'aplicada' ? 'success' : ($note->status == 'pendiente' ? 'danger' : 'warning') }}">
                                        {{ ucfirst($note->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
