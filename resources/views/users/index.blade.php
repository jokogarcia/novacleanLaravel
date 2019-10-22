@extends('layouts.novaclean')

@section('content')
<?php

$userAuth = \App\User::with("UserRole")->find(auth()->id());

if ($userAuth->UserRole->role != "ADMIN") {
   abort(403);
}
?>
<div class="container">
    <section id="dashboard">
        <table class="table">
            <tr>
                <th>Usuario</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
            
            @forelse (\App\User::orderBy('user_role_id')->get() as $user)
                <tr>
                    <td> <a href="/users/{{$user->id}}">
                            {{ $user->last_name.", ".$user->name }}
                        </a>
                    </td>
                    <td>{{$user->UserRole->role}}</td>
                    <td>
                        <a href="/users/{{$user->id}}/edit">editar</a> | 
                        <a href="/users/{{$user->id}}">ver</a> 
                    </td>
                </tr>
            @empty
                <p>No hay usuarios</p>
            @endforelse
        </table>
    </section>

</div>
@endsection
