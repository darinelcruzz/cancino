@extends('lte.root')
@push('pageTitle')
    Documentos | Lista
@endpush

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Tiendas" color="primary">
                <ul>
                    @foreach($folders as $folder)
                        <li>
                            <a href="{{ route('documents.index', substr($folder, strlen('public/documents/'))) }}">
                                <i class="fa fa-folder-open fa-2x"></i>
                                &nbsp;
                                <span style="font-size: 24px;">
                                    {{ $labels[substr($folder, strlen('public/documents/store')) - 1] }}
                                </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </color-box>
        </div>
    </div>
@endsection
