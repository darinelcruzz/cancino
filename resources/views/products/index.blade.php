@extends('lte.root')

@push('pageTitle', 'Productos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box color="primary" title="Productos">
                <data-table example="1">
                    {{ drawHeader('código', 'descripción', 'antes', 'después', 'diferencia') }}
                    <template slot="body">
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->code }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->quantity }}</td>
                                <td>{{ $product->counts->sum('quantity') }}</td>
                                <td>{{ $product->counts->sum('quantity') - $product->quantity }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
