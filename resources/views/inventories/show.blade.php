@extends('lte.root')

@push('pageTitle', 'Inventarios|Avance')

@section('content')
    <div class="col-md-12">
        <div class="col-lg-4 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Productos a Contar</b></h4>
                    <h3 align="center"><b>{{ number_format($products) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-box"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Productos Contados</b></h4>
                    <h3 align="center"><b>{{ number_format($productsCounted) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-box"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Avance</b></h4>
                    <h3 align="center"><b>{{ number_format($productAdvance, 2) }}%</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-box"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="col-lg-4 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Valor inventario</b></h4>
                    <h3 align="center"><b>{{ fnumber($inventoryValue) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-dollar"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Valor contabilizado</b></h4>
                    <h3 align="center"><b>{{ fnumber($valueCounted) }}</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-dollar"></i>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-4">
            <div class="small-box bg-info">
                <div class="inner">
                    <h4><b>Avance</b></h4>
                    <h3 align="center"><b>{{ number_format($countAdvance, 2) }}%</b></h3>
                </div>
                <div class="icon">
                    <i class="fa fa-dollar"></i>
                </div>
            </div>
        </div>
    </div>
@endsection
