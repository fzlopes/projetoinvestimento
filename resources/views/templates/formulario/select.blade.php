<label class="{{ $class ?? null }}">
	<span>{{ $label ?? $select ?? "Erro" }}</span>
	{!! Form::select($select, $data ?? []) !!}
</label>