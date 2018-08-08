@extends('lte.root')
@push('pageTitle')
    Cancino | Inicio
@endpush
@push('headerTitle')
    Bienvenido(a), {{ auth()->user()->name }}
@endpush

@section('content')
    <div align="center" valign="middle">
    	<img width="60%" height="60%" src="{{ asset('/img/logo.png') }}">
    </div>

@endsection
