@extends('layouts/contentNavbarLayout')

@section('title', 'Registros')
@section('page-script')
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
@endsection

@section('content')


@if($errors->any())
<div style="display: flex; justify-content: center;">
    <div style="position: absolute;" class="bs-toast toast fade show bg-danger " role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <i class='bx bx-bell me-2'></i>
            <div class="me-auto fw-semibold">Ah ocurrido un error</div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        @foreach($errors->all() as $error)
        <div class="toast-body">
            {{ $error }}
        </div>

        @endforeach
    </div>
</div>
@endif

<!-- Basic Bootstrap Table -->
<a style="margin-bottom: 25px;" href="{{ route('inscripciones.create')}}" class="btn btn-primary">Inscribir</a>

<!--- Listado--->
<div class="card">
    <div style="align-items: center; display: inline-flex; justify-content: space-between;">
        <h5 class="card-header">Listado de Inscripciones a Programas</h5>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nro inscripcion</th>
                    <th>Fecha de inscripcion</th>
                    <th>Programa</th>
                    <th>Grupo</th>
                    <th>Alumno</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($inscritos AS $inscripcion)
                <tr>
                    <td>{{ $inscripcion-> inscrip_program_nro}}</td>
                    <td>{{ $inscripcion-> inscrip_program_fecha}}</td>
                    <td>{{ $inscripcion-> program -> program_nom}}</td>
                    <td>{{ $inscripcion-> grupo_programa -> grup_program_cod}}</td>
                    <td>{{ $inscripcion-> persona -> per_nom . $inscripcion-> persona -> per_appm}}</td>

                    <td>
                        <div class="d-flex">
                            <a href="{{ route('inscripciones.edit', $inscripcion-> persona -> per_id) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('inscripciones.destroy', $inscripcion-> persona->per_id) }}" method="POST">
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
@endsection