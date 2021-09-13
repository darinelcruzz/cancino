@extends('lte.root')

@push('pageTitle', 'Empleado | Documentos')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Archivos de {{ $employer->name }}" color="primary">
                <ul>
                    @foreach($files as $file)
                        <li>
                            <a href="{{ Storage::url($file) }}" target="_blank">
                                @if (basename($file, '.jpeg') == 'FOTO')
                                    <i style="color:blue;" class="fa fa-file-image fa-2x"></i>
                                @else
                                    <i style="color:red;" class="fa fa-file-pdf-o fa-2x"></i>
                                @endif
                                &nbsp;
                                <span style="font-size: 24px;">
                                    {{ basename($file, '.pdf') }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </color-box>
        </div>
    </div>
@endsection