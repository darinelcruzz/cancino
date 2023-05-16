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
            <td>{{ $count->product->code ?? 'Eliminado' }}</td>
            <td>{{ $count->team }}</td>
            <td>{{ $count->location->name ?? 'Eliminado' }}</td>
            <td>{{ $count->quantity }}</td>
        </tr>

        @endforeach
    </tbody>
</table>
