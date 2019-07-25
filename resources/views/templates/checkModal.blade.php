<modal id="{{ $stores->where('store_id', $store_id)->pluck('id')->pop() }}" title="Obervaciones">
    {!! Form::open(['method' => 'POST', 'route' => 'sales.check']) !!}
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                {!! Field::text('observations', ['tpl' => 'lte/withicon'], ['icon' => 'money']) !!}
            </div>
        </div>
        <hr>
        <input type="hidden" name="status" value="revisado">
        <input type="hidden" name="id" value="{{ $stores->where('store_id', $store_id)->pluck('id')->pop() }}">
        {!! Form::submit('Revisado', ['class' => 'btn btn-success pull-right']) !!}

    {!! Form::close() !!}
</modal>
