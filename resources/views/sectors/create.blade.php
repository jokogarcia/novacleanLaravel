@extends('layouts.novaclean')

@section('content')
<?php $location_id = request('location_id');?>
<div class="container">
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="title"><h2>Crear Sector en {{App\Location::find($location_id)->name}}</h2></div>
                </div>
                <div class="col-md-4">
                    <form action="/sectors" method="POST">
                        @csrf
                        <input type='hidden' name='location_id' value='{{$location_id}}'>
<div class="form-group">
    <label class="label text-black" for ="name">Nombre</label>
    <div class="control">
        <input name="name"
          type='text'
          class="input wide @error('name') is-error @enderror"
          required
          value="{{old('name')}}"
        />
        @error('name')
        <p class='help is-danger'>
            {{$errors->first('name')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="description">Descripcion</label>
    <div class="control">
        <input name="description"
          type='text'
          class="input wide @error('description') is-error @enderror"
          value="{{old('description')}}"
        />
        @error('description')
        <p class='help is-danger'>
            {{$errors->first('description')}}
        </p>
        @enderror
    </div>
</div>


<div class="form-group">
    <label class="label text-black" for ="area">Superficie</label>
    <div class="control">
        <input name="area"
          type='number'  step='0.01'
          class="input wide @error('area') is-error @enderror"
          value="{{old('area')}}"
        />
        @error('area')
        <p class='help is-danger'>
            {{$errors->first('area')}}
        </p>
        @enderror
    </div>
</div>



                        

                        <input type="submit" value="Crear"/>


                        
                        
                    </form>
                </div>
                    
               
            </div>
        </div>
    </section>

</div>
@endsection
