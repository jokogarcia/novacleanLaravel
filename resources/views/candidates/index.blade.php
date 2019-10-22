@extends('layouts.novaclean')

@section('content')
<?php
function getAge($birthDate){
    $datetime1 = new DateTime($birthDate);
    $datetime2 = new DateTime();
    $interval = $datetime2->diff($datetime1);
    return $interval->y;
}
?>
<div class="container">
    <section id="dashboard">
        <table class="table">
            <tr>
                <th>Postulante</th>
                <th>Email</th>
                <th>Domicilio</th>
                <th>Teléfono</th>
                <th>Nivel educativo</th>
                <th>Edad</th>
                <th>Acciones</th>
            </tr>
            
            @forelse (\App\User::where('user_role_id','=','1')->get() as $user)
                <tr>
                    <td> <a href="/users/{{$user->id}}">
                            {{ $user->last_name.", ".$user->name }}
                        </a>
                    </td>
                    <td>{{$user->email}}</td>
                    <td>-</td>
                    <td>{{$user->phone}}</td>
                    
                    
                    <td>
                        @if(count($user->AcademicExperiences)>0)
                        {{Log::debug('joko:'. $user->AcademicExperiences->max('academic_level_id'))}}
                        {{App\AcademicLevel::find($user->AcademicExperiences->max('academic_level_id'))->level_name}}
                        @else
                        N/A
                        @endif
                    </td>
                    <td>{{getAge($user->birth_date)}}</td>
                    <td>
                        <a href="/users/{{$user->id}}">ver</a> 
                    </td>
                </tr>
            @empty
                <p>No hay postulantes</p>
            @endforelse
        </table>
    </section>

</div>
@endsection
