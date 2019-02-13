<div class="row">
    <a href="{{ route('fabricantes.show', $fabricante->id)}}" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a>
    <a style="margin-left: 3px; margin-right: 3px;" href="{{ route('fabricantes.edit', $fabricante->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a>
    <form action="{{ route('fabricantes.destroy', $fabricante->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-o"></i></button>
    </form>
</div>