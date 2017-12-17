@extends('templates.master')

@section('conteudo-view')

<header>
    <h1>Nome do grupo: {{ $group->name }}</h1> 
    <h2>Instituição: {{ $group->institution->name}} </h2> 
    <h2>Responsável:{{ $group->user->name}} </h2>
</header> 

    @if(session('success'))
		<h3>{{ session('success')['messages'] }}</h3>
	@endif

	{!! Form::open(['route' => ['group.user.store', $group->id], 'method' => 'post', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.select', ['label' => 'Usuário', 'select' => 'user_id', 'data' => $users , 'attributes' => ['placeholder' => 'Usuário']])
		@include('templates.formulario.submit', ['input' => 'Relacionar'])
	{!! Form::close() !!}

	@include('users.list', ['users' => $group->users])

@endsection