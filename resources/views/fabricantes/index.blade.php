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
                <th>Ações</th>
            </tr>
        </thead>
    </table>

</div>

<script>
    $(document).ready(function () {
        $('#table-fabricantes')
            .DataTable({
                serverSide: true,
                processing: true,
                responsive: true,
                bAutoWidth: false,
                ajax: "{{ route('fabricante_datatables_data') }}",
                        columns: [
                            { name: 'id' },
                            { name: 'nome' },
                            { name: 'action', orderable: false, searchable: false }
                        ],
            });
    });
</script>

@endsection