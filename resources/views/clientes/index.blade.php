@extends('layouts.principal')

@section('titulo','Clientes')

@section('conteudo')
    
<h3>{{$titulo}}</h3>
<a href="{{route('clientes.create')}}">Adicionar Novo Cliente</a>

@if (count($clientes)>0)
    <ul>
        @foreach ($clientes as $c)
            <li>
                {{$c['id']}} |
                {{$c['nome']}} |
                <a href="{{route('clientes.edit', $c['id'])}}">Editar</a> |
                <a href="{{route('clientes.show', $c['id'])}}">Info</a> |
                <form action="{{route('clientes.destroy', $c['id'])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Excluir">
                </form>
            </li>
        @endforeach
    </ul>
    
    <hr>

    @for($i=0;$i<10;$i++)
        {{$i}}
    @endfor
    
    <hr>

    @for($i=0;$i<count($clientes);$i++)
        {{$clientes[$i]['nome']}}<br>
    @endfor

    <hr>

    @foreach ($clientes as $c)
        <p>
            {{$c['nome']}}

            {{-- PARA VERIFICAR SE É O PRIMEIRO ELEMENTO --}}
            @if($loop->first)
                (primeiro)
            @endif

            {{-- PARA VERIFICAR SE É O ÚLTIMO ELEMENTO --}}
            @if($loop->last)
                (último)
            @endif

            {{-- ÍNDICE --}}
            ({{$loop->index}}) | 
            
            {{-- INTERAÇÃO --}}
            {{$loop->iteration}} /
            {{-- TOTAL --}}
            {{$loop->count}}
        </p>
    @endforeach

@else
    <h4>Não existem clientes cadastrados</h4>
@endif


{{-- 
    O "EMPTY" faz o papel do "ELSE", ou seja, se a variável $clientes estiver vazia, vai aparecer essa mensagem.
    @empty($clientes)
        <h4>Não existem clientes cadastrados</h4>
    @endempty 
--}}

@endsection
