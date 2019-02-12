@extends('layouts.base')

@section('title', 'Produto')

@section('content')

<div class="container table-list" style="height: 300px;">

    <div class="card border-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Produto</div>
        <div class="card-body text-success">
            <p class="card-text">
                <b>Id: </b> {{ $produto->id }} <br>
                <b>Descrição: </b> {{ $produto->descricao }} <br>
                <b>Preço: </b> R$ {{ number_format($produto->preco, 2, ',', '.') }} <br>
                <b>Marca: </b> <a href="{{ route('marcas.show', $produto->marca_id)}}">{{ $produto->marca->nome }} </a> <br>
                <b>Fabricante: </b> <a href="{{ route('fabricantes.show', $produto->fabricante_id)}}">{{ $produto->fabricante->nome }}</a>
            </p>
        </div>
    </div>
</div>

@endsection