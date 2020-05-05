@extends('lte.root')

@push('pageTitle', 'Documentos | Lista')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Tiendas" color="primary">
                <ul>
                    @foreach($folders as $folder)
                        @if(auth()->user()->level > 1)
                            @if(substr($folder, strlen('public/documents/')) == 'store0' || substr($folder, strlen('public/documents/')) == 'store' . auth()->user()->store_id)
                                <li>
                                    <a href="{{ route('documents.show', substr($folder, strlen('public/documents/'))) }}">
                                        <i class="fa fa-folder-open fa-2x"></i>
                                        &nbsp;
                                        <span style="font-size: 24px;">
                                            {{ $labels[substr($folder, strlen('public/documents/store'))] }}
                                        </span>
                                    </a>
                                </li>
                            @endif
                        @else
                            <li>
                                <a href="{{ route('documents.show', substr($folder, strlen('public/documents/'))) }}">
                                    <i class="fa fa-folder-open fa-2x"></i>
                                    &nbsp;
                                    <span style="font-size: 24px;">
                                        {{ $labels[substr($folder, strlen('public/documents/store'))] }}
                                    </span>
                                </a>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </color-box>
        </div>
    </div>
@endsection
