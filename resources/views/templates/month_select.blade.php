{!! Form::open(['method' => 'post', 'route' => $route]) !!}
    <div class="input-group input-group-sm">
        <input type="month" name="date" class="form-control" value="{{ $date }}">
        <span class="input-group-btn">
            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-search"></i></button>
        </span>
    </div>
{!! Form::close() !!}