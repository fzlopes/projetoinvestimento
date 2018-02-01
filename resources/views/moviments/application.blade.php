@extends('templates.master')

@section('conteudo-view')
	{!! Form::open(['route' => 'group.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.select', ['label' => 'Grupo', 'select' => 'group_id', 'data' => $groups ?? [] , 'attributes' => ['placeholder' => 'Grupo']])
		@include('templates.formulario.select', ['label' => 'Produto', 'select' => 'product_id', 'data' => $products ?? [] , 'attributes' => ['placeholder' => 'Produto']])
		@include('templates.formulario.input', ['label' => 'Valor', 'input' => 'name' , 'attributes' => ['placeholder' => 'Valor']])
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])
	{!! Form::close() !!}
@endsection