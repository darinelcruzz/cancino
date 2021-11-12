@extends('lte.root')

@push('pageTitle', 'Documentos | Lista')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Tiendas" color="primary">
                <ul>
                    <li>
                        <a href="{{ route('documents.show', 0) }}">
                            <i class="fa fa-folder-open fa-2x"></i>
                            &nbsp;
                            <span style="font-size: 24px;">
                                {{ $labels[0] }}
                            </span>
                        </a>
                    </li>
                    @foreach($folders as $folder)
                    @if(auth()->user()->level == 1 || auth()->user()->store_id == substr($folder, -1))
                    <li>
                        <a href="{{ route('documents.show', substr($folder, -1)) }}">
                            <i class="fa fa-folder-open fa-2x"></i>
                            &nbsp;
                            <span style="font-size: 24px;">
                                {{ $labels[substr($folder, -1)] }}
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
