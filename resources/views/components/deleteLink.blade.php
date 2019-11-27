<form method='post' action='/{{$route}}/{{$id}}' onsubmit='confirm("Está apunto de borrar este recurso. Esta acción no puede deshacerse. ¿Estás seguro?")'>
    @csrf
    {{method_field('DELETE')}}
    <button style='background: none!important;border: none;padding: 0!important;
            cursor:pointer;color: #069'
            type='submit'>
        <i class="fa fa-trash" aria-hidden="true"></i>
    </button>
</form>