

<h1>welcom to your dashboard </h1>

<h2>your informations :</h2>
{{$user = Auth::user()}}
<p>name : {{$user->name}}</p>
<p>surname : {{$user->surname}}</p>
<p>email : {{$user->email}}</p>
<p>phone : {{$user->phone}}</p>
<p>address : {{$user->address}}</p>
<p>city : {{$user->city}}</p>
<p>postal code : {{$user->postal_code}}</p>
<p>image : <img src="{{asset('storage/'.$user->image)}}" alt="user image"></p>

<h2>active rented car list :</h2>
@if($user->cars->isEmpty())
    <p>you have no active rented cars</p>
@else
    @foreach($user->cars as $car)
    <p>car name : {{$car->name}}</p>
    <p>car brand : {{$car->brand}}</p>
    <p>car model : {{$car->model}}</p>
    <p>car year : {{$car->year}}</p>
    <p>car price : {{$car->price}}</p>
    <p>car image : <img src="{{asset('storage/'.$car->image)}}" alt="car image"></p>
    @endforeach
@endif
<h2>rented car history :</h2>
{{-- @foreach($user->rents as $rent)
<p>car name : {{$rent->car->name}}</p>
<p>car brand : {{$rent->car->brand}}</p>
<p>car model : {{$rent->car->model}}</p>
<p>car year : {{$rent->car->year}}</p>
<p>car price : {{$rent->car->price}}</p>
<p>car image : <img src="{{asset('storage/'.$rent->car->image)}}" alt="car image"></p>
<p>rent start date : {{$rent->start_date}}</p>
<p>rent end date : {{$rent->end_date}}</p>
<p>rent price : {{$rent->price}}</p>
@endforeach --}}
