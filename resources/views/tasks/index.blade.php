@extends('lte.root')

@push('pageTitle')
    Pendientes | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('tasks.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box color="primary" title="Pendientes">
                <data-table example="1">
                    {{ drawHeader('urgencia', 'fecha solicitud', 'detalles', 'observaciones', 'estado', '') }}
                    <template slot="body">
                        @foreach($tasks as $task)
                            <tr>
                                <td>{{ $task->level }}</td>
                                <td>{{ fdate($task->start_at,'d-M-Y', 'Y-m-d') }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->observations }}</td>
                                <td>{!! $task->label !!}</span></td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
                                        {{-- <ddi to="{{ route('task.report', $task) }}" icon="file-pdf" text="Reporte"></ddi> --}}
                                    </dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
