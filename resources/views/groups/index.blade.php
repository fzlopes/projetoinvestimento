@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
	
	@if(session('success'))
		<h3>{{ session('success')['messages'] }}</h3>
	@endif

	{!! Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.input', ['label' => 'Nome do grupo', 'input' => 'name' , 'attributes' => ['placeholder' => 'Nome do grupo']])
		@include('templates.formulario.input', ['label' => 'Usuário', 'input' => 'user_id' , 'attributes' => ['placeholder' => 'Usuário']])
		@include('templates.formulario.input', ['label' => 'Instituição', 'input' => 'institution_id' , 'attributes' => ['placeholder' => 'Instituição']])
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])
	{!! Form::close() !!}

	<table class="default-table">
		<thead>
			<tr>
				<td>#</td>
				<td>Nome do Grupo</td>
				<td>Usuário</td>
				<td>Instituição</td>
				<td>Ações</td>
			</tr>
		</thead>
		<tbody>
		    @foreach($groups as $group)
			<tr>
				<td>{{ $group->id }}</td>
				<td>{{ $group->name }}</td>
				<td>{{ $group->user_id }}</td>
				<td>{{ $group->institution_id }}</td>
				<td>
					{!! Form::open(['route' => ['group.destroy', $group->id], 'method' => 'DELETE']) !!}
					{!! Form::submit('Remover') !!}
					{!! Form::close() !!}	
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection