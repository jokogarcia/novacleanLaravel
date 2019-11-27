@extends('layouts.novaclean')

@section('content')
<?php

$userAuth = \App\User::with("UserRole")->find(auth()->id());



if($user==null){
    $user = auth()->user();
} else if ($user->id != $userAuth->id && $userAuth->UserRole->role != "ADMIN") {
    dd("abort(403)");
} else {
    $user = \App\User::with("UserRole")->find($user->id);
}
$redirectURL = "/users/$user->id";

?>
<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Editar Usuario</h2></div>
                </div>
                @component('components.editUser',['user'=>$user,'redirectTo'=>$redirectURL])
                @endcomponent
               
            </div>
        </div>
    </section>

</div>
@endsection
