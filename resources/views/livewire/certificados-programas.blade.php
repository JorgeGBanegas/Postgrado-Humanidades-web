<div>

    @include('layouts.sections.navbar.nav-search')
    <!-- Basic Bootstrap Table -->
    <a style="margin-bottom: 25px;" href="" class="btn btn-primary">Registrar</a>

    <!--- Listado--->
    <div class="card">
        <div style="align-items: center; display: inline-flex; justify-content: space-between;">
            <h5 class="card-header">Listado de Certificados </h5>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nro Certificado</th>
                        <th>Alumno</th>
                        <th>Programa</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($certificados AS $certificado)
                    <tr>
                        <td>{{ $certificado -> cert_program_id}}</td>
                        <td>{{ $certificado -> persona -> per_nom ." ".$certificado -> persona -> per_appm}}</td>
                        <td>{{ $certificado -> program -> program_nom}}</td>

                        <td>
                            <div class="d-flex">
                                <a style="margin: 2px;" href="" class="btn btn-primary btn-sm">Ver</a>
                                <a style="margin: 2px;" href="" class="btn btn-warning btn-sm">Editar</a>
                                <form action="" method="POST">
                                    @csrf()
                                    @method('DELETE')
                                    <button type="submit" style="margin: 2px;" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="container" style="margin-top:20px">
        {{ $certificados->links() }}
    </div>
</div>