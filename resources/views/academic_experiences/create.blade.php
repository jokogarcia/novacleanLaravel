

<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
-->
@extends('layouts/novaclean')
@section('content')
<div id="page" class="container">
    <h2> Agregar experiencia académica </h2>
    <form action="/academic_experiences" method="POST">
        @csrf
        <div class="form-group">
            <label class="label text-black" for ="school_name">Escuela / Institución</label>
            <div class="control">
                <input name="school_name"
                       class="input wide @error('school_name') is-error @enderror"
                       required
                       value="{{old('school_name')}}"
                       />
                @error('school_name')
                <p class='help is-danger'>
                    {{$errors->first('school_name')}}
                </p>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label class="label text-black" for ="career">Carrera</label>
            <div class="control">
                <input name="career"
                       class="input wide @error('career') is-error @enderror"
                       value="{{old('career')}}"
                       />
            </div>
        </div>
        
        <div class="form-group">
            <label class="label text-black" for ="academic_level_id">Nivel</label>
            <div class="control">
                <select name="academic_level_id">
                    @foreach(App\AcademicLevel::all() as $academicLevel)
                    <option value ="{{$loop->index+1}}"
                            @if($loop->index == old('academic_level_id'))
                            selected 
                            @endif >
                            {{$academicLevel->level_name}}
                    </option>
                    @endforeach
                </select>
<!--                <input name="academic_level_id"
                       type="number"
                       class="input wide @error('career') is-error @enderror"
                       required
                       value="{{old('academic_level')}}"
                />-->
                @error('academic_level_id') <p class='help is-danger'>{{$errors->first('academic_level_id')}}</p> @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label class="label text-black" for ="started_at">Fecha de inicio</label>
            <div class="control">
                <input  name="started_at"
                        type="date"
                        class="input wide"
                       required
                       value = "{{old('started_at')}}"
                />
                @error('started_at') <p class='help is-danger'>{{$errors->first('started_at')}}</p> @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label class="label text-black" for ="finished_at">Fecha de finalización (dejar en blanco si está incompleta)</label>
            <div class="control">
                <input class="input wide"
                       type="date"
                       name="finished_at"
                       value="{{old('finished_at')}}"/>
            </div>
        </div>
        <div class="form-group">
            <div class="control">    
                <label class="label text-black" for ="is_current">Está cursando actualmente</label>
            
                <input class="input"
                       type="checkbox"
                       name="is_current"
                       value="1"
                       <?php
                        if(old('is_current')=='1'){
                            echo "checked";
                        }
                       ?>
                       />
            </div>
        </div>
        <div class="form-group">
            <div class="control">    
                <input class="input" type="submit" value="Enviar"/> 
            </div>
        </div>
        
        
    </form>
    
</div>


@endsection