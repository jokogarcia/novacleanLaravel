@extends('layouts.novaclean')

@section('content')

<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Evento de visita</h2></div>
                </div>
                <div class="col-md-4">
                    <h3>{{$visitEvent->Location->name}}</h3>
                     <p><strong>Cliente: </strong>
                        <a href='/users/{{$visitEvent->Location->client_id}}'>
                            {{$visitEvent->Location->Client->name}} {{$visitEvent->Location->Client->last_name}}
                        </a></p>
                        <h4>
                        @if($visitEvent->repeats)
                            Evento periódico. <br>Días 
                        @else
                            Evento único. <br>Fecha 
                        @endif
                        {{$visitEvent->Days()}} </h4>
                        <p>Hora: {{$visitEvent->starts_at}} .</p>
                        <p>Duración: {{$visitEvent->duration}} .</p>
                        
                        
                    
                </div>
                <div class="col-md-4">
                    <ul>
                        <li>
                            <a href="/visit_events/{{$visitEvent->id}}/edit">Editar</a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h3>Tareas programadas</h3>
                    </div>
                </div>
                <div class="col-md-4" id='tasks_div'>
                        
                    
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
            @forelse($visitEvent->Tasks as $task)
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h3>&nbsp</h3>
                    </div>
                </div>
                <div class="col-md-4" id='tasks_div'>
                    <p>{{$task->description}}</p>
                    
                </div>
                <div class="col-md-4">
                    <p>{{$task->duration}}</p>
                </div>
            </div>
            @empty
            <p>Sin Tareas</p>
            @endforelse
            
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h3>Empleados designados</h3>
                    </div>
                </div>
                <div class="col-md-4" id='tasks_div'>
                        
                    
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>
            @forelse($visitEvent->AssignedEmployees as $employee)
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h3>&nbsp</h3>
                    </div>
                </div>
                <div class="col-md-4" id='tasks_div'>
                    <p><a href='/users/{{$employee->id}}'>{{$employee->last_name}}, {{$employee->name}}</a></p>
                    
                </div>
                <div class="col-md-4">
                    <p>&nbsp</p>
                </div>
            </div>
            @empty
            <p>Sin empleados designados</p>
            @endforelse
            
        </div>
    </section>
    

</div>
@endsection
