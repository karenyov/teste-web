@extends('layouts.base')

@section('title', 'Fabricante')

@section('content')

<div class="container table-list">

    <div class="heading">
        <i class="fa fa-user"></i> Lista de Fabricantes
        <a style="float: right;" href="{{ route('fabricantes.create')}}" class="btn btn-success btn-sm">Cadastrar</a>
    </div>
    <table class="table" id="table-fabricantes">
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
            @foreach ($fabricantes as $fabricante)
                <tr>
                    <td>{{ $fabricante->id }}</td>
                    <td>{{ $fabricante->nome }}</td>
                    <td style="width: 30px;"><a href="{{ route('fabricantes.show', $fabricante->id)}}" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a></td>
                    <td style="width: 30px;"><a href="{{ route('fabricantes.edit', $fabricante->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a></td>
                    <td style="width: 30px;">
                        <form action="{{ route('fabricantes.destroy', $fabricante->id)}}" method="post">
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
        $('#table-fabricantes')
            .DataTable({
                        bAutoWidth: false,
                         "aoColumns": [
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