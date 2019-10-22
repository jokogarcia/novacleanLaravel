@extends('layouts.novaclean')

@section('content')
<?php
$user = \App\User::with("UserRole")->find(auth()->id());
//dd($user);
?>
<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Panel de Usuario</h2></div>
                    <h4><a href='/users/{{auth()->id()}}'>Curriculum Vitae</a></h4>
                </div>
                <div class="col-md-4">
                    <h3>{{$user->name}} {{$user->last_name}}</h3>
                    <p><strong>{{$user->UserRole->role}}</strong></p>
                    @if($user->employee_start_date)
                        <p><strong>Fecha de inicio: </strong>{{$user->employee_start_date}}</p>
                    @endif
                    <p><strong>Email</strong> {{$user->email}}</p>
                    <p><strong>DNI</strong> {{$user->dni}}</p>
                    <p><strong>CUIT</strong> {{$user->cuit}}</p>
                    
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    

                    ¡Estas logueado!
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>
                            <a href="users/{{$user->id}}/edit">Edit</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@if(auth()->user()->UserRole->role=="ADMIN" || auth()->user()->UserRole->role=="SUPERVISOR")
<hr>
<section id="admin">
    <ul class="nav navbar-nav menu">
        <li><a href="/clients">Clientes</a></li>
        <li><a href="/locations">Lugares</a></li>
        <li><a href="/complaints">Reclamos</a></li>
        <li><a href="/employees">Empleados</a></li>
        <li><a href="/postulants">Postulantes</a></li>
        <li><a href="/requests">Solicitudes</a></li>
    </ul>
</section>
@endif
</div>
@endsection
