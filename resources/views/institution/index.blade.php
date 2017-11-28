@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
	
	@if(session('success'))
		<h3>{{ session('success')['messages'] }}</h3>
	@endif

	{!! Form::open(['route' => 'institution.store', 'method' => 'post', 'class' => 'form-padrao']) !!}
		@include('templates.formulario.input', ['label' => 'name', 'input' => 'name' , 'attributes' => ['placeholder' => 'Nome']])
		@include('templates.formulario.submit', ['input' => 'Cadastrar'])
	{!! Form::close() !!}

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
					{!! Form::open(['route' => ['institution.destroy', $institution->id], 'method' => 'DELETE']) !!}
					{!! Form::submit('Remover') !!}
					{!! Form::close() !!}	
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	
@endsection