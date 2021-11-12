@extends('lte.root')

@push('pageTitle', 'Documentos | Lista')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <color-box title="Tiendas" color="primary">
                <ul>
                    @foreach($folders as $folder)
                    @if(auth()->user()->store_id == substr($folder, -1) || substr($folder, -1) == 0 || auth()->user()->level == 1)
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
