@extends('lte.root')
@push('pageTitle')
    NC | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('creditnotes.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
@endpush

@section('content')
    @for ($i=2; $i < 6; $i++)
        <div class="row">
            <div class="col-md-12">
                <color-box title="{{ App\Store::find($i)->name }}" color="{{ App\Store::find($i)->color }}" button collapsed>
                    <data-table example="{{ $i }}">
                        {{ drawHeader('ID', 'Folio','Fecha NC', 'Monto', 'Doc POS', 'Fecha POS', 'Estado') }}

                        <template slot="body">
                            @foreach($creditNotes->where('store_id', $i) as $creditNote)
                                <tr>
                                    <td>{{ $creditNote->id }}</td>
                                    <td>{{ $creditNote->folio }}</td>
                                    <td>{{ fdate($creditNote->date_nc, 'd M Y', 'Y-m-d') }}</td>
                                    <td>{{ fnumber($creditNote->amount) }}</td>
                                    <td>{{ $creditNote->document }}</td>
                                    <td>{{ $creditNote->date_pos == NULL ? '' : fdate($creditNote->date_pos, 'd M Y', 'Y-m-d') }}</td>

                                    <td><span class="label label-{{ $creditNote->status != 'pendiente' ? 'success': 'danger'}}">
                                        {{ ucfirst($creditNote->status) }}
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
