@extends('lte.root')

@push('pageTitle', 'Documentos | Lista')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="ARCHIVOS" color="vks" solid>
                <ul>
                    {{-- @dd($files) --}}
                    @foreach($files as $file)
                        <li>
                            <a href="{{ Storage::url($file) }}" target="_blank">
                                <i style="color:red;" class="fa fa-file-{{ explode('.', $file)[1] == 'pdf' ? 'pdf-o': 'word' }} fa-2x"></i>
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
