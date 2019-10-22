@extends('layouts.novaclean')

@section('content')

<div class="container">
    <section id="dashboard">
        <table class="table">
            <tr>
                <th>Nombre</th>
                <th>Cliente</th>
                <th>Acción</th>
            </tr>
            
            @forelse (\App\Location::orderBy('client_id')->get() as $location)
                <tr>
                    <td> <a href="/locations/{{$location->id}}">
                            {{ $location->name}}
                        </a>
                    </td>
                    <td><a href='/users/{{$location->Client->id}}'>{{$location->Client->name}} {{$location->Client->last_name}}</a></td>
                    <td>
                        <a href="/locations/{{$location->id}}/edit">editar</a> | 
                        <a href="/locations/{{$location->id}}">ver</a> 
                    </td>
                </tr>
            @empty
                <p>No hay resultados</p>
            @endforelse
        </table>
    </section>

</div>
@endsection
