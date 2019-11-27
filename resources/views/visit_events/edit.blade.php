@extends('layouts.novaclean')

@section('content')
<?php 
$location = \App\Location::find($visitEvent->location_id);
$sectors = $location->Sectors;

?>
<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Crear Evento de visita</h2></div>
                </div>
                <div class="col-md-8">
                    <form action="/visit_events/{{$visitEvent->id}}" method="POST" onSubmit="attachSelectedTasks()">
                        @csrf
                        @method('patch')

                        <input type='hidden' name='location_id' value='{{$location->id}}'/>
                        <input type="hidden" name="taskList" id="taskList"/>
                        <div class="form-group">
                            <label class="label text-black" for ="name">Es visita periódica</label>
                            <div class="control">
                                <input name="repeats"
                                       type='checkbox'
                                       @if($visitEvent->repeats)
                                       checked
                                       @endif
                                       id="repeats_checkbox"
                                       onchange="repeatChanged()"
                                       />
                            </div>
                        </div>

                        <div class="form-group" id='repeats_true'>
                            <label class="label text-black" for ="days">Dias</label>
                            <div class="control">
                                <input name="monday"
                                       @if($visitEvent->monday)
                                       checked
                                       @endif
                                       type='checkbox'
                                       class="input"> Lunes</input>
                                <input name="tuesday"
                                       type='checkbox'
                                       @if($visitEvent->tuesday)
                                       checked
                                       @endif
                                       class="input"> Martes</input>
                                <input name="wednesday"
                                       @if($visitEvent->wednesday)
                                       checked
                                       @endif
                                       type='checkbox'
                                       class="input"> Miércoles</input>
                                <input name="thursday"
                                        @if($visitEvent->thursday)
                                       checked
                                       @endif
                                       type='checkbox'
                                       class="input"> Jueves</input>
                                <input name="friday"
                                        @if($visitEvent->friday)
                                       checked
                                       @endif
                                       type='checkbox'
                                       class="input"> Viernes</input>
                                <input name="saturday"
                                        @if($visitEvent->saturday)
                                       checked
                                       @endif
                                       type='checkbox'
                                       class="input"> Sábado</input>
                                <input name="sunday"
                                        @if($visitEvent->sunday)
                                       checked
                                       @endif
                                       type='checkbox'
                                       class="input"> Domingo</input>

                            </div>
                            <label class="label text-black" for ="date">Fecha Inicial</label>
                        </div>
                        <div class="form-group" id="repeats_false">
                            <label class="label text-black" for ="date">Fecha</label>
                        </div>
                        <div>
                            <div class="control">
                                <input name="date"
                                       type='date'
                                       required
                                       class="input @error('date') is-error @enderror"
                                       value="{{$visitEvent->date}}"
                                       />
                                @error('date')
                                <p class='help is-danger'>
                                    {{$errors->first('date')}}
                                </p>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="label text-black" for ="starts_at">Hora de inicio</label>

                            <input name="starts_at"
                                   type='time'
                                   class="input @error('starts_at') is-error @enderror"
                                   value="{{$visitEvent->starts_at}}"
                                   />
                            @error('starts_at')
                            <p class='help is-danger'>
                                {{$errors->first('starts_at')}}
                            </p>
                            @enderror

                            <label class="label text-black" for ="duration">Duración</label>

                            <input name="duration"
                                   type='time'
                                   class="input @error('duration') is-error @enderror"

                                   value="{{$visitEvent->duration}}"
                                   />
                            @error('duration')
                            <p class='help is-danger'>
                                {{$errors->first('duration')}}
                            </p>
                            @enderror
                        </div>
                        <input type="submit" value="Crear"/>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Tareas</h2></div>
                </div>
            </div>
            @foreach($sectors as $sector)
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h4>{{$sector->name}}</h4></div>
                </div>
            </div>
            @foreach($sector->Tasks as $task)
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h4>&nbsp</h4></div>
                </div>
                <div class="col-md-4">
                    <p>{{$task->description}}</p>
                </div>
                <div class="col-md-4">
                    <input type="checkbox" name="selectedTasks"
                           @if($visitEvent->HasTask($task))
                           checked
                           @endif
                           value="{{$task->id}}">
                </div>

            </div>
            <hr/>

            @endforeach    

        @endforeach


</div>
<script type="text/javascript">
function attachSelectedTasks(){
    var selectedTasks = document.getElementsByName("selectedTasks");
    var tasksArray= [];
    for(var i=0;i<selectedTasks.length;i++){
        if(selectedTasks[i].checked)
            tasksArray.push(selectedTasks[i].value);
    }
    document.getElementById('taskList').value=tasksArray.join(",");
}
function repeatChanged(){
    var showTrue=document.getElementById('repeats_true');
    var showFalse = document.getElementById('repeats_false');
    if(document.getElementById('repeats_checkbox').checked){
        showTrue.style.display='block';
        showFalse.style.display='none';
    }
    else{
         showTrue.style.display='none';
        showFalse.style.display='block';
    }

}
repeatChanged();
</script>
@endsection
