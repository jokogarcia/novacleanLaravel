<?php

$selected_city_id = $selected_city_id == null ? Auth()->user()->city_id : $selected_city_id;
$selectedCity = App\City::find($selected_city_id);
?>
<div class="form-group">
    <div class="control">
        <label class="label text-black" for ="province">Provincia</label>
        <select id='provinceSelector' onChange='updateCitySelector(this.value)'>
        <option></option> <!-- Default blank option -->
        @foreach(App\Province::all() as $province)
        <option value='{{$province->id}}' @if($selectedCity->province_id == $province->id) SELECTED @endif >
            {{$province->name}}
        </option>
        @endforeach
        </select>
        
    </div>
    <div class='control'>
        <label class="label text-black" for ="city">Localidad</label>
        <select id='citySelector' name = 'city_id'>
        </select>
    </div>
</div>
<script type='text/javascript'>
function updateCitySelector(province_id){
    current = {{$selectedCity->id}};
    var cities = [@foreach(\App\Province::all() as $province)
        [{{$province->id}},[
                @foreach($province->Cities as $city)
                    [{{$city->id}},'{{$city->name}}'],
                @endforeach ]],
        @endforeach ]; 
    citySelector = document.getElementById('citySelector');
    citySelector.innerHTML = "";
    var p = parseInt(province_id)-1;
    thisProvince = cities[p][1];
    console.log(thisProvince);
    for(var i=0; i<thisProvince.length; i++)
    {
        var option=document.createElement("option");
            option.innerHTML=thisProvince[i][1];
            option.value=thisProvince[i][0];
            if(thisProvince[i][0] == current)
                option.selected = true;
            citySelector.appendChild(option);
    }
}
updateCitySelector({{$selectedCity->province_id}});


</script>
