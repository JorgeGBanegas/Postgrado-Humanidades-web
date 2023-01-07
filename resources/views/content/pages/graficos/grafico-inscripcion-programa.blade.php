@php
$isNavbar = false;
@endphp
@extends('layouts/contentNavbarLayout')

@section('title', ' Registro - Forms')

@section('vendor-script')
<script src="//unpkg.com/alpinejs" defer></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@livewireChartsScripts

@endsection

@section('content')

@livewire('graficas-inscritos-programas')

@endsection