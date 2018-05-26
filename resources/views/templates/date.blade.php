{!! Form::open(['method' => 'POST', 'route' => 'sales.deposit']) !!}
  <div class="input-group input-group-sm">
      <input type="hidden" name="id" value="{{ $sale->id }}">
      <input type="hidden" name="status" value="despositado">
      <input type="date" name="date_deposit" required>
      <span class="input-group-btn">
        <button type="submit" class="btn btn-success btn-flat btn-xs">
            <i class="fa fa-check"></i>
        </button>
      </span>
  </div>
{!! Form::close() !!}
