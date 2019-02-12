@extends('layouts.base')

@section('title', 'Performance')

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
        <form class="col-10" action="{{ route('performances.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="produto_id">Produto</label>
                <select class="form-control" name="produto_id">
                    <option value="">Selecione o Produto</option>
                    @foreach ($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->descricao }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="preco_concorrencia">Preço Concorrência</label>
                <input type="text" class="form-control" placeholder="Preço Concorrência" name="preco_concorrencia" id="preco">
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
</div>

<script>
    $(function() {
        $('#preco').maskMoney({
            decimal: ",",
            thousands: "."
        });
    })
</script>

@endsection