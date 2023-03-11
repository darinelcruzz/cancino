<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Estado</th>
            <th>Antes</th>
            <th>Después</th>
            <th>Diferencia</th>
            <th>Costo</th>
            <th>Valor</th>
            <th></th>
            <th></th>
            <th>Link</th>
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
                {{ number_format($product->price, 2) }}
            </td>
            <td>
                {{ number_format(($product->counts->sum('quantity') - $product->quantity) * $product->price, 2) }}
            </td>
            <td></td>
            <td></td>
            <td>https://www.vks.com.mx/conteos/{{ $product->id }}</td>

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
            <td></td>
            <td>TOTAL</td>
            <td>{{ number_format($sum, 2) }}</td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </tfoot>
</table>
