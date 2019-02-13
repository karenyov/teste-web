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
                <th>Ações</th>
            </tr>
        </thead>
    </table>

</div>

<script>
    $(document).ready(function () {
        $('#table-marcas')
            .DataTable({
                serverSide: true,
                processing: true,
                responsive: true,
                bAutoWidth: false,
                ajax: "{{ route('marca_datatables_data') }}",
                        columns: [
                            { name: 'id' },
                            { name: 'nome' },
                            { name: 'action', orderable: false, searchable: false }
                        ],
            });
    });
</script>

@endsection

