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
            @foreach ($performances as $performance)
                <tr>
                    <td>{{ $performance->produto_id }}</td>
                    <td>{{ $performance->produto }}</td>
                    <td>{{ $performance->fabricante }}</td>
                    <td>{{ $performance->marca }}</td>
                    <td>{{ $performance->incidencia }}</td>
                    <td>{{ $performance->vitoria }}</td>
                    <td>R$ {{ number_format($performance->nossa_media, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format($performance->media_concorrencia, 2, ',', '.') }}</td>
                    <td style="text-align: center; padding:10px;">
                        <h5>
                            @if ($performance->diferenca >= 0)
                                <span style="padding:5px; color: white; background-color: #60c560">
                            @elseif ($performance->diferenca < 0 && $performance->diferenca >= -20)        
                                <span style="padding:5px; color: white; background-color: #FFD700">
                            @else
                                <span style="padding:5px; color: white; background-color: #FF0000">
                            @endif
                                <strong>{{ $performance->diferenca }}%</strong>
                            </span>
                        </h5>
                    </td>
                    <td style="width: 30px;"><a href="{{ route('performances.show', $performance->produto_id)}}" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a></td>
                </tr>
            @endforeach
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