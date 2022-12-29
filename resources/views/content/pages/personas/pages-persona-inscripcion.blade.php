@php
$isNavbar = false;
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', ' Registro - Forms')

@section('content')
<h4 class="fw-bold py-3 mb-4">Formulario de Inscripcion</h4>

<!-- Basic Layout & Basic with Icons -->
<div class="row">
    <!-- Basic Layout -->
    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Datos de inscripcion</h5> <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    @csrf
                    <div class="container">
                        <div class="row mb-3">
                            <div class="col">
                                <label for="DataListEstudiantes" class="form-label">Buscar Estudiantes Registrados</label>
                                <input class="form-control" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                                <datalist id="datalistOptions">
                                    <option value="6366404"> Jorge
                                    <option value="New York">
                                    <option value="Seattle">
                                    <option value="Los Angeles">
                                    <option value="Chicago">
                                </datalist>
                            </div>
                        </div>
                    </div>
                    @livewire('select-anidado')


                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection