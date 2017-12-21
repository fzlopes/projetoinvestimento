@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
	
	@if(session('success'))
		<h3>{{ session('success')['messages'] }}</h3>
	@endif

	{!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-padrao']) !!}
		@include('users.form-fields')
		@include('templates.formulario.submit', ['input' => 'Editar'])
	{!! Form::close() !!}

@endsection