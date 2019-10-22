

<!--/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
-->
@extends('layouts/novaclean')
@section('content')

<div id="page" class="container">
    <h2> Agregar experiencia laboral</h2>
    <form action="/work_experiences" method="POST">
        @csrf
        
        <div class="form-group">
            <label class="label text-black" for ="company_name">Empresa</label>
            <div class="control">
                <input name="company_name"
                  class="input wide @error('company_name') is-error @enderror"
                  required
                  value="{{old('company_name')}}"
                />
                @error('company_name')
                <p class='help is-danger'>
                    {{$errors->first('company_name')}}
                </p>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label class="label text-black" for ="position">Puesto</label>
            <div class="control">
                <input name="position"
                  class="input wide @error('position') is-error @enderror"
                  required
                  value="{{old('position')}}"
                />
                @error('position')
                <p class='help is-danger'>
                    {{$errors->first('position')}}
                </p>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label class="label text-black" for ="started_at">Fecha de ingreso</label>
            <div class="control">
                <input name="started_at"
                  class="input wide @error('started_at') is-error @enderror"
                  type='date'
                  required
                  value="{{old('started_at')}}"
                />
                @error('started_at')
                <p class='help is-danger'>
                    {{$errors->first('started_at')}}
                </p>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label class="label text-black" for ="finished_at">Fecha de salida</label>
            <div class="control">
                <input name="finished_at"
                       type='date'
                  class="input wide @error('finished_at') is-error @enderror"
                  value="{{old('finished_at')}}"
                />
                @error('finished_at')
                <p class='help is-danger'>
                    {{$errors->first('finished_at')}}
                </p>
                @enderror
            </div>
        </div>


        <div class="form-group">
            <label class="label text-black" for ="is_current_job">Trabaja aquí actualmente</label>
            <div class="control">
                <input name="is_current_job"
                  class="input @error('is_current_job') is-error @enderror"
                  type="checkbox"
                  value="1"
                  @if(old('is_current_job')) checked @endif
                />
                @error('is_current_job')
                <p class='help is-danger'>
                    {{$errors->first('is_current_job')}}
                </p>
                @enderror
            </div>
        </div>


        <div style="border-style:solid; border-width:1px; padding:50px">
            <p>Contacto de referencia (opcional)</p>
            <div class="form-group">
            <label class="label text-black" for ="reference_name">Nombre</label>
            <div class="control">
                <input name="reference_name"
                  class="input wide @error('reference_phone') is-error @enderror"
                  value="{{old('reference_name')}}"
                />
                @error('reference_name')
                <p class='help is-danger'>
                    {{$errors->first('reference_name')}}
                </p>
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label class="label text-black" for ="reference_email">Email</label>
            <div class="control">
                <input name="reference_email"
                  class="input wide @error('reference_phone') is-error @enderror"
                  type="email"
                  value="{{old('reference_email')}}"
                />
                @error('reference_name')
                <p class='help is-danger'>
                    {{$errors->first('reference_email')}}
                </p>
                @enderror
            </div>
        </div>
        
        <div class="form-group">
            <label class="label text-black" for ="reference_phone">Teléfono</label>
            <div class="control">
                <input name="reference_phone"
                  class="input wide @error('reference_phone') is-error @enderror"
                  value="{{old('reference_phone')}}"
                  type="tel"
                />
                @error('reference_name')
                <p class='help is-danger'>
                    {{$errors->first('reference_phone')}}
                </p>
                @enderror
            </div>
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