@extends('layouts.base')

@section('title', 'Marca')

@section('content')

<div class="container table-list">

    <div class="heading">
        <i class="fa fa-square"></i> Lista de Marcas
        <a style="float: right;" href="{{ route('marcas.create')}}" class="btn btn-success btn-sm">Cadastrar</a>
    </div>
    <table class="table" id="table-marcas">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th>Consultar</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($marcas as $marca)
                <tr>
                    <td>{{ $marca->id }}</td>
                    <td>{{ $marca->nome }}</td>
                    <td style="width: 30px;"><a href="{{ route('marcas.show', $marca->id)}}" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a></td>
                    <td style="width: 30px;"><a href="{{ route('marcas.edit', $marca->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td style="width: 30px;">
                        <form action="{{ route('marcas.destroy', $marca->id)}}" method="post">
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
        $('#table-marcas')
            .DataTable({bAutoWidth: false,
                        "aoColumns": [null,
                                        null,
                                        null,
                                        null,
                                        null
                                    ],
                        "aaSorting": [],
                        select: {
                            style: 'multi'
                        }
                    });
    });
</script>

@endsection

