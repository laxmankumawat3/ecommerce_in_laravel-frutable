@extends('frontend.main')
@section('main-conatainer')
  <style>
    .form-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 50px;
    }
    #cotaine{
      margin-top : 8%;
    }
  </style>

  
<div  id = "cotaine">
 @if(session('message'))
    <div class="alert alert-danger">
        {{ session('message') }}
    </div>
@endif
  <div class="row">
    <div class="col-md-6 offset-md-3 form-container">
      <h2 class="text-center">Registration </h2>
      <form action="{{url('registratiionpost')}}" method="POST">
        @csrf
        <div class="form-group">
          <label for="name">Name:</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
        </div>
        <div class="form-group">
          <label for="email">Email address:</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-1 ">Register</button>
      </form>
    </div>
  </div>
</div>
@endsection