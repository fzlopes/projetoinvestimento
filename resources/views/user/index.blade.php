@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')

	{!! Form::open(['method' => 'post', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.input', ['label' => 'cpf', 'input' => 'cpf' , 'attributes' => ['placeholder' => 'CPF']])
		@include('templates.formulario.input', ['label' => 'name', 'input' => 'name' , 'attributes' => ['placeholder' => 'Nome']])
		@include('templates.formulario.input', ['label' => 'phone', 'input' => 'phone', 'attributes' => ['placeholder' => 'Telefone']])
		@include('templates.formulario.input', ['label' => 'email', 'input' => 'email', 'attributes' => ['placeholder' => 'E-mail']])
		@include('templates.formulario.password', ['input' => 'password', 'attributes' => ['placeholder' => 'Senha']])
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])
	{!! Form::close() !!}
	
@endsection