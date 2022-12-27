<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProgramaController extends Controller
{
    //
    public function index()
    {
        $programas = DB::table('programa')->get();
        return view('content.pages.pages-programa', ['listaProgramas' => $programas]);
    }
}
