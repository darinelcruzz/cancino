@extends('lte.root')

@push('pageTitle')
    Cliente | Editar
@endpush

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <color-box title="Agregar cliente" color="success" solid>
                {!! Form::open(['method' => 'POST', 'route' => 'clients.update']) !!}

                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            {!! Field::text('business',$client->business, ['tpl' => 'lte/withicon'], ['icon' => 'shopping-cart']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            {!! Field::text('social',$client->social, ['tpl' => 'lte/withicon'], ['icon' => 'gavel']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::text('rfc',$client->rfc, ['tpl' => 'lte/withicon'], ['icon' => 'bank']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::number('phone',$client->phone, ['tpl' => 'lte/withicon'], ['icon' => 'phone']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::email('email',$client->email, ['tpl' => 'lte/withicon'], ['icon' => 'at']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8">
                            {!! Field::text('address',$client->address, ['tpl' => 'lte/withicon'], ['icon' => 'map-pin']) !!}
                        </div>
                        <div class="col-md-4">
                            {!! Field::text('city',$client->city, ['tpl' => 'lte/withicon'], ['icon' => 'map']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            {!! Field::text('contact',$client->contact, ['tpl' => 'lte/withicon', 'placeholder' => 'nombre'], ['icon' => 'user']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {!! Field::text('position', $client->position, ['tpl' => 'lte/withicon'], ['icon' => 'briefcase']) !!}
                        </div>
                        <div class="col-md-6">
                            {!! Field::number('cellphone',$client->cellphone, ['tpl' => 'lte/withicon', 'placeholder' => 'del contacto'], ['icon' => 'mobile']) !!}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            {!! Field::select('type',
                                ['1' => 'Ventas', '0' => 'Escuela'], $client->type,
                                ['empty' => 'Seleccione el tipo', 'tpl' => 'lte/withicon'], ['icon' => 'map-signs'])
                            !!}
                        </div>
                    </div>


                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="store_id" value="{{ auth()->user()->store_id }}">
                    <input type="hidden" name="id" value="{{ $client->id }}">
                    <button type="submit" class="btn btn-success pull-right" onclick="submitForm(this);">Editar</button>

                {!! Form::close() !!}
            </solid-box>
        </div>
    </div>

@endsection
