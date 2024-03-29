<div id="field_{{ $id }}" {!! Html::classes(['form-group', 'has-error' => $hasErrors]) !!}>
    <label for="{{ $id }}" class="col-sm-3 control-label">
        {{ $label }}
    </label>
    
    @if ($required)
        <span class="label label-info">Required</span>
    @endif

    <div class="col-sm-9">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-{{ $icon }}"></i></span>
            {!! $input !!}
        </div>
        @foreach ($errors as $error)
            <p class="help-block">{{ $error }}</p>
        @endforeach
    </div>
</div>
