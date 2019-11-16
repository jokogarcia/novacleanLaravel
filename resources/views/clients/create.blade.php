@extends('layouts.novaclean')

@section('content')
<?php

$userAuth = \App\User::with("UserRole")->find(auth()->id());



 if ($userAuth->UserRole->role != "ADMIN") {
    dd("abort(403)");
}
?>
<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Crear Cliente</h2></div>
                </div>
                <div class="col-md-4">
    <form action="/users/" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label class="label text-black" for ="name">Nombre</label>
            <div class="control">
                <input name="name"
                  class="input wide @error('name') is-error @enderror"
                  required
                  value="{{old('name')}}"
                />
                @error('name')
                <p class='help is-danger'>
                    {{$errors->first('name')}}
                </p>
                @enderror
            </div>
        </div>
        <input type="hidden" value="2" name="user_role_id"/>


        <div class="form-group">
            <label class="label text-black" for ="last_name">Apellido</label>
            <div class="control">
                <input name="last_name"
                  class="input wide @error('last_name') is-error @enderror"
                  value="{{old('last_name')}}"
                />
                @error('last_name')
                <p class='help is-danger'>
                    {{$errors->first('last_name')}}
                </p>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="label text-black" for ="photo">Foto</label>
            <div class="control">
                <input name="photo" type="file"
                  class="input wide @error('photo') is-error @enderror"
                  value="{{old('photo')}}"
                />
                @error('photo')
                <p class='help is-danger'>
                    {{$errors->first('photo')}}
                </p>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label class="label text-black" for ="email">Email</label>
            <div class="control">
                <input name="email"
                  class="input wide @error('email') is-error @enderror"
                  required
                  value="{{old('email')}}"
                />
                @error('email')
                <p class='help is-danger'>
                    {{$errors->first('email')}}
                </p>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="label text-black" for ="password">Contraseña</label>
            <div class="control">
                <input name="password"
                  class="input wide @error('password') is-error @enderror"
                  required
                  value="{{old('password')}}"
                />
                @error('password')
                <p class='help is-danger'>
                    {{$errors->first('password')}}
                </p>
                @enderror
            </div>
        </div>
        @component('components.city_selector',['selected_city_id' => old('selected_city_id')]) @endcomponent

        <div class="form-group">
            <label class="label text-black" for ="dni">DNI</label>
            <div class="control">
                <input name="dni"
                  class="input wide @error('dni') is-error @enderror"
                  value="{{old('dni')}}"
                />
                @error('dni')
                <p class='help is-danger'>
                    {{$errors->first('dni')}}
                </p>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label class="label text-black" for ="cuit">CUIL / CUIT (Opcional)</label>
            <div class="control">
                <input name="cuit"
                  class="input wide @error('cuit') is-error @enderror"
                                value="{{old('cuit')}}"
                />
                @error('cuit')
                <p class='help is-danger'>
                    {{$errors->first('cuit')}}
                </p>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label class="label text-black" for ="phone">Teléfono</label>
            <div class="control">
                <input name="phone"
                  class="input wide @error('phone') is-error @enderror"
                  value="{{old('phone')}}"
                />
                @error('phone')
                <p class='help is-danger'>
                    {{$errors->first('phone')}}
                </p>
                @enderror
            </div>
        </div>

            <input type="submit" value="Crear"/>
                     
    </form>
</div>
               
            </div>
        </div>
    </section>

</div>
@endsection
