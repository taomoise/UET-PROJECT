@extends('base')

@section('title', 'Change your email adress')

@section('content')


   <div class="container">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <h2 class="text-center text-muted mb-3 mt-10 ">Change your email address</h2>

                {{-- On inclus les messages d'alert --}}
                  @include('alerts.alert-message')

              <form  method="POST" action="{{route('app_activation_account_change_email',['token' =>$token] )}}" >
                  @csrf

                 <div class="mb-3">
                    <label for="new-email" class="form-label">New Email address</label>
                    <input type="email" class="form-control @if(Session::has('danger')) is-invalid @endif " name="new-email" id="new-email" value="@if(Session::has('new_email')) {{ Session::get('new_email') }} @endif" placeholder="Enter the new email address" required>
                 </div>
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="submit">Change</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

@endsection
