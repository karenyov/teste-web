<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-menu">
  <a class="navbar-brand" href="#">
    <img src="{{URL::asset('/images/logo.png')}}" width="120" height="40" />
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item {{Request::path() == 'performance' ? 'active' : ''}}">
        <a class="nav-link"  href="{{ url('/performances') }}">Performance <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item {{Request::path() == 'produtos' ? 'active' : ''}}">
        <a class="nav-link"  href="{{ url('/produtos') }}">Produtos</a>
      </li>
      <li class="nav-item {{Request::path() == 'marcas' ? 'active' : ''}}">
        <a class="nav-link"  href="{{ url('/marcas') }}">Marcas</a>
      </li>
      <li class="nav-item {{Request::path() == 'fabricantes' ? 'active' : ''}}">
        <a class="nav-link"  href="{{ url('/fabricantes') }}">Fabricantes</a>
      </li>
    </ul>
  </div>
  <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
    <ul class="navbar-nav ml-auto">

      @guest
        <li class="nav-item">
          <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
          <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Registre-se') }}</a>
          </li>
        @endif
      @else
        <li class="nav-item dropdown">
          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }} <span class="caret"></span>
          </a>

          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
          </div>
        </li>
      @endguest
    </ul>
  </div>
</nav>