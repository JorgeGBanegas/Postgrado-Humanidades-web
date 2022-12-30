<div class="container">
    <div class="row mb-3">
        <div class="col-4">
            <label class="form-label">Tipo de Inscripcion</label>
            <select name="tipo_inscripcion" required wire:model="selectedTipoInscripcion" class="form-select">
                <option value="" selected>Seleccionar ...</option>
                @foreach($tipoInscripcion as $tipo)
                <option value="{{ $tipo -> id }}">{{ $tipo -> nombre}}</option>
                @endforeach
            </select>
        </div>

        @if($esPrograma)
        <div class="col-4">
            <label class="form-label">Programas</label>
            <select name="inscripcion_programa" required wire:model="selectedPrograma" class="form-select">
                <option value="" selected>Seleccionar ...</option>
                @foreach($programas as $progr)
                <option value="{{ $progr -> program_id }}">{{ $progr -> program_nom}}</option>
                @endforeach
            </select>
        </div>
        @else
        <div class="col-4">
            <label class="form-label">Programas</label>
            <select wire:model="selectedPrograma" class="form-select" disabled>
            </select>
        </div>
        @endif

        @if($esCurso)
        <div class="col-4">
            <label class="form-label">Cursos</label>
            <select name="inscripcion_curso" required wire:model="selectedCurso" class="form-select">
                <option value="" selected>Seleccionar ...</option>
                @foreach($cursos as $curso)
                <option value="{{ $curso -> curs_id }}">{{ $curso -> curs_nom}}</option>
                @endforeach
            </select>
        </div>
        @else
        <div class="col-4">
            <label class="form-label">Cursos</label>
            <select wire:model="selectedCurso" class="form-select" disabled>

            </select>
        </div>
        @endif

        <div class="col-12" style="margin-top: 10px;">
            @if($esCurso || $esPrograma)
            <label class="form-label">Grupos</label>
            <select name="inscripcion_grupo" required wire:model="selectedGrupos" class="form-select">
                <option value="" selected>Seleccionar ...</option>
                @if($esPrograma)
                @foreach($grupos as $grupo)
                <option value="{{ $grupo -> grup_program_id }}">{{ $grupo -> grup_program_cod}}</option>
                @endforeach

                @else
                @foreach($grupos as $grupo)
                <option value="{{ $grupo -> grup_curs_id }}">{{ $grupo -> grup_curs_cod}}</option>
                @endforeach
                @endif
            </select>
            @else
            <label class="form-label">Grupos</label>
            <select wire:model="selectedGrupos" class="form-select" disabled>
            </select>
            @endif

        </div>

        <div class="col-12">
            @if(sizeof($horarios) > 0)
            <div class="col">
                <label class="form-label">Horarios</label>
                <br>
                @if($esPrograma)
                @foreach($horarios as $horario)
                <label class="form-label">{{$horario->hora_program_dia}} ({{ $horario->hora_program_hini}} - {{$horario->hora_program_hfin}}) </label>
                @endforeach
                @else
                @foreach($horarios as $horario)
                <label class="form-label">{{$horario->hora_curs_dia}} ({{ $horario->hora_curs_hini}} - {{$horario->hora_curs_hfin}}) </label>
                @endforeach
                @endif

            </div>
            @else
            <br>
            <label class="form-label">Sin horarios</label>
            @endif
        </div>
    </div>
</div>