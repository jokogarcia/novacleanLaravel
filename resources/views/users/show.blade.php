@extends('layouts.novaclean')

@section('content')

<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Usuario</h2></div>
                    <div class=""><img class='userPhoto' src="{{$user->getPhotoURL()}}"/></div>
                </div>
                <div class="col-md-4">
                    <h3>{{$user->name}} {{$user->last_name}}</h3>
                    <p><strong>{{$user->UserRole->role}}</strong></p>
                    <p><strong>Provincia: </strong>{{$user->City->Province->name}} <strong>Ciudad:</strong> {{$user->City->name}}</p>
                    @if($user->employee_start_date)
                        <p><strong>Fecha de inicio: </strong>{{$user->employee_start_date}}</p>
                    @endif
                    <p><strong>Email</strong> {{$user->email}}</p>
                    <p><strong>DNI</strong> {{$user->dni}}</p>
                    <p><strong>CUIT</strong> {{$user->cuit}}</p>
                    
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>
                            <a href="/users/{{$user->id}}/edit">Editar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    @if($user->UserRole->role == "EMPLOYEE" || $user->UserRole->role == "GUEST")
    <section id='resume'>
        <hr>
        <div class='container'>
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Antecendentes académicos</h2></div>
                </div>
            </div>
                
            @forelse($user->AcademicExperiences as $ae)
            <div class="row">
                <div class="col-md-2">
                    <div class="title"><h2>&nbsp;</h2></div>
                </div>
                <div class="col-md-8">
                <p><strong>Institución: </strong>{{$ae->school_name}}
                    <span style="margin-left:50px">
                        <strong>Nivel: </strong> {{$ae->AcademicLevel->level_name}}
                    </span>
                </p>
                <p><strong>Carrera: </strong>{{$ae->career}}</p>
                <p><strong>Fecha de inicio: </strong>{{$ae->started_at}}
                    @if($ae->is_current)
                         (en curso)
                    @else
                </p><p><strong>Fecha de finalización: </strong>{{$ae->finished_at}}
                    @endif
                </p>
                </div>
                <div class="col-md-2">
                    <a href="/academic_experiences/{{$ae->id}}/edit">
                        <i class="fa fa-pencil" aria-hidden="true"></i>Editar
                    </a>
                </div>
            </div>
            <hr>

            @empty
            <p>Sin datos</p>
            @endforelse
            <div class="row">
               <div class="col-md-2">
                   <div class="title"><h2>&nbsp;</h2></div>
               </div>
               <div class="col-md-8">
                   <p><a href='/academic_experiences/create'>Agregar nuevo</a></p>
               </div>
           </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Experiencia laboral</h2></div>
                </div>
            </div>
                
            @forelse($user->WorkExperiences as $we)

            <div class="row">
                <div class="col-md-2">
                    <div class="title"><h2>&nbsp;</h2></div>
                </div>
                <div class="col-md-8">
                <p><strong>Empresa: </strong>{{$we->company_name}}</p>
                <p><strong>Puesto: </strong> {{$we->position}} </p>

                <p><strong>Referencia: </strong>{{$we->reference_name}} 
                    <br><strong style="margin-left: 70px">email: </strong>{{$we->reference_email}}
                    <br><strong style="margin-left: 70px">teléfono: </strong>{{$we->reference_phone}}</p>
                <p><strong>Fecha de inicio: </strong>{{$we->started_at}}
                    @if($we->is_current_job)
                         (actualidad)
                    @else
                     </p><p><strong>Fecha de finalización: </strong>{{$we->finished_at}}
                    @endif
                </p>
                </div>
                <div class="col-md-2">
                    <a href="/work_experiences/{{$we->id}}/edit">
                        <i class="fa fa-pencil" aria-hidden="true"></i>Editar
                    </a>
                </div>
            </div>
            <hr>

            @empty
            <p>Sin datos</p>
            @endforelse
            <div class="row">
                <div class="col-md-2">
                    <div class="title"><h2>&nbsp;</h2></div>
                </div>
                <div class="col-md-8">
                    <p><a href='/work_experiences/create'>Agregar nueva</a></p>
                </div>
            </div>

    </section>
    @elseif($user->UserRole->role == "CLIENT")
    <section id='locations'>
        <hr>
        <div class='container'>
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Sitios de limpieza</h2></div>
                </div>
            </div>
            <div class="col-md-2">
                   <div class="title"><h2>&nbsp;</h2></div>
               </div>
               <div class="col-md-8">    
                @forelse($user->Locations as $location)
                <a href='/locations/{{$location->id}}'<h3>{{$location->name}}</h3></a>
                <p style='margin-left:25px'>{{$location->fullAddress()}}</p>

                @empty
                <p>Sin datos</p>
                @endforelse
               </div>
            <div class="row">
               <div class="col-md-2">
                   <div class="title"><h2>&nbsp;</h2></div>
               </div>
               <div class="col-md-8">
                   <p><a href='/locations/create?user_id={{$user->id}}'>Agregar nuevo</a></p>
               </div>
           </div>
            </div>
            

    </section>
    @elseif($user->UserRole->role == "SUPERVISOR")
    @elseif($user->UserRole->role == "ADMIN")
    <section name ="admin_menu">
        <ul>
            <li><a href="/clients">Clientes</a></li>
            <li><a href="/employees">Empleados</a></li>
            <li><a href="/candidates">Postulantes</a></li>
            <li><a href="/complaints">Reclamos</a></li>
            <li><a href="/requests">Solicitudes</a></li>
          
        </ul>
    </section>
    @endif
</div>

            
@endsection
