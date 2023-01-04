<?php

namespace App\Http\Controllers;

use App\Models\InscripcionPrograma;
use App\Models\PlanDePago;
use Exception;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class PagosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inscripciones = InscripcionPrograma::where('inscrip_program_estado', true)->get();
        $plan = PlanDePago::where('plan_pago_pagtot', '>', 0)->paginate(5);
        return view('content.pages.pagos.pages-pagos', ['PlanesDePago' => $plan], ['inscripciones' => $inscripciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($planPago)
    {
        $plan = PlanDePago::find($planPago);
        return view('content.pages.pagos.pages-pagos-registro', ['plan' => $plan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id = $request->input('inscripcion_alumno');
        if (is_numeric($id)) {
            $inscripcion = InscripcionPrograma::find($id);
            if ($inscripcion == null) {
                return redirect()->back()->withErrors(['er' => 'EL nro de inscripcion no existe']);
            }

            $verPlan = PlanDePago::where('inscripcion', $inscripcion->inscrip_program_nro)->get();
            if (sizeof($verPlan) > 0) {
                return redirect()->back()->withErrors(['er' => 'La inscripcion ya esta pagada o ya tiene un plan de pagos']);
            }

            $plan  = PlanDePago::create([
                'plan_pago_descrip' => '',
                'plan_pago_pagtot' => $inscripcion->program->program_precio,
                'inscripcion' => $id
            ]);

            return view('content.pages.pagos.pages-pagos-registro', ['plan' => $plan]);
        } else {
            return redirect()->back()->withErrors(['er' => 'Error... el nro de inscripcion debe ser numerico']);
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

    public function delete($id)
    {
        try {
            $plan = PlanDePago::find($id);
            $plan->delete();
            return to_route('pagos.index');
        } catch (Exception $e) {
            return redirect()->back()->withErrors(['er' => 'Ocurrio un error, verifique su conexion']);
        }
    }
}
