<div>



    <div class="row mb-3">
        <label class="col-sm-2 col-form-label" for="basic-default-tipo">Tipo de Inscripcion</label>
        <div class="col-sm-10">
            <select wire:model="selected" name="per_tipo" required class="form-select" id="inputGroupSelectTipo">
                <option value="1" selected>Programa</option>
                <option value="2">Curso</option>

            </select>
        </div>
    </div>
    <div class="card">
        <div style="align-items: center; display: inline-flex; justify-content: space-between;">
            @if($esPrograma)
            <h5 class="card-header">Listado de Inscripciones a Programas</h5>
            @else
            <h5 class="card-header">Listado de Inscripciones a Cursos</h5>
            @endif
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nro inscripcion</th>
                        <th>Fecha de inscripcion</th>
                        @if($esPrograma)
                        <th>Programa</th>
                        @else
                        <th>Curso</th>
                        @endif
                        <th>Grupo</th>
                        <th>Alumno</th>
                        <th>Acciones</th>

                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach($inscritos AS $inscripcion)
                    <tr>
                        @if($esPrograma)
                        <td>{{ $inscripcion-> inscrip_program_nro}}</td>
                        <td>{{ $inscripcion-> inscrip_program_fecha}}</td>
                        <td>{{ $inscripcion-> program -> program_nom}}</td>
                        <td>{{ $inscripcion-> grupo_programa -> grup_program_cod}}</td>
                        <td>{{ $inscripcion-> persona -> per_nom . $inscripcion-> persona -> per_appm}}</td>

                        <td>
                            <div class="d-flex">

                                <a style="margin: 2px;" href="{{ route('inscripciones.showProgram', $inscripcion->inscrip_program_nro) }}" class="btn btn-primary btn-sm">Ver</a>

                                <form action="{{ route('inscripciones.destroy', $inscripcion-> persona->per_id) }}" method="POST">
                                    @csrf()
                                    @method('DELETE')
                                    <button type="submit" style="margin: 2px;" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </div>

                        </td>

                        @else
                        <td>{{ $inscripcion-> inscrip_curs_id}}</td>
                        <td>{{ $inscripcion-> inscrip_curs_fecha}}</td>
                        <td>{{ $inscripcion-> curs -> curs_nom}}</td>
                        <td>{{ $inscripcion-> grupo_curso -> grup_curs_cod}}</td>
                        <td>{{ $inscripcion-> persona -> per_nom . $inscripcion-> persona -> per_appm}}</td>
                        <td>
                            <div class="d-flex">
                                <a style="margin: 2px;" href="{{ route('inscripciones.showCurso', $inscripcion->inscrip_curs_id) }}" class="btn btn-primary btn-sm">Ver</a>

                                <form action="{{ route('inscripciones.destroy', $inscripcion-> persona->per_id) }}" method="POST">
                                    @csrf()
                                    @method('DELETE')
                                    <button type="submit" style="margin: 2px;" class="btn btn-danger btn-sm">Anular</button>
                                </form>
                            </div>
                        </td>
                        @endif
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>