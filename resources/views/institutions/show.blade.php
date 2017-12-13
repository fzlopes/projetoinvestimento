@extends('templates.master')

@section('css-view')
@endsection

@section('js-view')
@endsection

@section('conteudo-view')
<header>
    <h1>Instituição: {{ $institution->name }}</h1>  
</header> 

@include('groups.list', ['groups' => $institution->groups])

@endsection