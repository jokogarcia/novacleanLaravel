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
    <label class="label text-black" for ="frecuency">Frecuencia</label>
    <div class="control">
        <select name='frecuency'>
            <option value ='1' @if(old('frecuency') == 1) SELECTED @endif >Una vez por mes</option>
            <option value ='2' @if(old('frecuency') == 2) SELECTED @endif >Quincenal</option>
            <option value ='3' @if(old('frecuency') == 3) SELECTED @endif >Tres veces por mes</option>
            <option value ='4' @if(old('frecuency') == 4) SELECTED @endif >Semanal</option>
            <option value ='5' @if(old('frecuency') == 5) SELECTED @endif >Cinco veces por mes</option>
            <option value ='6' @if(old('frecuency') == 6) SELECTED @endif >Seis veces por mes</option>
            <option value ='7' @if(old('frecuency') == 7) SELECTED @endif >Siete veces por mes</option>
            <option value ='8' @if(old('frecuency') == 8) SELECTED @endif >Dos veces por semana</option>
            <option value ='12' @if(old('frecuency') == 12) SELECTED @endif >Tres veces por semana</option>
            <option value ='16' @if(old('frecuency') == 16) SELECTED @endif >Cuatro veces por semana</option>
            <option value ='20' @if(old('frecuency') == 20) SELECTED @endif >Lunes a Viernes</option>
            <option value ='24' @if(old('frecuency') == 24) SELECTED @endif >Lunes a Sábado</option>
            <option value ='30' @if(old('frecuency') == 30) SELECTED @endif >Lunes a Domingo</option>
            
        </select>
        @error('frecuency')
        <p class='help is-danger'>
            {{$errors->first('frecuency')}}
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
