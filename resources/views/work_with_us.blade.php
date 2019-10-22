@extends('layouts.novaclean')

@section('subtitle')
@endsection

@section('content')
<?php
$mainText ="";
if(auth()->user()==null){
    $mainText = "<p class='tcn_text'>En NovaClean estamos siempre a la espectativa de incorporar nuevos talentos a
    nuestros equipos. Si estás interesado, tomate unos minutos para dejarnos tu 
    información, así podremos contactarte cuando existan oportunidades.</p>
<p class='tcn_text'> Creá un nuevo usuario en nuestro sistema, con tu nombre y correo electrónico
    para poder empezar. O, si ya tenés un usuario, podés <a href='#login'>
        ingresar más abajo</a></p>";

}
 elseif (auth()->user()->tcn_state == 0 || auth()->user()->tcn_state == null) {
     auth()->user()->update(['tcn_state'=>0]);
     $mainText="<p class='tcn_text'>¡Ya estás registrado en nuestro sistema! Por favor, completa"
             . " tus datos personales para continuar el proceso.</p>";
    
}
else {
     
     $mainText="<p class='tcn_text'>Tu perfil de usuario está completo. Terminá tu"
             . "currículum cargando tu historial académico y tu experiencia "
             . "laboral en tu perfil.Podés agregar ítemes y editarlos cuando lo"
             . " necesites.</p>"
             . "<p class='tcn_text'><a href='/home'>Ir a mi perfil</a></p>";
    
}
?>

<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="title" style="margin-bottom: 50px;margin-top:65px"><h1>Trabaja con nosotros</h1></div>
            <div class="row">
                <p style="text-align: center"><img src="images/teamwork.jpg" style="width:800px"></p>
            </div>
<div class="container">
    {!!$mainText!!}
</div>

        </div>
    </section>
@if(auth()->user() == null)
    <hr class='separator'/>
    <div class="row">
        <div class="col-md-4">
            <div class="title"><h2>Registrarse</h2></div>
        </div>
        <div class='col-md-2'>
            @component('components.register',['redirectTo' => 'work_with_us' ])
            @endcomponent
        </div>
    </div>

<hr class='separator'/>
<a name='login'></a>
<div class="row">
        <div class="col-md-4">
            <div class="title"><h2>Iniciar sesión</h2></div>
        </div>
        <div class='col-md-2'>
            @component('components.login',['redirectTo'=>'work_with_us'])
            @endcomponent
        </div>
    </div>

@elseif(auth()->user()->tcn_state == 0 || auth()->user()->tcn_state == null)
 <hr class='separator'/>
    <div class="row">
        <div class="col-md-4">
            <div class="title"><h2>Datos Personales</h2></div>
        </div>
       
        @component('components.editUser',['user'=>auth()->user(),'redirectTo'=>'work_with_us'])
        @endcomponent

    </div>
@endif
</div>
@endsection
