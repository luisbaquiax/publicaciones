<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <script src="https://kit.fontawesome.com/6d0db64a1f.js" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->

</head>
<body style="min-height: 75rem;
    padding-top: 4.5rem;">
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check2" viewBox="0 0 16 16">
        <path
            d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
    </symbol>
    <symbol id="circle-half" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z"/>
    </symbol>
    <symbol id="moon-stars-fill" viewBox="0 0 16 16">
        <path
            d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z"/>
        <path
            d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z"/>
    </symbol>
    <symbol id="sun-fill" viewBox="0 0 16 16">
        <path
            d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z"/>
    </symbol>
</svg>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route("publicacion.list") }}"> <i
                            class="fa-solid fa-house"></i> Publicaciones</a>
                </li>
            </ul>

            @if(session()->has("user"))
                <div class="dropdown">
                    <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                        <i class="fa-solid fa-user mx-2"></i>{{ session("user")->username }}
                    </button>
                    <ul class="dropdown-menu bg-dark" style="left: -1px">
                        <li><a class="dropdown-item bg-dark text-white" href="#">Mi perfil</a></li>
                        <li><a class="dropdown-item bg-dark text-white"
                               href="{{ route("users.mispublicaciones", session("user")->username) }}">Mis
                                publicaciones</a></li>
                        <li><a class="dropdown-item bg-dark text-white" href="{{ route("users.singout") }}"><i
                                    class="fa-solid fa-right-from-bracket"></i> Salir</a></li>
                    </ul>
                </div>
            @else
                <div class="text-end">
                    <a class="btn btn-outline-success" href="/login">Iniciar sesion</a>
                    <a class="btn btn-outline-light me-2" href="/singup">Crear cuenta</a>
                </div>
            @endif
        </div>
    </div>
</nav>

<main class="container">
    <div class="row">
        <div class="col-3">
            <div class="bg-body-tertiary p-3 rounded">
                <div class="list-group">
                    <a href="#" class="list-group-item bg-dark text-white" aria-current="true">
                        Categoria de eventos
                    </a>
                    @foreach($categorias as $a)
                        <a href="{{ route("publicacion.filter", $a->tipo_publico) }}" class="list-group-item list-group-item-action">{{ $a->tipo_publico }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="bg-body-tertiary p-5 rounded">
                <h1 class="text-center">Eventos</h1>
                @foreach($publicaciones as $p)
                    <div class="card mb-3">
                        <div class="card-header">
                            <h6 class="text-center"><strong>{{ $p->titulo }}</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    <strong>Lugar: <i class="fa-solid fa-location-dot"></i></strong> {{ $p->lugar }}
                                    <strong>Fecha: <i class="fa-solid fa-calendar-days"></i></strong> {{ $p->fecha }}
                                    <strong>Cupos:</strong> {{ $p->cupos }}
                                    <strong>Estado:</strong> {{ $p->estado }}
                                </div>
                                <div class="col-3">
                                    @if(session("editar") == '1')
                                        <a class="btn btn-dark btn-sm">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm">
                                            <i class="fa-solid fa-trash-can"></i>
                                        </a>
                                    @else
                                        @if(session()->has("user"))
                                            <a class="btn btn-primary btn-sm">
                                                <i class="fa-solid fa-check-double"></i>Asistir
                                            </a>
                                            <a class="btn btn-danger btn-sm">
                                                <i class="fa-solid fa-circle-exclamation"></i>Reportar
                                            </a>
                                        @else
                                            <a class="btn btn-primary btn-sm" href="/login">
                                                <i class="fa-solid fa-check-double"></i>Asistir
                                            </a>
                                            <a class="btn btn-danger btn-sm" href="/login">
                                                <i class="fa-solid fa-circle-exclamation"></i>Reportar
                                            </a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
