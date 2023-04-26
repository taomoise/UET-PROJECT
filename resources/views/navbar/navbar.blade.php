<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">{{config('app.name')}}</a>
       <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
             <li class="nav-item">
                 <a class="nav-link @if(Request::route()->getName() == 'app_home') active @endif" aria-current="page" href="{{ route('app_home')}}">Home</a>
             </li>
              <li class="nav-item">
                 <a class="nav-link  @if(Request::route()->getName() == 'app_about') active @endif" aria-current="page" href="{{ route('app_about')}}">About</a>
               </li>
          </ul>
        </div>


        <div class="btn-group">
        @guest
            <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                      My account
            </button>
            <ul class="dropdown-menu">
               <li><a class="dropdown-item" href="{{route('login')}}">Login</a></li>
                <li><a class="dropdown-item" href="{{route('register')}}">Register</a></li>
             </ul>
           @endguest

    @auth
         <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            {{Auth::user()->name}}
         </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="{{route('app_logout')}}">Logout</a></li>
        </ul>
    @endauth

    </div>
  </div>
</nav>

