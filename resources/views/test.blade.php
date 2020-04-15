@extends('lte.root')
@push('pageTitle')
    Prueba
@endpush

@section('content')

    <div class="row">
        <div class="col-md-12">
            <color-box title="Prueba" color="success">
                <form class="" action="{{ route('sales.store')}}" method="post">
                    @php
                        $employers = ['Darix' => 0, 'Vic' => 1, 'Kikin' => 2];
                        $columns = ['employer_id', 'goal_id', 'week', 'goal'];
                    @endphp
                    {{ csrf_field() }}
                    <div>
                        @foreach ($employers as $employer => $value)
                            {{ $employer }}
                            @foreach ([0,1,2,3,4] as $key)
                                <input type="number" name="sellers[{{ $value }}][{{ $key }}][goal]" value="0">
                                <input type="hidden" name="sellers[{{ $value }}][{{ $key }}][week]" value="{{ $key + 1}}">
                                <input type="hidden" name="sellers[{{ $value }}][{{ $key }}][goal_id]" value="{{ $value }}">
                                <input type="hidden" name="sellers[{{ $value }}][{{ $key }}][employer_id]" value="{{ $employer }}">
                            @endforeach
                            <br>
                        @endforeach
                    </div>
                    <button type="submit" name="button">Para que se vea</button>
                </form>
            </color-box>
        </div>
    </div>

@endsection
