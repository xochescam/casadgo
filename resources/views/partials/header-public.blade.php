    <header id="header">
        <div class=" navbar-toggleable-md navbar-inverse bg-invers navbar--admin">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="#">Hidden brand</a>
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
            </ul>

          </div>
        </div>

        <nav id="main-menu" class="navbar navbar-default navbar-fixed-top" role="banner">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ url('/') }}"><img src="images/logo.png" alt="logo"></a>
                </div>

                {{-- <div class="admin-menu">
                    <ul>
                        <li>
                            <a href="">Noticias</a>
                        </li>
                        <li>
                            <a href="">Galeria</a>
                        </li>
                    </ul>
                </div> --}}



                <div class="collapse navbar-collapse navbar-right">
                    <ul class="nav navbar-nav">
                        <li class="scroll active"><a href="#home">Inicio</a></li>
                        <li class="scroll"><a href="#about">Nosotros</a></li>
                        <li class="scroll"><a href="#services">Servicios</a></li>
                        <li class="scroll"><a href="#blog">Noticias</a></li>
                        <li class="scroll"><a href="#portfolio">Galería</a></li>
                        <li class="scroll"><a href="#volunters">Voluntarios</a></li>
                        <li class="scroll"><a href="#sponsors">Patrocinio</a></li>
                        <li class="scroll"><a href="#get-in-touch">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>