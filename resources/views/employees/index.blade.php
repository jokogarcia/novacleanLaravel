@extends('layouts.novaclean')

@section('content')

<div class="container">
    <section id="dashboard">
        <a href="/employees/create">Cargar nuevo empleado</a>
        <table class="table">
            <tr>
                <th>Empleado</th>
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
                        <form action="/users/{{$user->id}}" method="POST">@csrf  {{method_field('DELETE')}} <input type="hidden" value="/employees" name="redirectTo"/><button type="submit">Eliminar</button></form>
                        
                    </td>
                </tr>
            @empty
                <p>No hay empleados</p>
            @endforelse
        </table>
    </section>

</div>
@endsection
