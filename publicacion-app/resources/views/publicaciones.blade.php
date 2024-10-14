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

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
    <symbol id="check-circle-fill" viewBox="0 0 16 16">
        <path
            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
    </symbol>
    <symbol id="info-fill" viewBox="0 0 16 16">
        <path
            d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
    </symbol>
    <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
        <path
            d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
    </symbol>
</svg>

@include('menu')

<main class="container">
    <div class="row">
        <div class="col-3">
            <div class="bg-body-tertiary p-3 rounded">
                <div class="list-group">
                    <a href="#" class="list-group-item bg-dark text-white" aria-current="true">
                        Categoria de eventos
                    </a>
                    @foreach($categorias as $a)
                        <a href="{{ route("publicacion.filter", $a->tipo_publico) }}"
                           class="list-group-item list-group-item-action">{{ $a->tipo_publico }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-9">
            @if(session('info'))
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <svg class="flex-shrink-0" role="img" aria-label="Danger:" width="25px" height="25px">
                        <use xlink:href="#info-fill"/>
                    </svg>
                    {{ session('info') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <svg class="flex-shrink-0" role="img" aria-label="Danger:" width="25px" height="25px">
                        <use xlink:href="#info-fill"/>
                    </svg>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('not-success'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <svg class="flex-shrink-0" role="img" aria-label="Danger:" width="25px" height="25px">
                        <use xlink:href="#exclamation-triangle-fill"/>
                    </svg>
                    {{ session('not-success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="bg-body-tertiary p-5 rounded">
                <h1 class="text-center">Eventos</h1>
                @php $index = 0; @endphp
                @foreach($publicaciones as $p)
                    <div class="card mb-3">
                        <div class="card-header bg-dark">
                            <h6 class="text-center text-white"><strong>{{ $p->titulo }}</strong></h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-9">
                                    {{ ++$index }}
                                    <strong>Lugar: <i class="fa-solid fa-location-dot"></i></strong> {{ $p->lugar }}
                                    <strong>Fecha: <i class="fa-solid fa-calendar-days"></i></strong> {{ $p->fecha }}
                                    <strong><i class="fa-solid fa-clock"></i> </strong> {{ $p->hora_inicio }}
                                    <strong>Cupos disponibles:</strong> {{ $p->cupos }}
                                    @if(session('user'))
                                       @if(session('user')->username == $p->username)
                                            <strong>Estado:</strong> {{ $p->estado }}
                                       @endif
                                    @endif
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
                                            <a class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                               data-bs-target="#staticBackdrop{{ $p->id }}">
                                                <i class="fa-solid fa-circle-exclamation"></i>Reportar
                                            </a>
                                            <!-- Modal reportar -->
                                            <div class="modal fade modal-lg" id="staticBackdrop{{ $p->id }}"
                                                 data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                 aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-bg-dark text-center">
                                                            <h1 class="modal-title fs-5 mx-3"><strong>Reportar
                                                                    anuncio:</strong></h1>
                                                            <h1 class="modal-title fs-5">{{ $p->titulo }}</h1>
                                                            <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body text-bg-dark">
                                                            <form action="{{ route("report.create") }}" method="post">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <input type="hidden" name="username"
                                                                           value="{{ session("user")->username }}">
                                                                    <input type="hidden" name="id" value="{{ $p->id }}">
                                                                    <label for="motivos" class="form-label">Seleccione
                                                                        el motivo del reporte de esta
                                                                        publicación</label>
                                                                    <select name="motivo"
                                                                            class="form-select form-select-lg mb-3"
                                                                            aria-label="Large select example">
                                                                        @foreach($motivos as $m)
                                                                            <option
                                                                                value="{{ $m->nombre }}">{{ $m->nombre }}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                                <div class="mb-3">
                                                                    <button class="btn btn-info w-100" type="submit">
                                                                        Reportar anuncio
                                                                    </button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer text-bg-dark">
                                                            <button type="button" class="btn btn-info"
                                                                    data-bs-dismiss="modal">Candelar
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Modal end reportar -->
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