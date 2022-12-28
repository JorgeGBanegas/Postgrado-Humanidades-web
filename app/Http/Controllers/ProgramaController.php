<?php

namespace App\Http\Controllers;

use App\Models\Programa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProgramaController extends Controller
{
    //
    public function index()
    {
        //        $programas = DB::table('programa')->get();
        $programas = Programa::get();
        return view('content.pages.pages-programa', ['listaProgramas' => $programas]);
    }
}
