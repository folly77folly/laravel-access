<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="col-md-4">
                <div class="title m-b-md">
                    Access Task
                </div>
                <div>
                    @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> {{ session('status') }} </strong>.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                    <form method="POST" action="{{ route('store') }}">
                        @csrf
                        <div class="form-group mb-4">
                            <label for="names">Name</label>
                            <input type="text" name ="name" value ="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="names" aria-describedby="name" placeholder="Enter Name" autocomplete="off">
                            @error('name')
                              <span class="invalid-feedback" role="">
                                  <strong>{{ $message }}</strong>
                              </span>
                            @enderror 
                          </div>
                        <div class="form-group mb-4">
                          <label for="email">Email address</label>
                          <input type="text" name ="email" class="form-control @error('email') is-invalid @enderror"  value ="{{ old('email') }}" id="email" aria-describedby="email" placeholder="Enter email" autocomplete="off">
                          @error('email')
                            <span class="invalid-feedback" role="">
                                <strong>{{ $message }}</strong>
                            </span>
                          @enderror
                          <small id="email" class="form-text text-muted">We'll never share your email with anyone else.</small>

                        </div>
                        <div class="form-group mb-4">
                          <label for="pin">Pin</label>
                          <input type="password" class="form-control @error('pin') is-invalid @enderror" id="pin" name="pin" placeholder="Six-digits pin" value ="{{ old('pin') }}">
                          @error('pin')
                              <span class="invalid-feedback">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                        </div>
                        <div class="form-group mb-4">
                            <input type="checkbox" onclick="myFunction()"> Show Pin
                        </div>
                        
                        <div class="form-group form-row">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>

                </div>

            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>
    </body>
</html>
<script>

function myFunction() {
  var x = document.getElementById("pin");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
