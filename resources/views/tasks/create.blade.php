@extends('layouts.novaclean')

@section('content')
<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Editar tarea</h2></div>
                </div>
                <div class="col-md-4">
                    <form action="/tasks" method="POST">
                        @csrf

<input type='hidden' name='sector_id' value='{{request('sector_id')}}'/>


<div class="form-group">
    <label class="label text-black" for ="duration">Duración</label>
    <div class="control">
        <input name="duration"
          type='time'
          class="input wide @error('duration') is-error @enderror"
          required
          value="{{old('duration')}}"
        />
        @error('duration')
        <p class='help is-danger'>
            {{$errors->first('duration')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="frequency">Frecuencia</label>
    <div class="control">
        <select name='frequency'>
            <option value ='1' @if(old('frequency') == 1) SELECTED @endif >Una vez por mes</option>
            <option value ='2' @if(old('frequency') == 2) SELECTED @endif >Quincenal</option>
            <option value ='3' @if(old('frequency') == 3) SELECTED @endif >Tres veces por mes</option>
            <option value ='4' @if(old('frequency') == 4) SELECTED @endif >Semanal</option>
            <option value ='5' @if(old('frequency') == 5) SELECTED @endif >Cinco veces por mes</option>
            <option value ='6' @if(old('frequency') == 6) SELECTED @endif >Seis veces por mes</option>
            <option value ='7' @if(old('frequency') == 7) SELECTED @endif >Siete veces por mes</option>
            <option value ='8' @if(old('frequency') == 8) SELECTED @endif >Dos veces por semana</option>
            <option value ='12' @if(old('frequency') == 12) SELECTED @endif >Tres veces por semana</option>
            <option value ='16' @if(old('frequency') == 16) SELECTED @endif >Cuatro veces por semana</option>
            <option value ='20' @if(old('frequency') == 20) SELECTED @endif >Lunes a Viernes</option>
            <option value ='24' @if(old('frequency') == 24) SELECTED @endif >Lunes a Sábado</option>
            <option value ='30' @if(old('frequency') == 30) SELECTED @endif >Lunes a Domingo</option>
            
        </select>
        @error('frequency')
        <p class='help is-danger'>
            {{$errors->first('frequency')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="description">Descripción</label>
    <div class="control">
        <input name="description"
          type='text'
          class="input wide @error('description') is-error @enderror"
          required
          value="{{old('description')}}"
        />
        @error('description')
        <p class='help is-danger'>
            {{$errors->first('description')}}
        </p>
        @enderror
    </div>
</div>


                        

                        <input type="submit" value="Crear tarea"/>


                        
                        
                    </form>
                </div>
                    
               
            </div>
        </div>
    </section>

</div>
@endsection
