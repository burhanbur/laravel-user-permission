<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <!-- <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('home') }}" class="nav-link"><i class="fa fa-home"></i>&nbsp;&nbsp;<span class="top-menu">Home</span></a>
      </li> -->
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item top-menu">
        <div class="nav-link" id="watch"></div>
      </li>

     @if (Auth::check())
      <li class="nav-item">
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button style="border: none; background: none;" type="submit" class="nav-link"><i class="fas fa-sign-out-alt"></i>&nbsp;&nbsp;<span class="top-menu">Logout</span></button>
        </form>
      </li>
    @endif
    
    </ul>
  </nav>