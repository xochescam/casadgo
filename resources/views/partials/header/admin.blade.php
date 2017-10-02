  <div class=" navbar-toggleable-md navbar-inverse bg-invers navbar--admin">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/galeria/crear') }}">Galeria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ url('/noticia/crear') }}">Noticias</a>
        </li>
      </ul>

      <ul class="navbar-nav--user">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle " id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Xochitl <i class="fa fa-user"></i>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="{{ url('/cambiar-contrasena',Auth::user()->id) }}">Cambiar contraseña</a>
            <a class="dropdown-item" href="{{ url('/cerrar-sesion') }}">Cerrar sesión</a>
          </div>
        </li>

      </ul>
  </div>