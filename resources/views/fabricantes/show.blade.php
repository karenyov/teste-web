@extends('layouts.base')

@section('title', 'Fabricante')

@section('content')

<div class="container table-list" style="height: 300px;">

    <div class="card border-success mb-3" style="max-width: 18rem;">
        <div class="card-header">Fabricante</div>
        <div class="card-body text-success">
            <p class="card-text">
                <b>Id: </b> {{ $fabricante->id }} <br>
                <b>Nome: </b> {{ $fabricante->nome }}
            </p>
        </div>
    </div>
</div>

@endsection