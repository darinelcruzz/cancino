@extends('lte.root')

@push('pageTitle', 'Conteos')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <color-box color="primary" title="Conteos">
                <a href="{{ route('count.export') }}" class="btn btn-xs btn-success">
                    DESCARGAR &nbsp;&nbsp;<i class="fa fa-file-download"></i>
                </a>

                <hr>

                <data-table example="1">
                    {{ drawHeader('código', 'ubicación', 'usuario', 'fecha y hora', 'cantidad') }}
                    <template slot="body">
                        @foreach($counts as $count)
                            <tr>
                                <td>{{ $count->product->code }}</td>
                                <td>{{ $count->location->name }}</td>
                                <td>{{ $count->user->name }}</td>
                                <td>{{ $count->created_at->format('d/m/Y | h:i:s a') }}</td>
                                <td>{{ $count->quantity }}</td>
                            </tr>
                        @endforeach
                    </template>
                </data-table>
            </color-box>
        </div>
    </div>
@endsection
