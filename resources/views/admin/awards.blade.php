@extends('lte.root')
@push('pageTitle')
    Premios | Lista
@endpush

@section('content')
      <div class="row">
          <div class="col-md-12">
              <color-box title="Premios" color="primary">
                  <data-table example="1">
                      {{ drawHeader('Nombre', 'Tienda', 'Ingreso','SC', 'Ext', 'Ventas') }}
                      <template slot="body">
                          @foreach ($employers as $employ)
                              <tr>
                                  <td>{{ $employ->name }}</td>
                                  <td>{{ $employ->store->name }}</td>
                                  <td>{{ 2021 - fdate($employ->ingress, 'Y' ,'Y-m-d') }}</td>
                                  <td>{{ $commisions->where('employer_id', $employ->id)->sum('sterencard') }}</td>
                                  <td>{{ $commisions->where('employer_id', $employ->id)->sum('extensions') }}</td>
                                  <td>{{ fnumber($commisions->where('employer_id', $employ->id)->sum('sale')) }}</td>
                              </tr>
                          @endforeach
                      </template>
                  </data-table>
              </solid-box>
          </div>
      </div>
@endsection
