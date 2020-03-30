<table>
    <thead>
        <tr>
            <td>Código</td>
            <td>Usuario</td>
            <td>Ubicación</td>
            <td>Cantidad</td>
        </tr>
    </thead>

    <tbody>
        @foreach($counts as $count)

        <tr>
            <td>{{ $count->product->code }}</td>
            <td>{{ $count->user->name }}</td>
            <td>{{ $count->location->name }}</td>
            <td>{{ $count->quantity }}</td>
        </tr>

        @endforeach
    </tbody>
</table>
