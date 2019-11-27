@extends('layouts.novaclean')

@section('content')
<?php 
$defaultCity = old('city_id') ?? \App\User::find(request('user_id'))->first()->city_id;
?>
<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Crear Sitio de limpieza</h2></div>
                </div>
                <div class="col-md-4">
                    <form action="/locations" method="POST">
                        @csrf
                        <input type='hidden' name='client_id' value='{{request('user_id')}}'/>
<div class="form-group">
    <label class="label text-black" for ="name">Nombre</label>
    <div class="control">
        <input name="name"
          type='text'
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

@component('components.city_selector',['selected_city_id' => $defaultCity]) @endcomponent
<div class="form-group">
    <label class="label text-black" for ="address_street_name">Calle</label>
    <div class="control">
        <input name="address_street_name"
          type='text'
          class="input wide @error('address_street_name') is-error @enderror"
          required
          value="{{old('address_street_name')}}"
        />
        @error('address_street_name')
        <p class='help is-danger'>
            {{$errors->first('address_street_name')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="address_street_number">Número</label>
    <div class="control">
        <input name="address_street_number"
          type='number'
          class="input wide @error('address_street_number') is-error @enderror"
          required
          value="{{old('address_street_number')}}"
        />
        @error('address_street_number')
        <p class='help is-danger'>
            {{$errors->first('address_street_number')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="address_appartment">Piso</label>
    
        <input name="address_floor"
          type='number'
          class="input @error('address_appartment') is-error @enderror"
          style='width:50px'
          value="{{old('address_floor')}}"
        />
        @error('address_floor')
        <p class='help is-danger'>
            {{$errors->first('address_floor')}}
        </p>
        @enderror
        
    <label class="label text-black" for ="address_appartment">Departamento</label>
    
        <input name="address_appartment"
          type='text'
          size='2'
          class="input @error('address_appartment') is-error @enderror"
          
          value="{{old('address_appartment')}}"
        />
        @error('address_appartment')
        <p class='help is-danger'>
            {{$errors->first('address_appartment')}}
        </p>
        @enderror
    
        
</div>


<div class="form-group">
    <label class="label text-black" for ="latitude">Latitud</label>
    <div class="control">
        <input name="latitude"
          type='number'
          class="input wide @error('latitude') is-error @enderror"
          
          value="{{old('latitude')}}"
        />
        @error('latitude')
        <p class='help is-danger'>
            {{$errors->first('latitude')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="longitude">Longitud</label>
    <div class="control">
        <input name="longitude"
          type='number'
          class="input wide @error('longitude') is-error @enderror"
          
          value="{{old('longitude')}}"
        />
        @error('longitude')
        <p class='help is-danger'>
            {{$errors->first('longitude')}}
        </p>
        @enderror
    </div>
</div>

 <p><strong>Contacto de referencia</strong></p>
<div title='Contacto de Referencia' style='margin-left: 50px'>
<div class="form-group">
    <label class="label text-black" for ="local_contact_name">Nombre</label>
    <div class="control">
        <input name="local_contact_name"
          type='text'
          class="input wide @error('local_contact_name') is-error @enderror"
          required
          value="{{old('local_contact_name')}}"
        />
        @error('local_contact_name')
        <p class='help is-danger'>
            {{$errors->first('local_contact_name')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="local_contact_email">Email</label>
    <div class="control">
        <input name="local_contact_email"
          type='email'
          class="input wide @error('local_contact_email') is-error @enderror"
          
          value="{{old('local_contact_email')}}"
        />
        @error('local_contact_email')
        <p class='help is-danger'>
            {{$errors->first('local_contact_email')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="local_contact_phone">Teléfono</label>
    <div class="control">
        <input name="local_contact_phone"
          type='tel'
          class="input wide @error('local_contact_phone') is-error @enderror"
          
          value="{{old('local_contact_phone')}}"
        />
        @error('local_contact_phone')
        <p class='help is-danger'>
            {{$errors->first('local_contact_phone')}}
        </p>
        @enderror
    </div>
</div>
</div>

<div class="form-group">
    <label class="label text-black" for ="contract_number">Número de contrato</label>
    <div class="control">
        <input name="contract_number"
          type='number'
          class="input wide @error('contract_number') is-error @enderror"
          
          value="{{old('contract_number')}}"
        />
        @error('contract_number')
        <p class='help is-danger'>
            {{$errors->first('contract_number')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="supervisor_id">Supervisor</label>
    <div class="control">
        <select name='supervisor_id'>
            required
            @foreach(App\User::all() as $user)
            @if($user->UserRole->role == "SUPERVISOR")
            <option value="{{$user->id}}"
                    @if(old('supervisor_id') == $user->id) SELECTED @endif
                    >
                {{$user->name}} {{$user->last_name}}
            </option>
            @endif
            @endforeach
        </select>

        @error('supervisor_id')
        <p class='help is-danger'>
            {{$errors->first('supervisor_id')}}
        </p>
        @enderror
    </div>
</div>
                        

                        <input type="submit" value="Enviar Cambios"/>


                        
                        
                    </form>
                </div>
                    
               
            </div>
        </div>
    </section>

</div>
@endsection
