@extends('layouts.base')

@section('title', 'Marca')

@section('content')

<div class="container table-list" style="height: 300px;">

    <div class="card border-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Marca</div>
        <div class="card-body text-success">
            <p class="card-text">
                <b>Id: </b> {{ $marca->id }} <br>
                <b>Nome: </b> {{ $marca->nome }}
            </p>
        </div>
    </div>
</div>

@endsection