@extends('layouts.base')

@section('title', 'Performance')

@section('content')

<div class="container table-list" style="height: 300px;">

    <div class="card border-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Performance</div>
        <div class="card-body text-success">
            <p class="card-text">
                <b>Produto: </b> <a href="{{ route('produtos.show', $performance->produto_id)}}"> {{ $performance->produto }} </a> <br>
                <b>Marca: </b> <a href="{{ route('marcas.show', $performance->marca_id)}}">{{ $performance->marca }} </a> <br>
                <b>Fabricante: </b> <a href="{{ route('fabricantes.show', $performance->fabricante_id)}}">{{ $performance->fabricante }}</a>
                <b>Vitória: </b> {{ $performance->vitoria }} <br>
                <b>Nossa Média: </b> R$ {{ number_format($performance->nossa_media, 2, ',', '.') }} <br>
                <b>Média Concorrência: </b> R$ {{ number_format($performance->media_concorrencia, 2, ',', '.') }} <br>
            </p>
        </div>
    </div>
</div>

@endsection