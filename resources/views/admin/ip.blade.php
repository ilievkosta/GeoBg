@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Ip Dashboard</div>
                <div class="card-body">
           
          

           <form action="/Ipdays" method="POST" >
           @csrf
           <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Enter last days" id="days" name="days" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
    <button class="btn btn-outline-secondary"  button type="submit" value="Submit">Изпрати</button>
  </div></div></form>





<form action="/Iphours" method="POST" >
@csrf
<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Enter last hours" id="hours" name="hours" aria-label="Recipient's username" aria-describedby="basic-addon2">
  <div class="input-group-append">
  <button class="btn btn-outline-secondary"  button type="submit" value="Submit">Изпрати</button>
  </div>
</div>
</form>

<form action="/LatLon" method="POST">
  @csrf
  First Date <input type="date" name="first" required>
  Last Date <input type="date" name="last" required>
 

<select name="country">
  <option value="BG" >BG</option>
  <option value="All" >All</option>
  
</select>
  <input type="submit" value="Submit">
</form>



                </div>
            </div>
        </div>
    </div>
</div>
@endsection