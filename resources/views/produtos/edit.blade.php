@extends('layouts.base')

@section('title', 'Produto')

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
        <form class="col-10" action="{{ route('produtos.update', $produto->id) }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <input type="text" class="form-control" placeholder="Descrição" name="descricao" value="{{ $produto->descricao }}">
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" class="form-control" placeholder="Preço" name="preco" id="preco" value="{{ number_format($produto->preco, 2, ',', '.') }}">
            </div>
            <div class="form-group">
                <label for="marca">Marca</label>
                <select class="form-control" name="marca_id">
                    <option value="">Selecione a Marca</option>
                    @foreach ($marcas as $marca)
                        <option value="{{ $marca->id }}" {{ $marca->id == $produto->marca_id ? 'selected' : '' }}>{{ $marca->nome }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="descricao">Fabricante</label>
                <select class="form-control" name="fabricante_id">
                    <option value="">Selecione o Fabricante</option>
                    @foreach ($fabricantes as $fabricante)
                        <option value="{{ $fabricante->id }}" {{ $fabricante->id == $produto->fabricante_id ? 'selected' : '' }} >{{ $fabricante->nome }}</option>
                    @endforeach
                </select>
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