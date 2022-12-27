@extends('layouts/contentNavbarLayout')

@section('title', 'Programas')

@section('content')
<!-- Basic Bootstrap Table -->
<div class="card">
    <h5 class="card-header">Listado de Programas</h5>
    <div class="table-responsive text-nowrap">
        <table class="table">
            <thead>
                <tr>
                    <th>Programa</th>
                    <th>Precio</th>
                    <th>Modalidad</th>
                    <th>Tipo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @foreach($listaProgramas AS $programa)
                <tr>
                    <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{ $programa -> program_nom}}</strong></td>
                    <td>{{ $programa -> program_precio}}</td>
                    <td>{{ $programa -> program_modalidad}}</td>
                    <td>{{ $programa -> program_tipo}}</span></td>
                    <td>
                        <div class="dropdown">
                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);"><i class="bx bx-trash me-1"></i> Delete</a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection