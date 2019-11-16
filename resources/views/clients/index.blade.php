@extends('layouts.novaclean')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<div class="container">
    <section id="dashboard">
        <a href="/clients/create">Cargar nuevo cliente</a>
        <table class="table" id="sortable">
            <tr>
                <th>Cliente <a href="#" onClick="sortTable('sortable',0)">^</a></th>
                <th>Email </th>
                <th>Domicilio</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            
            @forelse (\App\User::where('user_role_id','=','2')->get() as $user)
                <tr>
                    <td> <a href="/users/{{$user->id}}">
                            {{ $user->last_name.", ".$user->name }}
                        </a>
                    </td>
                    <td>{{$user->email}}</td>
                    <td>-</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        <a href="/users/{{$user->id}}/edit">editar</a> | 
                        <a href="/users/{{$user->id}}">ver</a>  |
                        <form action="/users/{{$user->id}}" method="POST">@csrf  {{method_field('DELETE')}} <input type="hidden" value="/clients" name="redirectTo"/><button type="submit">Eliminar</button></form>
                    </td>
                </tr>
            @empty
                <p>No hay clientes</p>
            @endforelse
        </table>
    </section>

</div>
@endsection
<script>

</script>
