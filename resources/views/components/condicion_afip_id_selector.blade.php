<div class="form-group">
    <div class="control">
        <label class="label text-black" for ="condicion_afip_id">Condición frente al IVA</label>
        <select name='condicion_afip_id'>
        @foreach(App\CondicionAfip::all() as $condicion)
        <option value='{{$condicion->id}}' @if($currentSelectedValue == $condicion->id) SELECTED @endif >
            {{$condicion->description}}
        </option>
        @endforeach
        </select>
        
    </div>
    
