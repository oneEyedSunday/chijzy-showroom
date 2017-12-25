<nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="/logo.png" alt="David Iloba" title="David Iloba logo" class="navbar-brand-img"></a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a href="{{ route('photos.show') }}" class="nav-link">Designs</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('photos.show') }}" class="nav-link">Photos</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('albums.show') }}" class="nav-link">Albums</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('contact.show') }}">Contact</a>
          </li>
        </ul>
        <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <ul class="navbar-nav navbar-right">
        @if (Auth::check())
        <li class="dropdown ml-2">
          <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Hello, {{Auth::user()->name}}<span class="caret"></span></a>
          <ul class="dpd-bg dropdown-menu">
            <li class="nav-item dropdown-item"><a href="{{route('manage.dashboard')}}" class="nav-link">Manage Site</a></li>            
            <li class="divider" role="separator"></li>
            <li class="nav-item dropdown-item">
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class="nav-link">
                     Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}</form>
            </li>
          </ul>
        </li>
        @endif
        </ul>
      </div>
</nav>