@extends('layouts.base')

@section('title', 'Fabricante')

@section('content')

<div class="container h-100">
    <div class="row h-100 justify-content-center align-items-center">
        @if ($errors->any())
            <div class="alert alert-danger col-10"  role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <form class="col-10" action="{{ route('fabricantes.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" placeholder="Nome" name="nome">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>

@endsection