<table class="default-table">
		<thead>
			<tr>
				<td>#</td>
				<td>Nome do Grupo</td>
				<td>Nome do Responsável</td>
				<td>Instituição</td>
				<td>Ações</td>
			</tr>
		</thead>
		<tbody>
		    @foreach($groups as $group)
			<tr>
				<td>{{ $group->id }}</td>
				<td>{{ $group->name }}</td>
				<td>{{ $group->user->name }}</td>
				<td>{{ $group->institution->name }}</td>
				<td>
					<a href="{{ route('group.edit', $group->id)}}">Editar</a>
				</td>
				<td>
					{!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']) !!}
					{!! Form::submit('Remover') !!}
					{!! Form::close() !!}	
				</td>
				<td>
					<a href="{{ route('group.show', $group->id) }}">Detalhes</a>
				</td>
			</tr>
			@endforeach
		</tbody>
</table>