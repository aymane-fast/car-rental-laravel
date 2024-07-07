

<h1>welcom to your dashboard </h1>

<h2>your informations :</h2>

<p>name : {{$user->name}}</p>
<p>surname : {{$user->surname}}</p>
<p>email : {{$user->email}}</p>
<p>phone : {{$user->phone}}</p>
<p>address : {{$user->address}}</p>
<p>city : {{$user->city}}</p>
<p>postal code : {{$user->postal_code}}</p>
<p>image : <img src="{{asset('storage/'.$user->image)}}" alt="user image"></p>

<button><a href="{{route('users.resetPassForm')}}">reset password</a></button>
<button><a href="{{route('users.logout')}}">logout</a></button>

<h2>active rented car list :</h2>
@if($activeCars->isEmpty())
    <p>You have no active rented cars.</p>
@else
    @foreach($activeCars as $car)
    <p>car name : {{$car->name}}</p>
    <p>car brand : {{$car->brand}}</p>
    <p>car model : {{$car->model}}</p>
    <p>car year : {{$car->year}}</p>
    <p>car price : {{$car->price}}</p>
    <p>car image : <img src="{{asset('storage/'.$car->image)}}" alt="car image"></p>
    {{-- Pivot data --}}
    <p>rent start date : {{$car->pivot->start_date}}</p>
    <p>rent end date : {{$car->pivot->end_date}}</p>
    <p>rent price : {{$car->pivot->total_price}}</p>
    @endforeach
@endif

<h2>rented car history :</h2>
@if($pastCars->isEmpty())
    <p>You have no rented car history.</p>
@else
    @foreach($pastCars as $car)
    <p>car name : {{$car->name}}</p>
    <p>car brand : {{$car->brand}}</p>
    <p>car model : {{$car->model}}</p>
    <p>car year : {{$car->year}}</p>
    <p>car price : {{$car->price}}</p>
    <p>car image : <img src="{{asset('storage/'.$car->image)}}" alt="car image"></p>
    <p>rent start date : {{$car->pivot->start_date}}</p>
    <p>rent end date : {{$car->pivot->end_date}}</p>
    <p>rent price : {{$car->pivot->total_price}}</p>
    @endforeach
@endif
