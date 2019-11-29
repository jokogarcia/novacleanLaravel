@extends('layouts.novaclean')

@section('content')
<?php

$userAuth = \App\User::with("UserRole")->find(auth()->id());
 if ($userAuth->UserRole->role != "ADMIN") {
    dd("abort(403)");
}
$currentAfip = old('condicion_afip_id')==null ? 7 : old('condicion_afip_id');
$altaDefault = old('employee_start_date')==null ? date('Y-m-d') : old('employee_start_date');


?>

<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Crear Empleado</h2></div>
                </div>
                <div class="col-md-4">
    <form action="/users" method="POST" enctype="multipart/form-data">
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
            <label class="label text-black" for ="role">Role</label>
            <div class="control">
                <select name="user_role_id">
                    <option value="3" selected>Empleado</option>
                    <option value="4">Supervisor</option>
                    <option value="5">Administrador</option>
                </select>
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
                  type="email"
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
        @component('components.city_selector',['selected_city_id' => old('city_id')]) @endcomponent
        <script type="text/javascript" src="/js/cuit_builder.js"></script>
        <script type="text/javascript">
            function makeCuit(){
                var dni = document.getElementsByName("dni")[0].value;
                var sexo = document.querySelector('input[name="gender"]:checked').value
                var cuit = get_cuil_cuit(dni,sexo);
                document.getElementsByName("cuit")[0].value=cuit;
            }
        </script>
        <div class="form-group">
            <label class="label text-black" for ="dni">DNI</label>
            <div class="control">
                <input name="dni"
                  class="input wide @error('dni') is-error @enderror"
                  onchange="makeCuit()"
                  value="{{old('dni')}}"
                />
                @error('dni')
                <p class='help is-danger'>
                    {{$errors->first('dni')}}
                </p>
                @enderror
            </div>
        </div>
        <input type="radio" id="genderm" name="gender" onchange="makeCuit()" value="HOMBRE" />
        <label for="genderm">Masculino</label>
        <input type="radio" id="genderf" name="gender" onchange="makeCuit()" value="MUJER" />
        <label for="genderf">Femenino</label>
        <input type="radio" id="genderp" name="gender" onchange="makeCuit()" value="SOCIEDAD" />
        <label for="genderp">Persona Jurídica</label>

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
        @component('components.condicion_afip_id_selector',['currentSelectedValue' => $currentAfip])) @endcomponent

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
        <div class="form-group">
            <label class="label text-black" for ="birth_date">Fecha de Nacimiento</label>
            <div class="control">
                <input name="birth_date"
                  type='date'
                  class="input wide @error('birth_date') is-error @enderror"
                  value="{{old('birth_date')}}"
                />
                @error('birth_date')
                <p class='help is-danger'>
                    {{$errors->first('birth_date')}}
                </p>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label class="label text-black" for ="employee_start_date">Fecha de alta</label>
            <div class="control">
                <input name="employee_start_date"
                  type='date'
                  class="input wide @error('employee_start_date') is-error @enderror"
                  value="{{$altaDefault}}"
                />
                @error('employee_start_date')
                <p class='help is-danger'>
                    {{$errors->first('employee_start_date')}}
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
