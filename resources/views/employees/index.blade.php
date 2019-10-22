@extends('layouts.novaclean')

@section('content')

<div class="container">
    <section id="dashboard">
        <table class="table">
            <tr>
                <th>Cliente</th>
                <th>Tipo</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
            </tr>
            
            @forelse (\App\User::where('user_role_id','>','2')->get() as $user)
                <tr>
                    <td> <a href="/users/{{$user->id}}">
                            {{ $user->last_name.", ".$user->name }}
                        </a>
                    </td>
                    <td>{{$user->UserRole->role}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>
                        <a href="/users/{{$user->id}}/edit">editar</a> | 
                        <a href="/users/{{$user->id}}">ver</a> 
                    </td>
                </tr>
            @empty
                <p>No hay clientes</p>
            @endforelse
        </table>
    </section>

</div>
@endsection
