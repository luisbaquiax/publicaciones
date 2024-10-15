<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route("publicacion.getAll") }}"> <i
                            class="fa-solid fa-house"></i> Publicaciones</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Reportes</a>
                    <ul class="dropdown-menu bg-dark text-white">
                        <li><a class="dropdown-item bg-dark text-white" href="{{ route("report.list") }}">Publicaciones reportados</a></li>
                        <li><a class="dropdown-item bg-dark text-white" href="#">Action</a></li>
                    </ul>
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
