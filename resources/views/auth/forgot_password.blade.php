@extends('base')

@section('title', 'Forgot password')

@section('content')

<div class="container">
    <div class="row mb-3">
        <div class="col-md-4  mx-auto">
            <h1 class="text-center text-muted mb-3 mt-10 ">Forgot password</h1>
            <p class="text-center text-muted mb -5">Please enter your email address. We will send you a link to reset your password</p>

            <form action="{{route('app_forgotpassword')}}" method="post"></form>
               @csrf

                {{-- On inclus les messages d'alert --}}
                @include('alerts.alert-message')

                <label for="email-send" class="form-label">Email</label>
                <input type="email" name="email-send" id="email-send" class="form-control" placeholder="Please eneter your email address">

                <div class="d-grid gap-2 mt-4 mb-5">
                    <button class="btn btn-primary" type="submit">Reset password</button>
                 </div>

                 <p class="text-center text-muted ">Back to login <a href="{{route('login')}}">login</a></p>
           </form>
      </div>
    </div>
</div>

@endsection
