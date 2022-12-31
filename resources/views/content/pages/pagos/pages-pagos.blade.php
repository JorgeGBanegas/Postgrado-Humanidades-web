@extends('layouts/contentNavbarLayout')

@section('title', 'Registros')
@section('page-script')
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
@endsection

@section('content')



<!-- Basic Bootstrap Table -->
<a style="margin-bottom: 25px;" href="personas/create" class="btn btn-primary">Registrar</a>

<!--- Listado--->
<div class="card">
    <div style="align-items: center; display: inline-flex; justify-content: space-between;">
        <h5 class="card-header">Listado de Personas Registradas </h5>
    </div>

    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Nro Inscripcion</th>
                    <th>Estudiante</th>
                    <th>Programa</th>
                    <th>Descripcion Pago</th>
                    <th>Total a pagar</th>
                    <th>Tipo De pago</th>
                    <th>Acciones</th>

                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                <tr>
                    @foreach($PlanesDePago as $plan)
                    <td>{{$plan->inscripcion_programa->inscrip_program_nro}}</td>
                    <td>{{$plan->inscripcion_programa->persona->per_nom}} {{$plan->inscripcion_programa->persona->per_appm}}</td>
                    <td>{{$plan->inscripcion_programa->program->program_nom}}</td>
                    <td>{{$plan->plan_pago_descrip}}</td>
                    <td>{{$plan->plan_pago_pagtot}}</td>
                    @php
                    $cantPagos = count($plan->pagos)
                    @endphp
                    @if($cantPagos > 1)
                    <td>Plan de pagos</td>
                    @else
                    <td>Pago al contado</td>
                    @endif
                    <td>
                        <div class="d-flex">
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
    Aqui la paginacion
</div>
@endsection