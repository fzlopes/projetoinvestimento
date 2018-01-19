<table class="default-table">
		<thead>
			<tr>
				<td>#</td>
				<td>Nome da Produto</td>
				<td>Descrição</td>
				<td>Indexador</td>
				<td>Taxa de Juros</td>
				<td>Ações</td>
			</tr>
		</thead>
		<tbody>
		    @forelse($institution->products as $product)
			<tr>
				<td>{{ $product->id }}</td>
				<td>{{ $product->name }}</td>
				<td>{{ $product->description }}</td>
				<td>{{ $product->index }}</td>
				<td>{{ $product->interest_rate}}</td>
				<td>
				  <a href="{{ route('institution.edit', $institution->id)}}">Editar</a>
				</td>
				<td>
					{!! Form::open(['route' => ['institution.product.destroy', $institution->id, $product->id], 'method' => 'DELETE']) !!}
					{!! Form::submit('Remover') !!}
					{!! Form::close() !!}	
					
				</td>
			</tr>
			@empty
			<tr>
				<td>Nada cadastrado</td>
			</tr>
			@endforelse
		</tbody>
</table>