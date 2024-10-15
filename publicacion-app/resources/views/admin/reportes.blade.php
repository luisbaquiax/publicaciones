<div class="bg-body-tertiary p-5 rounded">
    <div class="card mb-3">
        <div class="card-header">
            <h1 class="text-center">Reportes</h1>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Codigo de la publicación</th>
                    <th scope="col">Motivo</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Acción</th>
                </tr>
                </thead>
                <tbody>
                @php $index = 0; @endphp
                @foreach($reportes as $r)
                    <tr>
                        <th>{{ ++$index }}</th>
                        <td>{{ $r->id_publicacion }}</td>
                        <th>{{ $r->motivo }}</th>
                        <th>{{ $r->username }}</th>
                        <td>
                            <a class="btn btn-info btn-sm" href="{{ route("report.update", ['id'=>$r->id, 'estado' =>$EstadoReporte::APROVADO->value]) }}">
                                <i class="fa-solid fa-thumbs-up"></i>Aprobar
                            </a>
                            <a class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-thumbs-down"></i>Ignorar
                            </a>
                            <a class="btn btn-dark btn-sm">
                                <i class="fa-regular fa-trash-can"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
