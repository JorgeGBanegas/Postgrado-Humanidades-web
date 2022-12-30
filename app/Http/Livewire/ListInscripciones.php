<?php

namespace App\Http\Livewire;

use App\Models\InscripcionCurso;
use App\Models\InscripcionPrograma;
use Livewire\Component;

class ListInscripciones extends Component
{
    public $selected;
    public $esPrograma = true;

    public $inscritos = [];

    public function mount()
    {
        $this->inscritos = InscripcionPrograma::get();
    }
    public function render()
    {
        return view('livewire.list-inscripciones');
    }

    public function updatedselected($id)
    {
        if ($id == 1) {
            $this->esPrograma = true;
            $this->reset(['inscritos']);
            $this->inscritos = InscripcionPrograma::get();
        } else {
            $this->esPrograma = false;
            $this->reset(['inscritos']);
            $this->inscritos = InscripcionCurso::get();
        }
    }
}
