<table class="default-table">
		<thead>
			<tr>
				<td>#</td>
				<td>Nome da Instituição</td>
				<td>Ações</td>
			</tr>
		</thead>
		<tbody>
		    @foreach($institutions as $institution)
			<tr>
				<td>{{ $institution->id }}</td>
				<td>{{ $institution->name }}</td>
				<td>
				  <a href="{{ route('institution.edit', $institution->id)}}">Editar</a>
				</td>
				<td>
					{!! Form::open(['route' => ['institution.destroy', $institution->id], 'method' => 'DELETE']) !!}
					{!! Form::submit('Remover') !!}
					{!! Form::close() !!}	
					
				</td>
				<td>
					<a href="{{ route('institution.show', $institution->id )}}">Detalhes</a>	
				</td>
				<td>
					<a href="{{ route('institution.product.index', $institution->id )}}">Produtos</a>	
				</td>
			</tr>
			@endforeach
		</tbody>
</table>