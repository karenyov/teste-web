<div class="row">
    <a href="{{ route('marcas.show', $marca->id)}}" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a>
    <a style="margin-left: 3px; margin-right: 3px;" href="{{ route('marcas.edit', $marca->id)}}" class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o"></i></a>
    <form action="{{ route('marcas.destroy', $marca->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash-o"></i></button>
    </form>
</div>