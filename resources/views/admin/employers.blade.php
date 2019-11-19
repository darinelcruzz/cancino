@extends('lte.root')
@push('pageTitle')
    Empleados | Lista
@endpush

@section('content')
    <div class="row">
        @foreach($stores as $store)
            <div class="col-md-12">
                <color-box title="Empleados de {{ $store->first()->store->name . ' ' . count($store) }}" color="{{ $store->first()->store->color }}" button collapsed>
                    <data-table example="{{ $store->first()->store->id }}">
                        {{ drawHeader('nombre', '<i class="fa fa-cogs"></i>', 'cumpleaños') }}
                        <template slot="body">
                            @foreach ($store as $employer)
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
                                            <ddi to="{{ route('employers.show', ['id' => $employer->id]) }}" icon="eye" text="Detalles"></ddi>
                                            <ddi to="{{ route('employers.explore', $employer) }}" icon="file-pdf" text="Documentos"></ddi>
                                            <ddi to="{{ route('employers.edit', $employer) }}" icon="edit" text="Editar"></ddi>
                                            <ddi to="{{ route('employers.dismiss', $employer) }}" icon="times" text="Dar de baja"></ddi>
                                        </dropdown>
                                    </td>
                                    <td>{{ fdate($employer->birthday, 'd M Y', 'Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </template>
                    </data-table>
                </solid-box>
            </div>
        @endforeach
        <div class="col-lg-3 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Gerentes</b></h4>
                    <h3 align="center"><b>{{ count($employers->where('job', 'Gerente')) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Vendedores</b></h4>
                    <h3 align="center"><b>{{ count($employers->where('job', 'Vendedor')) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Apoyo y bodega</b></h4>
                    <h3 align="center"><b>{{ count($employers->where('job', 'Apoyo')) + count($employers->where('job', 'Bodega')) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>B2B</b></h4>
                    <h3 align="center"><b>{{ count($employers->where('job', 'B2B')) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Total</b></h4>
                    <h3 align="center"><b>{{ count($employers) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
