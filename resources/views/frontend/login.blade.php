@extends('frontend.main')
@section('main-conatainer')
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login & Registration Form</title>
  {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> --}}
  <style>
    body {
      background-color: #f8f9fa;
    }
    .form-container {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
      padding: 40px;
      margin-top: 50px;
      max-width: 400px;
    }
    #laxman{
        margin-top:8rem;
    }
  </style>
</head>
<body>

<div class="container" id="laxman">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <!-- Login Form -->
      <div class="form-container">
        <h2 class="mb-4">Login</h2>
        <form action="#" method="POST">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <button type="submit" class="btn btn-primary">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>

</body>
</html>

@endsection;