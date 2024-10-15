<div class="bg-body-tertiary p-5 rounded">
    <h1 class="text-center">Publicaciones</h1>
    @foreach($publicaciones as $p)
        <div class="card mb-3">
            <div class="card-header">
                <h6 class="text-center"><strong>{{ $p->titulo }}</strong></h6>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-9">
                        <strong>Codigo: </strong> {{ $p->id }}
                        <strong>Solicitante: </strong> {{ $p->username }}
                        <strong>Lugar: <i class="fa-solid fa-location-dot"></i></strong> {{ $p->lugar }}
                        <strong>Fecha: <i class="fa-solid fa-calendar-days"></i></strong> {{ $p->fecha }}
                        <strong>Cupos:</strong> {{ $p->cupos }}
                        <strong>Estado:</strong> {{ $p->estado }}
                    </div>
                    <div class="col-3">
                        <a class="btn btn-info btn-sm" href="{{ route("publicacion.updateState", ['id'=> $p->id, 'estado'=> \App\Http\Enums\EstadoPublicacion::ACEPTADO]) }}">
                            <i class="fa-solid fa-thumbs-up"></i>Autorizar
                        </a>
                        <a class="btn btn-danger btn-sm" href="{{ route("publicacion.updateState", ['id'=> $p->id, 'estado'=> \App\Http\Enums\EstadoPublicacion::RECHAZADO]) }}">
                            <i class="fa-solid fa-thumbs-down"></i>Rechazar
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
