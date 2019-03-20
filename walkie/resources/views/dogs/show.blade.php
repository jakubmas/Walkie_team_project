@extends('layouts.app')

@section('content')

<img src="{{ $dog->image }}" alt="dog-img"/>
<br>
<h2>Name: {{ $dog->name }}</h2>
<br>
<h3>Age: {{ $dog->age }}</h2>
<br>
@if($dog->sex === 0)

    <h3>Sex: Male</h2>
@else
    <h3>Sex: Female</h3>
@endif
<br>
<h3>Breed: {{ $dog->breed->name }}</h2>
<br>
<h3>Description: {{ $dog->description }}</h2>
<hr>
<button><a href="{{ action('DogController@index')}}">HOME</a></button>

<style>
    [type="date"] {
      background:#fff url(https://cdn1.iconfinder.com/data/icons/cc_mono_icon_set/blacks/16x16/calendar_2.png)  97% 50% no-repeat ;
    }
    [type="date"]::-webkit-inner-spin-button {
      display: none;
    }
    [type="date"]::-webkit-calendar-picker-indicator {
      opacity: 0;
    }
    
    /* custom styles */
    body {
      padding: 4em;
      background: #e5e5e5;
      font: 13px/1.4 Geneva, 'Lucida Sans', 'Lucida Grande', 'Lucida Sans Unicode', Verdana, sans-serif;
    }
    label {
      display: block;
    }
    input {
      border: 1px solid #c4c4c4;
      border-radius: 5px;
      background-color: #fff;
      padding: 3px 5px;
      box-shadow: inset 0 3px 6px rgba(0,0,0,0.1);
      width: 190px;
    }
    </style>
    
    <h1>DATE PICKER</h1>
   
    @if(count($errors) > 0)
    <div class="alert alert-danger">
        <button type="button" class="close" data-dismiss="alert">×</button>
            <ul>
     @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
     @endforeach
            </ul>
   </div>
@endif

@if ($message = Session::get('success'))
   <div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>
           <strong>{{ $message }}</strong>
   </div>
@endif

    <form action="{{ action('DogController@walk', $dog->id) }}" method="post">
          @csrf   
          <input type="hidden" name="dog_id" value="{{ 1231322 }}">
           <label for="walking">Choose a date for your next walk</label>
    <input type="date" name="walking" id="walking" value="{{ $date }}" onchange="reload_date(this.value)">
            <br>
      
            @foreach ($hours as $hour)
                @if (1 || empty($hours_taken[$hour]))
                    <button type="submit" class="btn-primary" name="hour" value="{{ $hour }}">{{ $hour }}:00</button>
                @endif
            @endforeach
    
     </form>
    <script>
     function reload_date($date) {
         console.log($date);
         window.location.href = '?date=' + $date;
     }
    </script>
@endsection

