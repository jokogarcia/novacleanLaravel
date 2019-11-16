<?php
use Carbon\Carbon;
$id = $user->id;

$visitEvents = \App\VisitEvent::whereHas('AssignedEmployees',
            function( $queryL2) use($id){
                $queryL2->where('employee_id',$id);
            });
$nVisitEvents = $visitEvents->count();
            
$raitings = \App\Raiting::whereHas('VisitEvent',
        function($queryL1) use($id){
            $queryL1->whereHas('AssignedEmployees',
            function( $queryL2) use ($id){
                
                $queryL2->where('employee_id',$id);
            });
        });
$complaints = \App\Complaint::whereHas('VisitEvent',
        function($queryL1) use($id){
            $queryL1->whereHas('AssignedEmployees',
            function( $queryL2) use ($id){
                
                $queryL2->where('employee_id',$id);
            });
        });
$nComplaints = $complaints->count();
$nComplaintsThisMonth = $complaints->whereMonth('reference_date','=',Carbon::now()->subMonth()->month)->count();
$raitingsValueArray = $raitings->pluck('raiting')->toArray();
//Calcular promedio de raitings:
if (count($raitingsValueArray) > 0) {
    $puntaje = array_sum($raitingsValueArray) / count($raitingsValueArray) * 100 / 5;
} else {
    $puntaje = 100;
}
?>
<div class="container">
    <h3>Estadísticas </h3>
    <p><strong>Puntaje: </strong>{{$puntaje}} %</p>
    <p><strong>Quejas: </strong> {{$nComplaints}}<span style='margin-left: 100px'><strong>Quejas este mes: </strong>{{$nComplaintsThisMonth}}</span></p>
    <p><strong>Visitas Asignadas: {{$nVisitEvents}}</strong> </p>
    <p><strong>Puntualidad general: </strong> </p>
    <p><strong>Puntualidad último mes: </strong> </p>
    <p><strong>Puntualidad mes anterior: </strong> </p>
    
</div>