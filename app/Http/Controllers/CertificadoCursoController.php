<?php

namespace App\Http\Controllers;

use App\Models\CertificadoCurso;
use App\Models\InscripcionCurso;
use Illuminate\Http\Request;

class CertificadoCursoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('content.pages.certificados.pages-certificado-curso');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        date_default_timezone_set("America/La_Paz");
        setlocale(LC_TIME, 'es_BO.UTF-8', 'esp');
        $id = $request->input('inscrip_curs_id');
        $descrip =  $request->input('cert_curs_descrip');
        $inscripcion = InscripcionCurso::find($id);
        $fecha = $request->input('cert_curs_fecha');
        if ($inscripcion) {
            $existeCertificado = CertificadoCurso::where([
                ['estudiante', '=', $inscripcion->persona->per_id],
                ['curso', '=', $inscripcion->curs->curs_id]
            ])->get();

            if (sizeof($existeCertificado) > 0) {
                return redirect()->back()->withErrors(['err' => 'El estudiante ya tiene un certificado de este curso']);
            }
            $certificado = CertificadoCurso::create([
                'cert_curs_descrip' => $descrip,
                'cert_curs_fecha' => $fecha,
                'estudiante' => $inscripcion->persona->per_id,
                'curso' => $inscripcion->curs->curs_id
            ]);

            return view('content.pages.certificados.pages-certificados-cursos-view', ['certificado' => $certificado]);
        }
        return redirect()->back()->withErrors(['er' => 'El Id no existe o el estudiante no esta inscrito']);
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
