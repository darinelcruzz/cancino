@extends('lte.root')
@push('pageTitle')
    VKS | Inicio
@endpush
@push('headerTitle')
    Bienvenido(a), {{ auth()->user()->name }}
@endpush

@section('content')
    <div align="center" valign="middle">
    	<img width="70%" height="70%" src="{{ asset('/img/logo.png') }}">
    </div>

@endsection
