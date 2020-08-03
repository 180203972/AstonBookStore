<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<a class="navbar-brand" href="{{route('book.index')}}">Aston Book Store <i class="fas fa-book"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  
    <div class="collapse navbar-collapse justify-content-between" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="{{route('book.basket')}}">
            <i class="fas fa-shopping-basket"></i> Basket
            <span class="badge">{{ Session::has('basket') ? Session::get('basket')->totalQty : '' }}</span>
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle"></i> Account
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            @if(Auth::check())
              <a class="dropdown-item" href="{{ route('user.profile') }}">User Profile</a>
              <a class="dropdown-item" href="{{ route('admin.profile') }}">Admin Profile</a>
              <a class="dropdown-item" href="{{ route('user.logout') }}">Logout</a>
            @else
              <a class="dropdown-item" href="{{ route('user.signup') }}">Sign Up</a>
              <a class="dropdown-item" href="{{ route('user.login') }}">User Login</a>
              <a class="dropdown-item" href="{{ route('admin.login') }}">Admin Login</a>
            @endif
          </div>
        </li>
    </div>
  </nav>

