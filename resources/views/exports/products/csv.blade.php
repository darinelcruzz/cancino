<table>
    <thead>
        <tr>
            <td>Material</td>
            <td>Existencia</td>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $product)

        <tr>
            <td>{{ $product->code }}</td>
            <td>{{ $product->counts->sum('quantity') }}</td>
        </tr>

        @endforeach
    </tbody>
</table>