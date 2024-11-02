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
                    <th scope="col">Estado</th>
                    <th scope="col">Usuario que reportó</th>
                    <th scope="col">Acción</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @php $index = 0; @endphp
                @foreach($reportes as $r)
                    <tr>
                        <td>{{ ++$index }}</td>
                        <td>{{ $r->id_publicacion }}</td>
                        <td>{{ $r->motivo }}</td>
                        <td>{{ $r->estado }}</td>
                        <td>{{ $r->username }}</td>
                        <td>
                            @if($r->estado == 'ACTIVO')
                                <a class="btn btn-info btn-sm" href="{{ route("report.update", ['id'=>$r->id, 'estado' =>$EstadoReporte::APROVADO->value]) }}">
                                    <i class="fa-solid fa-thumbs-up"></i>Aprobar
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{ route("report.update", ['id'=>$r->id, 'estado' =>$EstadoReporte::IGNORADO->value]) }}">
                                    <i class="fa-solid fa-thumbs-down"></i>Ignorar
                                </a>
                            @endif

                        </td>
                        <td>
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
