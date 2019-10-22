

<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
-->
<?php
    
if ($academicExperience->user_id != auth()->id()
         && auth()->user()->UserRole->role != "ADMIN") {
    abort(403);
}
?>
@extends('layouts/novaclean')
@section('content')

<div id="page" class="container">
    <h2> Editar experiencia académica</h2>
    <form action="/academic_experiences/{{$academicExperience->id}}" method="POST">
        @csrf
        @method('patch')
        
        <input type='hidden' name='user_id' value='{{$academicExperience->user_id}}'/>
<div class="form-group">
    <label class="label text-black" for ="school_name">Escuela / Institución</label>
    <div class="control">
        <input name="school_name"
          type='text'
          class="input wide @error('school_name') is-error @enderror"
          required
          value="{{$academicExperience->school_name}}"
        />
        @error('school_name')
        <p class='help is-danger'>
            {{$errors->first('school_name')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="academic_level_id">Nivel</label>
    <div class="control">
         <select name="academic_level_id">
                    @foreach(App\AcademicLevel::all() as $academicLevel)
                    <option value ="{{$loop->index+1}}"
                            @if($loop->index+1 == $academicExperience->academic_level_id)
                            selected 
                            @endif >
                            {{$academicLevel->level_name}}
                    </option>
                    @endforeach
         </select>
        @error('academic_level_id')
        <p class='help is-danger'>
            {{$errors->first('academic_level_id')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="started_at">Fecha de inicio</label>
    <div class="control">
        <input name="started_at"
          type='date'
          class="input wide @error('started_at') is-error @enderror"
          required
          value="{{$academicExperience->started_at}}"
        />
        @error('started_at')
        <p class='help is-danger'>
            {{$errors->first('started_at')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="finished_at">Fecha de finalización</label>
    <div class="control">
        <input name="finished_at"
          type='date'
          class="input wide @error('finished_at') is-error @enderror"
          value="{{$academicExperience->finished_at}}"
        />
        @error('finished_at')
        <p class='help is-danger'>
            {{$errors->first('finished_at')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
       <div class="control">
        <label class="label text-black" for ="is_current">Cursando actualmente</label>
        <input name="is_current"
          type='checkbox'
          class="input @error('is_current') is-error @enderror"
          value="1"
          @if ($academicExperience->is_current) checked @endif
        />
        @error('is_current')
        <p class='help is-danger'>
            {{$errors->first('is_current')}}
        </p>
        @enderror
    </div>
</div>


        
        <input type="submit" value="Enviar Cambios"/>

    </form>
    
</div>


@endsection