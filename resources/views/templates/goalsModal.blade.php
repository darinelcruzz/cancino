<modal id="{{ $month . $date }}" title="Metas para {{ fdate($month, 'F', 'm') . ' ' . $date }}">
    <table style="width:100%">
        <thead>
            <tr>
                <th>Tienda</th>
                <th>Negro</th>
                <th>Estrella</th>
                <th>Dorada</th>
            </tr>
        </thead>
        <tbody>
            @for ($i=2; $i < 6; $i++)
                <tr>
                    <td>{!! empty($stores->where('store_id', $i)->first()) ? '' : $stores->where('store_id', $i)->first()->store->name !!}</td>
                    <td>{!! empty($stores->where('store_id', $i)->first()) ? '' : fnumber($stores->where('store_id', $i)->first()->blackPoint) !!}</td>
                    <td>{!! empty($stores->where('store_id', $i)->first()) ? '' : fnumber($stores->where('store_id', $i)->first()->starPoint) !!}</td>
                    <td>{!! empty($stores->where('store_id', $i)->first()) ? '' : fnumber($stores->where('store_id', $i)->first()->goldenPoint) !!}</td>
                </tr>
            @endfor
        </tbody>
    </table>
</modal>
