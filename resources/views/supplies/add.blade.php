@extends('lte.root')

@push('pageTitle', 'Insumos | Subproducto')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <color-box title="Agregar subproducto a {{ $supply->description }}" color="vks">

                {!! Form::open(['method' => 'POST', 'route' => ['supplies.save', $supply]]) !!}

                    @php
                        $i = 0
                    @endphp

                    @if($supply->byproducts)
                        @foreach($supply->byproducts as $byproduct)
                            <input type="hidden" name="byproducts[{{ $i }}][name]" value="{{ $byproduct['name'] }}">
                            <input type="hidden" name="byproducts[{{ $i }}][ratio]" value="{{ $byproduct['ratio'] }}">
                            <input type="hidden" name="byproducts[{{ $i }}][price]" value="{{ $byproduct['price'] }}">
                            @php
                                $i += 1;
                            @endphp
                        @endforeach
                    @endif

                    {!! Field::text('byproducts[' . $i . '][name]', ['label' => 'Nombre del subproducto', 'tpl' => 'lte/withicon'], ['icon' => 'broom']) !!}
                    {!! Field::number('byproducts[' . $i . '][ratio]', 1, ['label' => 'Relacion (20, 4, etc.)', 'tpl' => 'lte/withicon'], ['icon' => 'coins']) !!}
                    {!! Field::number('byproducts[' . $i . '][price]', 0, ['label' => 'Precio', 'tpl' => 'lte/withicon', 'step' => '0.01'], ['icon' => 'money']) !!}

                    <hr>

                    {!! Form::submit('AGREGAR', ['class' => 'btn btn-github pull-right']) !!}

                {!! Form::close() !!}
            </color-box>
        </div>
        
    </div>
@endsection
