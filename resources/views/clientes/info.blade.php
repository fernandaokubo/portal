@extends('layouts.principal')

@section('titulo','Info Clientes')

@section('conteudo')

<h3>Informações do Cliente</h3>

<p>ID: {{$cliente['id']}}</p>
<p>Nome: {{$cliente['nome']}}</p>

<br>

<a href="{{route('clientes.index')}}">Voltar ao Menu</a>

@endsection