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
                       <a href="/users/{{$user->id}}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> | 
                        <a href="/users/{{$user->id}}"><i class="fa fa-eye" aria-hidden="true"></i></a>  |
                        @component('components.deleteLink',['route' => 'users', 'id'=>$user->id]) @endcomponent
                        
                    </td>
                </tr>
            @empty
                <p>No hay empleados</p>
            @endforelse
        </table>
    </section>

</div>
@endsection
