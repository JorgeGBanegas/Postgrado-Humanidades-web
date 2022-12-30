<?php

namespace App\Http\Livewire;

use App\Models\Curso;
use App\Models\GrupoPrograma;
use App\Models\Programa;
use App\Models\HorarioPrograma;
use App\Models\GrupoCurso;
use App\Models\HorarioCurso;
use Livewire\Component;
use stdClass;

class SelectAnidado extends Component
{
    public $selectedTipoInscripcion;
    public $selectedPrograma;
    public $selectedCurso;
    public $selectedGrupos;


    public $programas = [];
    public $cursos = [];
    public $grupos = [];
    public $horarios = [];

    public $esPrograma = false;
    public $esCurso = false;

    public function render()
    {

        $programa = new stdClass();
        $programa->id = 1;
        $programa->nombre = "Programa";

        $curso = new stdClass();
        $curso->id = 2;
        $curso->nombre = "Curso";

        $ti = collect([$programa, $curso]);

        return view('livewire.select-anidado', [
            'tipoInscripcion' => $ti
        ]);
    }

    public function updatedselectedTipoInscripcion($id)
    {
        $this->reset(['horarios']);
        if ($id == 1) {
            $this->programas = Programa::get();
            $this->esCurso = false;
            $this->esPrograma = true;
            $this->reset(['selectedCurso', 'selectedGrupos', 'grupos']);
        } else if ($id == 2) {
            $this->cursos = Curso::get();
            $this->esCurso = true;
            $this->esPrograma = false;
            $this->reset(['selectedPrograma', 'selectedGrupos', 'grupos']);
        } else {
            $this->esCurso = false;
            $this->esPrograma = false;
            $this->reset(['selectedPrograma', 'selectedCurso', 'selectedGrupos', 'grupos']);
        }
    }

    public function updatedselectedPrograma($id)
    {

        if (is_numeric($id)) {
            $this->grupos = GrupoPrograma::where('programa', [$id])->get();
        }
    }

    public function updatedselectedCurso($id)
    {

        if (is_numeric($id)) {
            $this->grupos = GrupoCurso::where('curso', [$id])->get();
        }
    }

    public function updatedselectedGrupos($id)
    {

        if (is_numeric($id)) {
            if ($this->esPrograma) {
                $this->horarios = HorarioPrograma::where('grup_program', [$id])->get();
            } else if ($this->esCurso) {
                $this->horarios = HorarioCurso::where('grup_curs', [$id])->get();
            }
        }
    }
}
