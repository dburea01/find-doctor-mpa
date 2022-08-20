<!doctype html>
<html class="h-100" lang="{{ session()->get('locale') }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Chercher un praticien (to translate)">
  <meta name="author" content="Dominique BUREAU">
  <title>{{ config('app.name') }}
    @hasSection ('title')
    - @yield('title')
    @else
    - {{ url()->full() }}
    @endif</title>

  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

  @vite(['resources/css/app.css', 'resources/js/app.js'])

  <link rel="icon" href="{{ asset('img/carre_vert_48_48.png') }}" type="image/png">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.css"
    integrity="sha512-7zxVEuWHAdIkT2LGR5zvHH7YagzJwzAurFyRb1lTaLLhzoPfcx3qubMGz+KffqPCj2nmfIEW+rNFi++c9jIkxw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Global site tag (gtag.js) - Google Analytics -->
  @if (App::environment('production'))


  <script async src="https://www.googletagmanager.com/gtag/js?id=G-8QK4TTC0E3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

          function gtag() {
            dataLayer.push(arguments);
          }
          gtag('js', new Date());

          gtag('config', 'G-8QK4TTC0E3');
  </script>

  @endif
</head>

<body class="d-flex flex-column h-100">
  <header>
    <!-- Fixed navbar -->

    <nav class="navbar navbar-expand-md navbar-menu navbar-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="/"><i class="bi bi-house" aria-hidden="true"></i> LOGO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon">&nbsp;</span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">

            @if(Auth::check())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                {{ Auth::user()->name }}
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li>
                  <a class="dropdown-item" href="/my-profile">@lang('menu.my-profile')</a>
                </li>
                <li>
                  <a class="dropdown-item" href="/logout">@lang('menu.deconnection')</a>
                <li>
                  <hr class="dropdown-divider">
                </li>
                <li>
                  <a class="dropdown-item" href="/my-bets">@lang('menu.my-bets')</a>
                </li>
                <li>
                  <a class="dropdown-item" href="/my-participations">@lang('menu.my-participations')</a>
                </li>
              </ul>
            </li>

            @if (Auth::user()->isAdmin())
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                ADMINISTRATION
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                <li><a class="dropdown-item" href="/users">@lang('menu.users')</a></li>
                <li><a class="dropdown-item" href="/bets">@lang('menu.bets')</a></li>
                <li>
                  <hr class="dropdown-divider">
                </li>

                <li><a class="dropdown-item" href="/countries">@lang('menu.countries')</a></li>
                <li><a class="dropdown-item" href="/sports">@lang('menu.sports')</a>
                <li><a class="dropdown-item" href="/teams">@lang('menu.teams')</a>
                <li><a class="dropdown-item" href="/competitions">@lang('menu.competitions')</a>
                <li><a class="dropdown-item" href="/events">@lang('menu.events')</a>
                </li>

              </ul>
            </li>
            @endif

            @else
            <li><a class="nav-link" href="/login">@lang('home.connect')</a></li>
            @endif

            <x-select-language />
          </ul>
        </div>
      </div>
    </nav>



  </header>

  <!-- Begin page content -->
  <main class="flex-shrink-0">
    <div class="container p-3">
      @yield('content')
    </div>
  </main>

  <footer class="footer mt-auto py-3">
    <div class="container">
      <a class="text-muted" href="/the-author">&copy;Dom 2022</a> |
      <a class="text-muted" href="/">@lang('home.accueil')</a> |
      <a class="text-muted" href="/cgu">@lang('home.cgu')</a> |
      <a class="text-muted" href="/contact-author">@lang('home.contact_the_author')</a>
    </div>
  </footer>

  @yield('additional_js_beforebs')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-typeahead/2.11.0/jquery.typeahead.min.js"></script>


  @yield('additional_js')
</body>

</html>