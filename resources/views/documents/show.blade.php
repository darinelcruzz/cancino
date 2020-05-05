@extends('lte.root')

@push('pageTitle', 'Documentos | Lista')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Archivos" color="primary">
                <ul>
                    @foreach($files as $file)
                        <li>
                            <a href="{{ Storage::url($file) }}" target="_blank">
                                @if (explode('.', $file)[1] == 'pdf')
                                    <i style="color:red;" class="fa fa-file-pdf-o fa-2x"></i>
                                @else
                                    <i style="color:blue;" class="fa fa-file-word fa-2x"></i>
                                @endif
                                &nbsp;
                                <span style="font-size: 24px;">
                                    {{ substr($file, strlen('public/documents/store0/')) }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </color-box>
        </div>
    </div>
@endsection
