@extends('lte.root')
@push('pageTitle')
    Pendientes | Lista
@endpush

@push('headerTitle')
    <a href="{{ route('tasks.create') }}" class="btn btn-success btn-xs"><i class="fa fa-plus-square"></i>&nbsp;&nbsp;AGREGAR</a>
@endpush

@section('content')
    @foreach ($stores as $store)
        <div class="col-md-12">
            <color-box title="{{ $store->name }}" color="{{ $store->color }}" label="{{ $tasks->where('store_id', $store->id)->where('status', '!=', 'finalizada')->count() }}" button collapsed>
                <data-table example="{{ $store->id }}">
                    {{ drawHeader('urgencia', 'fecha solicitud', 'detalles', 'observaciones', 'estado', '') }}
                    <template slot="body">
                        @foreach($tasks->where('store_id', $store->id) as $task)
                            <tr>
                                <td>{{ $task->level }}</td>
                                <td>{{ fdate($task->start_at,'d-M-Y', 'Y-m-d') }}</td>
                                <td>{{ $task->description }}</td>
                                <td>{{ $task->observations }}</td>
                                <td>{!! $task->label !!}</span></td>
                                <td>
                                    <dropdown icon="cogs" color="{{ $store->color }}">
                                        @if ($task->status == 'pendiente')
                                            <ddi to="{{ route('tasks.agree', $task) }}" icon="eye" text="Visto"></ddi>
                                        @endif
                                        @if ($task->status == 'visto')
                                            <ddi to="{{ route('tasks.agree', $task) }}" icon="spinner" text="En proceso"></ddi>
                                        @endif
                                        @if ($task->status == 'en proceso')
                                            <ddi to="{{ route('tasks.agree', $task) }}" icon="check" text="Finalizada"></ddi>
                                        @endif
                                    </dropdown>
                                </td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    @endforeach
@endsection
