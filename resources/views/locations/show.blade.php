@extends('layouts.novaclean')

@section('content')

<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Sitio de limpieza</h2></div>
                </div>
                <div class="col-md-4">
                    <h3>{{$location->name}}</h3>
                     <p><strong>Cliente: </strong>
                        <a href='/users/{{$location->client_id}}'>
                            {{$location->Client->name}} {{$location->Client->last_name}}
                        </a></p>
                        <p><strong>Provincia: </strong>{{$location->City->Province->name}} <strong>Ciudad:</strong> {{$location->City->name}}</p>
                    <p><strong>Dirección: </strong>
                        {{$location->fullAddress()}}
                    </p>
                   
                    <p><strong>Latitud</strong> {{$location->latitude}}<strong style="margin-left: 25px">Longitud</strong> {{$location->longitude}}</p>
                    <p><strong>Contacto local:</strong></p>
                    <p style="margin-left: 25px">{{$location->local_contact_name}}</p>
                    <p style="margin-left: 25px"><strong>Email: </strong><a href='mailto:{{$location->local_contact_email}}'>{{$location->local_contact_email}}</a></p>
                    <p style="margin-left: 25px"><strong>Teléfono</strong><a href='tel:{{$location->local_contact_phone}}'>{{$location->local_contact_phone}}</a></p>
                    <p><strong>Contrato número</strong> {{$location->contract_number}}</p>
                    <p><strong>Supervisor: </strong>
                        <a href='/users/{{$location->supervisor_id}}'>
                            {{$location->Supervisor->name}} {{$location->Supervisor->last_name}}
                        </a></p>
                    
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>
                            <a href="/locations/{{$location->id}}/edit">Editar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <section id='sectors'>
        <hr>
        <div class='container'>
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Sectores</h2>
                    <a href='/sectors/create?location_id={{$location->id}}'><i class="fa fa-magic" aria-hidden="true"></i></a></div>
                </div>
            </div>
                
                @forelse($location->Sectors as $sector)
                <div class="row">
                    <div class="col-md-2">
                        <div class="title"><h3>{{$sector->name}} </h3></div>
                        <a href="/sectors/{{$sector->id}}/edit">
                            <i class="fa fa-pencil" aria-hidden="true"></i>
                        </a>
                        @component('components.deleteLink',['route' => 'sectors', 'id'=>$sector->id]) @endcomponent
                        
                        
                    </div>
                    <div class="col-md-8">
                        <a name='sector{{$sector->id}}'/>
                        
                            <span style="margin-left:50px">
                                <p>{{$sector->description}}</p>
                            </span>
                        <div>
                            <p><strong>Tareas</strong></p>
                            @if(count ($sector->Tasks) > 0)
                            <table class='table'>
                                <thead><th>Descripción</th><th>Duración</th><th></th></thead>
                                @foreach($sector->Tasks as $task)
                                <tr>
                                    <td><a href='/tasks/{{$task->id}}'>{{$task->description}}</a></td>
                                <td>{{$task->duration}}</td>
                                <td><a href='/tasks/{{$task->id}}/edit'> <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                @component('components.deleteLink',['route' => 'tasks', 'id'=>$task->id]) @endcomponent
                                </td>
                                </tr>

                                @endforeach

                            </table>
                            @else
                            <p>Sin tareas</p>
                            @endif
                            <p><a href='/tasks/create?sector_id={{$sector->id}}'><i class="fa fa-magic" aria-hidden="true"></i> Agregar tarea </a></p>
                        </div>
                    </div>
                        <div class="col-md-2">
                            
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
                        <p></p>
                    </div>
                </div>
            </div>
           
        </div>
    </section>
     <section id='Eventos'>
        <hr>
        <div class='container'>
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Visitas programadas</h2></div>
                    <a href='/visit_events/create/?location_id={{$location->id}}'><i class="fa fa-magic" aria-hidden="true"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h4>Todos los eventos</h4></div>
                </div>
            </div>
            @forelse($location->VisitEvents as $ve)
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h4>{{$ve->Days()}}</h4></div>
                </div>
                <div class="col-md-8">
                    <p><strong>Hora: </strong>{{$ve->starts_at}}</p><p><strong>Duración: </strong>{{$ve->duration}}</p>
                </div>
                <div class="col-md-2">
                    <a href="/visit_events/{{$ve->id}}">
                        <i class="fa fa-eye" aria-hidden="true"></i> 
                    </a>
                    <a href="/visit_events/{{$ve->id}}/edit">
                        <i class="fa fa-pencil" aria-hidden="true"></i> 
                    </a>
                    @component('components.deleteLink',['route' => 'visit_events', 'id'=>$ve->id]) @endcomponent
                </div>
            </div>
            <hr/>
            @empty
            <p>Sin eventos programados</p>
            @endforelse
        </div>
     </section>
    

</div>
@endsection
