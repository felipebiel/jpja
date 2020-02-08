@extends('layouts.perguntas')

@section('titulo')

@endsection

@section('content')

{{$tema}}

<br>

<a href="{{ route('painel.tema.pergunta', ['id' => $tema, 'etapa' =>$etapa]) }}">COMEÇAR</a>


@endsection