@extends('lte.root')
@push('pageTitle')
    Empleados | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box title="Empleados de {{ auth()->user()->store->name }}" color="{{ auth()->user()->store->color }}">
                <data-table example="1">
                    {{ drawHeader('nombre', '<i class="fa fa-cogs"></i>', 'cumpleaños') }}
                    <template slot="body">
                        @foreach($employers as $employer)
                            <tr>
                                <td>
                                    <div class="col-md-2">
                                        @if(Storage::disk('public')->exists('employers/' . $employer->id . '/FOTO.jpeg'))
                                            <img src="{{ Storage::url('employers/' . $employer->id . '/FOTO.jpeg') }}" 
                                                alt="foto de {{ $employer->name }}" 
                                                width="50px" height="50px"
                                                style="border-radius: 50%;">
                                        @else
                                            <img src="{{ asset('images/default-avatar.png') }}"
                                                width="50px" height="50px"
                                                style="border-radius: 50%;">
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        {{ $employer->name }} <br>
                                        <code>{{ $employer->job }}</code>
                                    </div>
                                </td>
                                <td>
                                    <dropdown icon="cogs" color="{{ auth()->user()->store->color }}">
                                        <ddi to="{{ route('employers.show', $employer) }}" icon="eye" text="Detalles"></ddi>
                                        <ddi to="{{ route('employers.explore', $employer) }}" icon="file-pdf" text="Documentos"></ddi>
                                        <ddi to="{{ route('employers.edit', $employer) }}" icon="edit" text="Editar"></ddi>
                                        <ddi to="#" icon="times" text="Dar de baja"></ddi>
                                    </dropdown>
                                </td>
                                <td>{{ fdate($employer->birthday, 'd M Y', 'Y-m-d') }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </solid-box>
        </div>
    </div>
@endsection
