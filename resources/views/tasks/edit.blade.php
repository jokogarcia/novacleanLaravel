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
                    <form action="/tasks/{{$task->id}}" method="POST">
                        @csrf
                        @method('patch')

<div class="form-group">
    <label class="label text-black" for ="duration">Duración</label>
    <div class="control">
        <input name="duration"
          type='time'
          class="input wide @error('duration') is-error @enderror"
          required
          value="{{$task->duration}}"
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
            <option value ='1' @if($task->frequency == 1) SELECTED @endif >Una vez por mes</option>
            <option value ='2' @if($task->frequency == 2) SELECTED @endif >Quincenal</option>
            <option value ='3' @if($task->frequency == 3) SELECTED @endif >Tres veces por mes</option>
            <option value ='4' @if($task->frequency == 4) SELECTED @endif >Semanal</option>
            <option value ='5' @if($task->frequency == 5) SELECTED @endif >Cinco veces por mes</option>
            <option value ='6' @if($task->frequency == 6) SELECTED @endif >Seis veces por mes</option>
            <option value ='7' @if($task->frequency == 7) SELECTED @endif >Siete veces por mes</option>
            <option value ='8' @if($task->frequency == 8) SELECTED @endif >Dos veces por semana</option>
            <option value ='12' @if($task->frequency == 12) SELECTED @endif >Tres veces por semana</option>
            <option value ='16' @if($task->frequency == 16) SELECTED @endif >Cuatro veces por semana</option>
            <option value ='20' @if($task->frequency == 20) SELECTED @endif >Lunes a Viernes</option>
            <option value ='24' @if($task->frequency == 24) SELECTED @endif >Lunes a Sábado</option>
            <option value ='30' @if($task->frequency == 30) SELECTED @endif >Lunes a Domingo</option>
            
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
          value="{{$task->description}}"
        />
        @error('description')
        <p class='help is-danger'>
            {{$errors->first('description')}}
        </p>
        @enderror
    </div>
</div>


                        

                        <input type="submit" value="Enviar cambios"/>


                        
                        
                    </form>
                </div>
                    
               
            </div>
        </div>
    </section>

</div>
@endsection
