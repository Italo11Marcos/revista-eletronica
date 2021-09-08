<!doctype html>
<html lang="pt-br">
  <head><meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Revista ErgaOmnes">
    <meta name="description" content="Revista voltada para o Direito, subdividindo-se nas subáreas: Filosofia e Sociologia do Direito, Direito Civil, Direito Empresarial, Direito Agrário, Direito Internacional Público e Privado, Direitos Humanos, Direito e Artes, Direito e Saúde, frisando-se sempre a perspectiva interdisciplinar.">
    <meta name="keywords" content="Revista ErgaOmnes, Direito, Social, Direito Civil, Direito Agrário, Direito Público, Direito Privado, Direitos Humanos, Revista">
    <meta http-equiv="cache-control" content="no-cache" />
    <meta http-equiv="content-language" content="pt-br"/>
    
    <meta name="robots" content="index,nofollow">
    <meta name="google-site-verification" content="s5GkSyPhAhOTZT3KIBQPQUlsnOAR6u1PUOc2aKv-4OY" />
    <meta name="generator" content="Laravel 5.7">
    <title>Revista ErgaOmnes</title>

    <!-- Faveicon -->
    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" />

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/blog/">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/dist/plugins/fontawesome-free/css/all.min.css') }}">
  
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Custom CSS --> 
    <link rel="stylesheet" href=" {{ asset('assets/css/custom.css') }} ">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700,900" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href=" {{ asset('assets/css/blog.css') }} " rel="stylesheet">
  </head>
  <body>
    <div class="container">
      {{--
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <div class="col-12 d-flex justify-content-end align-items-center">
                    <a class="btn btn-sm btn-outline-secondary" href="{{ route('login') }}">Entrar</a>
                    <a class="btn btn-sm btn-outline-secondary" href="#">Cadastrar</a>
                </div>
            </div>
        </header>
        --}}
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top" role="navigation">
          <div class="container">
              <div class="collapse navbar-collapse" id="exCollapsingNavbar">
                @guest
                  <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <li class="nav-item"><a href=" {{ route('login') }} " class="nav-link">Entrar</a></li>
                    <li class="nav-item"><a href=" {{ route('register') }} " class="nav-link">Cadastrar</a></li>
                  </ul>
                @else
                  <ul class="nav navbar-nav flex-row justify-content-between ml-auto">
                    <li class="nav-item"><a href="#" class="nav-link">{{ Auth::user()->name }}</a></li>
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                          {{ __('Sair') }}
                      </a>

                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </li>
                    
                  </ul>
                @endguest
                  
              </div>
          </div>
        </nav>

        <div class="col-md-12">
          <br><br><br>
          <div class="row no-gutters border rounded overflow-hidden  position-relative">
            <img src=" {{ asset('assets/img/caparevista3.jpeg') }} " alt="logo" class="img-fluid">
          </div>
      </div>

        <div class="nav-scroller py-1 mb-2">
            <nav class="nav d-flex justify-content-between">
                <a class="p-2 text-muted" href=" {{ route('atual') }} ">Atual</a>
                <a class="p-2 text-muted" href=" {{ route('anterior') }} ">Anteriores</a>
                <a class="p-2 text-muted" href=" {{ route('about') }} ">Sobre a Revista</a>
                <a class="p-2 text-muted" href=" {{ route('equipe') }} ">Equipe Editorial</a>
                <a class="p-2 text-muted" href=" {{ route('contato') }} ">Contato</a>
                <a class="p-2 text-muted" href=" {{ route('index-submissao') }} ">Submissões</a>
            </nav>
        </div>

        {{-- Section Content --}}
        <div class="row">

            @yield('content')

        </div>

    </div>


<footer class="blog-footer">
  <p>
    <a href="#">Voltar ao topo</a>
  </p>
</footer>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

</body>
</html>
