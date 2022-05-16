<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">WEBSHOP</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('showLogin') }}">Bejelentkezés</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">Regisztráció</a>
                </li>
            @endguest

            <li class="nav-item">
                <a class="nav-link" href="/kosar">Kosár</a>
            </li>

            @auth
                @if (auth()->user()->is_admin)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('listOrders') }}">Rendelések</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('userOrders') }}">Rendeléseim</a>
                    </li>
                @endif

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}">Kilépés</a>
                </li>
            @endauth

            <!--
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Dropdown
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
            </li>
            -->
        </ul>
        <form class="d-flex" method="GET" action="{{ route('searchProducts') }}">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="keyword"
            value="@if(isset($keyword)) {{$keyword}} @endif"
          >
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
</nav>
