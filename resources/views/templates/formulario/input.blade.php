<label class="{{ $class ?? null }}">
	<span>{{ $label ?? $input ?? "Erro" }}</span>
	{!! Form::text($input, $value ?? null, $attributes) !!}
</label>