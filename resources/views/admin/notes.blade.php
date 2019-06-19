@extends('lte.root')
@push('pageTitle')
    NC | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('notes.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
@endpush

@section('content')
    @for ($i=2; $i < 7; $i++)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ App\Store::find($i)->name . ' ' . count($notes->where('store_id', $i)->where('status', '!=', 'aplicada')) }}" color="{{ App\Store::find($i)->color }}" button collapsed>
                    <data-table example="{{ $i }}">
                        {{ drawHeader('Folio','Fecha NC', 'Monto', 'Productos', 'Doc POS', 'Fecha POS', 'Observaciones', 'Estado', '') }}
                        <template slot="body">
                            @foreach($notes->where('store_id', $i) as $note)
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
                                    <td>
                                        @if (auth()->user()->level == 1)
                                            <dropdown icon="cogs" color="primary">
                                                @if ($note->status != 'aplicada')
                                                    <ddi to="{{ route('notes.capture', ['id'=>$note->id]) }}" icon="check" text="Aplicar"></ddi>
                                                @endif
                                                <ddi to="{{ route('notes.edit', ['id'=>$note->id]) }}" icon="edit" text="Editar"></ddi>
                                            </dropdown>
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
