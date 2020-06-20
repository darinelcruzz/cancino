@extends('lte.root')

@push('pageTitle', 'Servicios | Lista')

@push('headerTitle')
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('services.create') }}" class="btn btn-github btn-xs pull-left">
                <i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR
            </a>
        </div>
    </div>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Lista de servicios" color="vks">
                <data-table example="1">
                    {{ drawHeader('ID','description', 'group', 'pago', 'fecha', 'periodo', 'vencimiento') }}

                    <template slot="body">
                        @foreach($services as $service)
                            <tr>
                                <td>{{ $service->id }}</td>
                                <td>{{ $service->description }}</td>
                                <td>{{ $service->group }}</td>
                                <td>{{ fnumber($service->amount) }}</td>
                                <td>{{ fdate($service->invoiced_at, 'D, d M Y', 'Y-m-d') }}</td>
                                <td>{{ $service->period }}</td>
                                <td>{{ fdate($service->expired_at, 'D, d M Y', 'Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
