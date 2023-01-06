@php
$isNavbar = false;
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', ' Certificados')

@section('content')

<div>
    @livewire('certificados-cursos')
</div>

@endsection