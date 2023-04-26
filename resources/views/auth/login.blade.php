@extends('base')

@section('title', 'Login')

@section('content')

<h1>Login</h1>

 <div class="container"></div>
       <div class="row mb-3">
            <div class="col-md-4  mx-auto">
                  <h1 class="text-center text-muted mb-3 mt-10 ">Please sign in</h1>
                  <p class="text-center text-muted mb -5">Welcome</p>

            <form method="POST" action="{{ route('login')}}">
                 @csrf


                 {{-- On inclus les messages d'alert --}}
                 @include('alerts.alert-message')

                  @error('email')
                    <div class="alert alert-danger text-center" role="alert">
                      {{ $message }}
                    </div>
                  @enderror

                  @error('password')
                  <div class="alert alert-danger text-center" role="alert">
                    {{ $message }}
                   </div>
                   @enderror

                  <label for="email" class="form-label">Email</label>
                  <input type="email" name="email" id="email" class="form-control mb-3 @error('email') is-invalid @enderror" value="{{ old('email') }}" required autocomplete="email" autofocus>

                  <label for="password" class="form-label">Password</label>
                  <input type="password" name="password" id="password" class="form-control mb-3 @error('password') is-invalid @enderror" required autocomplete="current-password">

                <div class="row mb-3">
                  <div class="col-md-6">
                     <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="remember" name="remember" {{ old('remember') ? 'checked' : ''}}>
                        <label class="form-check-label" for="remember">Remember me</label>
                       </div>
                    </div>

                    <div class="col-md text-end">
                        <a href="{{ route('app_forgotpassword') }}">Forgot password?</a>
                    </div>
                  </div>

                  <div class="d-grid gap-2">
                     <button class="btn btn-primary" type="submit">Connectez-vous</button>
                  </div>

                  <p class="text-center text-muted mt-5">Vous n'avez pas un compte? <a href="{{route('register')}}">Créez un compte</a></p>
            </form>
         </div>
       </div>
    </div>

@endsection
