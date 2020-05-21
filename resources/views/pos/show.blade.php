@extends('lte.root')

@push('pageTitle', 'POS')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <color-box title="POS {{ $pos }}" color="vks">
                <data-table example="1">
                    {{ drawHeader('Folio','Modelo', 'Descripción', 'Fecha') }}
                    <template slot="body">
                        @foreach($wastes as $waste)
                            <tr>
                                <td>{{ $waste->id }}</td>
                                <td>{{ $waste->item }}</td>
                                <td>{{ $waste->description }}</td>
                                <td>{{ fdate($waste->created_at, 'd-M-y') }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
