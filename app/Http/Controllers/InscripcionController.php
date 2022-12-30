<?php

namespace App\Http\Controllers;

use App\Models\InscripcionCurso;
use App\Models\InscripcionPrograma;
use App\Models\Persona;
use App\Models\Programa;
use Illuminate\Http\Request;

class InscripcionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscrProg = InscripcionPrograma::get();
        $inscrCurs = InscripcionCurso::get();
        /*return $inscrProg->programa; */
        return view('content.pages.personas.pages-persona-inscritos', ['inscritosProg' => $inscrProg], ['inscritosCurs' => $inscrCurs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estudiantes = Persona::where('per_tipo', [1])->get();
        return view('content.pages.personas.pages-persona-inscripcion', ['listaEstudiantes' => $estudiantes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $alumno = Persona::where('per_ci', [$request->input('inscripcion_alumno')])->get()->all();
        //Inscribir Programa
        if ($request->input('tipo_inscripcion') == 1) {


            $inscripcion =  InscripcionPrograma::where([
                ['estudiante', '=',  $alumno[0]->per_id],
                ['programa', '=', $request->input('inscripcion_programa')],
                ['grupo', '=', $request->input('inscripcion_grupo')]
            ])->get();

            if (sizeof($inscripcion) == 0) {
                InscripcionPrograma::create([
                    'inscrip_program_fecha' => now(),
                    'estudiante' => $alumno[0]->per_id,
                    'programa' => $request->input('inscripcion_programa'),
                    'grupo' => $request->input('inscripcion_grupo')
                ]);
            } else {
                return redirect()->back()->withErrors(['er' => 'Ya esta inscritos en este programa']);
            }

            return to_route('inscripciones.index');
        } else if ($request->input('tipo_inscripcion') == 2) {
            $inscripcion =  InscripcionCurso::where([
                ['estudiante', '=',  $alumno[0]->per_id],
                ['curso', '=', $request->input('inscripcion_curso')],
                ['grupo', '=', $request->input('inscripcion_grupo')]
            ])->get();

            if ((sizeof($inscripcion) == 0)) {
                InscripcionCurso::create([
                    'inscrip_curs_fecha' => now(),
                    'estudiante' => $alumno[0]->per_id,
                    'curso' => $request->input('inscripcion_curso'),
                    'grupo' => $request->input('inscripcion_grupo')
                ]);
            } else {
                return redirect()->back()->withErrors(['er' => 'Ya esta inscritos en este curso']);
            }

            return to_route('inscripciones.index');
        } else {
            return redirect()->back()->withErrors(['er' => 'Error, intente de nuevo mas tarde...']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
