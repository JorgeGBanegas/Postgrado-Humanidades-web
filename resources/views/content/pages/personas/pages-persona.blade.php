@extends('layouts.sections.menu.burguerMenu')

@section('title', 'Listado de Personas')
@section('page-script')
<script src="{{asset('assets/js/ui-modals.js')}}"></script>
@endsection

@section('content-body')

@livewire('lista-personas')

@endsection