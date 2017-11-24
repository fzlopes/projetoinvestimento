<label class="{{ $class ?? null }}">
	<span>{{ $label ?? $input ?? "Erro" }}</span>
	{!! Form::password($input, $attributes) !!}
</label>