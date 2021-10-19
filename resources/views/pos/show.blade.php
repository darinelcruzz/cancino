@extends('lte.root')

@push('pageTitle', 'POS')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <color-box title="POS {{ $pos }}" color="vks">
                <data-table example="1">
                    {{ drawHeader('fecha', 'modelo', 'cantidad', 'motivo', 'usuario') }}
                    <template slot="body">
                        @foreach($taken_products as $taken_product)
                            <tr>
                                <td>{{ fdate($taken_product->taken_at, 'd/M/y', 'Y-m-d') }}</td>
                                <td>{{ $taken_product->code }}</td>
                                <td>{{ $taken_product->quantity }}</td>
                                <td>{{ $taken_product->observations }}</td>
                                <td>{{ $taken_product->user->name }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
