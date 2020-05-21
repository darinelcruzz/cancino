@extends('lte.root')
@push('pageTitle')
    POS | Foto
@endpush

@section('content')
    <div class="row">
        <div class="col-md-4">
            <color-box title="Agregar foto" color="vks">
                {!! Form::open(['method' => 'POST', 'route' => ['pos.save', $pos], 'enctype' => 'multipart/form-data']) !!}
                <div class="row">
                    <br>
                    <div class="col-md-12" align="center">
                        <input type="file" name="photo">
                    </div>
                    <br><br><br>
                </div>
                    <hr>
                    {!! Form::submit('Subir', ['class' => 'btn btn-github btn-block']) !!}
                {!! Form::close() !!}
            </color-box>
        </div>
    </div>
@endsection