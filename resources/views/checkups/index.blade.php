@extends('lte.root')

@push('pageTitle')
    Arqueo
@endpush

@section('content')
    <div class="row">
        <div class="col-md-12">

          <color-box color="primary" title="Arqueos">
            
            <table class="table table-striped table-bordered spanish">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Saldo</th>
                </tr>
              </thead>

              <tbody>
                @foreach($checkups as $checkup)
                  <tr>
                    <td>{{ $checkup->created_at->format('d-M-Y') }}</td>
                    <td>$ {{ number_format($checkup->amount, 2) }}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </color-box>

        </div>
    </div>

@endsection
