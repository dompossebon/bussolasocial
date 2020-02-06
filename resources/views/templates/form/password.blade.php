<label class="{{ $class ?? null }}">
    <span>{{ $input }}</span>
    {!! Form::password($input, $value ?? null, $attributes) !!}
</label>
