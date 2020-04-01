<table>
    <thead>
        <tr>
            <td>Código</td>
            <td>Estado</td>
            <td>Antes</td>
            <td>Después</td>
            <td>Diferencia</td>
            <td>Costo</td>
        </tr>
    </thead>

    @php
        $sum = 0
    @endphp

    <tbody>
        @foreach($products as $product)

        <tr>
            <td>{{ $product->code }}</td>
            <td>{{ $product->status }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->counts->sum('quantity') }}</td>
            <td>{{ $product->counts->sum('quantity') - $product->quantity }}</td>
            <td>
                {{ number_format(($product->counts->sum('quantity') - $product->quantity) * $product->price, 2) }}
            </td>
        </tr>

        @php
            $sum += ($product->counts->sum('quantity') - $product->quantity) * $product->price
        @endphp

        @endforeach
    </tbody>

    <tfoot>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>TOTAL</td>
            <td>{{ number_format($sum, 2) }}</td>
        </tr>
    </tfoot>
</table>