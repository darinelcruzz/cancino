@extends('lte.root')

@push('pageTitle', 'Checklist | Lista')

@section('content')
    <div class="row">
        @foreach ($checklists as $checklist)
            <div class="col-lg-4 col-md-6">
                <div class="small-box bg-{{ $checklist->color }}">
                    <div class="inner">
                        <h3 align="center"><b>{{ $checklist->result * 5 }}</b></h3>
                        <h4 align="center">{{ fdate($checklist->date, 'd/M/Y', 'Y-m-d') }}</h4>
                        <h4 align="center">{{ $checklist->checker }}</h4>
                    </div>
                    <div class="icon">
                        <i class="fa fa-tasks"></i>
                    </div>
                    <a href="{{ 'detalles/' . $checklist->id }}" class="small-box-footer">
                        Detalles <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
