@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
	
	@if(session('success'))
		<h3>{{ session('success')['messages'] }}</h3>
	@endif

	{!! Form::open(['route' => 'user.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.input', ['label' => 'CPF', 'input' => 'cpf' , 'attributes' => ['placeholder' => 'CPF']])
		@include('templates.formulario.input', ['label' => 'Nome do Usuário', 'input' => 'name' , 'attributes' => ['placeholder' => 'Nome do Usuário']])
		@include('templates.formulario.input', ['label' => 'Telefone', 'input' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
		@include('templates.formulario.input', ['label' => 'E-mail', 'input' => 'email', 'attributes' => ['placeholder' => 'E-mail']])
		@include('templates.formulario.password', ['label' => 'Senha', 'input' => 'password', 'attributes' => ['placeholder' => 'Senha']])
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])
	{!! Form::close() !!}

	<table class="default-table">
		<thead>
			<tr>
				<td>#</td>
				<td>CPF</td>
				<td>Nome</td>
				<td>Telefone</td>
				<td>Nascimento</td>
				<td>E-mail</td>
				<td>Status</td>
				<td>Permissão</td>
				<td>Ações</td>
			</tr>
		</thead>
		<tbody>
		    @foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->cpf }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->phone }}</td>
				<td>{{ $user->birth }}</td>
				<td>{{ $user->email }}</td>
				<td>{{ $user->status }}</td>
				<td>{{ $user->permission }}</td>
				<td>
					{!! Form::open(['route' => ['user.destroy', $user->id], 'method' => 'DELETE']) !!}
					{!! Form::submit('Remover') !!}
					{!! Form::close() !!}	
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection