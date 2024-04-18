@extends('frontend.main')
@section("main-conatainer")
<style>
    .form-container {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 50px;
    }
  #contain{
    margin-top: 8%;
  }
  </style>


<div class="container" id = "contain">
  <div class="row">
    <div class="col-md-6 offset-md-3 form-container">
      <h2 class="text-center">login</h2>
      <form action="{{url('loginpost')}}" method="POST">
      @csrf
        <div class="form-group">
          {{-- <label for="email">Email address:</label> --}}
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
        </div>
        <div class="form-group">
          {{-- <label for="password">Password:</label> --}}
          <input type="password" class="form-control mt-1 " id="password" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block mt-1 ">login</button>
    
     </form>
    </div>
  </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@if($errors->has('email'))
<script>
  // Wait for the DOM to be fully loaded
  document.addEventListener('DOMContentLoaded', function() {
  Swal.fire({
  title: "error!",
  text: "{{$errors->first('email')}}",
  icon: "error"
});
  });
</script>
@endif

@endsection