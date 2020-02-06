<label class="{{ $class ?? null }}">
    <span>{{ $input }}</span>
    {!! Form::date($input, $value ?? null, $attributes) !!}
</label>
