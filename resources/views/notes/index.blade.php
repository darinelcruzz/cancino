@extends('lte.root')
@push('pageTitle')
    NC | Lista
@endpush

@if (isVKS())
    @push('headerTitle')
        <a href="{{ route('notes.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
    @endpush
@endif

@section('content')
    @forelse ($stores as $store)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ $store->name }}" color="{{ $store->color }}" label="{{ $notes->where('store_id', $store->id)->where('status', 'pendiente')->count() }}" button collapsed>
                    <data-table example="{{ $store->id }}">
                        {{ drawHeader('Folio','Fecha NC', 'Monto', 'Productos', 'Doc POS', 'Fecha POS', 'Observaciones', 'Estado', '') }}
                        <template slot="body">
                            @foreach($notes->where('store_id', $store->id) as $note)
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
                                                    <ddi to="{{ route('notes.capture', $note]) }}" icon="check" text="Aplicar"></ddi>
                                                @endif
                                                <ddi to="{{ route('notes.edit', $note->id) }}" icon="edit" text="Editar"></ddi>
                                            </dropdown>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                </color-box>
            </div>
        </div>
    @empty
        <div class="row">
            <div class="col-md-12">
                <color-box title="Notas de crédito" color="{{ auth()->user()->store->color }}">
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
    @endforelse
@endsection
