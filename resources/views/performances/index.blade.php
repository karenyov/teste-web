@extends('layouts.base')

@section('title', 'Performance')

@section('content')

<div class="container table-list">
    <div class="heading">
        <i class="fa fa-area-chart"></i> Veja abaixo os seus Produtos com o percentual de diferença entre a média do seu preço de seus concorrentes
        <a style="float: right;" href="{{ route('performances.create')}}" class="btn btn-success btn-sm">Cadastrar</a>
    </div>

    <table class="table" id="table-performances">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Produto</th>
                <th scope="col">Fabricante</th>
                <th scope="col">Marca</th>
                <th scope="col">Incidência</th>
                <th scope="col">Vitória</th>
                <th scope="col">Nossa Média</th>
                <th scope="col">Média Concorrência</th>
                <th scope="col">Diferença</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td style="width: 30px;"><a href="" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a></td>
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        $('#table-performances')
            .DataTable({bAutoWidth: false,
                        "aoColumns": [null,
                                        null,
                                        null,
                                        null,
                                        null,
                                        null,
                                        null,
                                        null,
                                        null, null
                                    ],
                        "aaSorting": [],
                        select: {
                            style: 'multi'
                        },
                        dom: 'Bfrtip',
                        buttons: [
                            'csv', 'excel', 'pdf'
                        ],
                    });
    });
</script>

@endsection