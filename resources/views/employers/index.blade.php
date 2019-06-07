@extends('lte.root')
@push('pageTitle')
    Empleados | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Empleados de {{ auth()->user()->store->name }}" color="{{ auth()->user()->store->color }}">
                <data-table example="1">
                    {{ drawHeader('id', 'name', 'puesto','cumpleaños', '<i class="fa fa-eye"></i>') }}
                    <template slot="body">
                        @foreach($employers as $employer)
                            <tr>
                                <td>{{ $employer->id }}</td>
                                <td>{{ $employer->name }}</td>
                                <td>{{ $employer->job }}</td>
                                <td>{{ fdate($employer->birthday, 'd M Y', 'Y-m-d') }}</td>
                                <td>
                                    <a href="{{ route('employers.show', ['id' => $employer->id])}}" class="btn btn-xs btn-{{ auth()->user()->store->color }}">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
