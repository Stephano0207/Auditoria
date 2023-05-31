

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{url('/dashboard')}}">
            ESTRELLA'S TIENDA
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                
                    
                
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('shop') }}">TIENDA</a>
                </li>
                @if (Auth::guest())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">INICIAR SESION</a>
                </li>   
                @else
                <li class="nav-item">
                <a class="nav-link"    href="{{route('logout')}}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                  CERRAR SESION
                </a>
                </li>   
                @endif

                @can('admin.home')
                <li class="nav-item">
                    <a class="nav-link" href="{{route('home')}}">ADMINISTRADOR</a>
                </li>   
     
                @endcan

                <form id="logout-form" action="{{route('logout')}}" method="POST" class="d-none">
                    @csrf
                  </form>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle"
                       href="#" role="button" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false"
                    >
                        <span class="badge badge-pill badge-dark">
                            <i class="fa fa-shopping-cart"></i> {{ \Cart::getTotalQuantity()}}
                        </span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown" style="width: 450px; padding: 0px; border-color: #9DA0A2">
                        <ul class="list-group" style="margin: 20px;">
                            @include('partials.cart-drop')
                        </ul>

                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
