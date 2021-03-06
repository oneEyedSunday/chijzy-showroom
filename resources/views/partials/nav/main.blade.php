<nav class="navbar navbar-toggleable-sm navbar-inverse fixed-top bg-inverse">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#"><img src="/logo.png" alt="David Iloba" title="David Iloba logo" class="navbar-brand-img"></a>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item {{Request::is('/') ? 'active' : ''}}">
            <a class="nav-link " href="/">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item {{Route::current()->getName() == 'designs.show' ? 'active' : ''}}">
            <a href="{{ route('designs.show') }}" class="nav-link">Designs</a>
          </li>
          <li class="nav-item {{Route::current()->getName() == 'photos.show' ? 'active' : ''}}">
            <a href="{{ route('photos.show') }}" class="nav-link">Photos</a>
          </li>
          <li class="nav-item {{Request::is('album*') ? 'active' : ''}}">
            <a href="{{ route('albums.show') }}" class="nav-link">Albums</a>
          </li>
          <li class="nav-item {{Request::is('contact') ? 'active' : ''}}">
            <a class="nav-link" href="{{ route('contact.show') }}">Contact</a>
          </li>
        </ul>
        <ul class="navbar-nav navbar-right mr-5">
        @if (Auth::check())
        <li class="dropdown">
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