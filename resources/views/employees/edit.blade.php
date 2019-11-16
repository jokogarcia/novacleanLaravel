@extends('layouts.novaclean')

@section('content')
<?php

$userAuth = \App\User::with("UserRole")->find(auth()->id());




if ($userAuth->UserRole->role != "ADMIN") {
    dd("abort(403)");
}
$employee = \App\Employee::with("User")->find($employee->id);
$user = $employee->User
?>
<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Editar Perfil de empleado</h2></div>
                </div>
                @component('components.editUser2',['user'=>$user])
                @slot('form_target')/employees/{{$employee->id}}@endslot
                <div class="form-group">
                    <label class="label text-black" for ="dni">Fecha de Inicio</label>
                    <div class="control">
                        <input name="employee_start_date"
                          class="input wide @error('employee_start_date') is-error @enderror"
                          required
                          value="{{$employee->employee_start_date}}"
                        />
                        @error('employee_start_date')
                        <p class='help is-danger'>
                            {{$errors->first('employee_start_date')}}
                        </p>
                        @enderror
                    </div>
                </div>

                @endcomponent
               <form
            </div>
        </div>
    </section>

</div>
@endsection
