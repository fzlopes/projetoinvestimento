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
		@include('templates.formulario.select', ['label' => 'Nome do Responsável', 'select' => 'user_id', 'data' => $users , 'attributes' => ['placeholder' => 'Nome do Responsável']])
		@include('templates.formulario.select', ['label' => 'Instituição', 'select' => 'institution_id', 'data' => $institutions , 'attributes' => ['placeholder' => 'Instituição']])
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])
	{!! Form::close() !!}

	@include('groups.list', $groups)
	
@endsection