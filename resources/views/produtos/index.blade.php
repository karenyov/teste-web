@extends('layouts.base')

@section('title', 'Produto')

@section('content')

<div class="container table-list">

    <div class="heading">
        <i class="fa fa-shopping-cart"></i> Lista de Produtos
        <a style="float: right;" href="{{ route('produtos.create')}}" class="btn btn-success btn-sm">Cadastrar</a>
    </div>
    <table class="table" id="table-produtos">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descrição</th>
                <th scope="col">Marca</th>
                <th scope="col">Fabricante</th>
                <th>Consultar</th>
                <th >Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produtos as $produto)
                <tr>
                    <td>{{ $produto->id }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->marca->nome }}</td>
                    <td>{{ $produto->fabricante->nome }}</td>
                    <td style="width: 30px;"><a href="{{ route('produtos.show', $produto->id)}}" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a></td>
                    <td style="width: 30px;"><a href="{{ route('produtos.edit', $produto->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td style="width: 30px;">
                        <form action="{{ route('produtos.destroy', $produto->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-o"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</div>

<script>
    $(document).ready(function () {
        $('#table-produtos')
            .DataTable({
                        bAutoWidth: false,
                        "aoColumns": [
                                        null,
                                        null,
                                        null,
                                        null,
                                        null, 
                                        null, 
                                        null],
                        "aaSorting": [],
                        select: {
                            style: 'multi'
                        }
                    });
    });
</script>

@endsection