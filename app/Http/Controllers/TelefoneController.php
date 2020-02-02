<?php

namespace App\Http\Controllers;

use App\Telefone;
use App\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TelefoneController extends Controller
{
    //
    public function getIndex()
    {
//        $fones = DB::table('users')->orderBy('name', 'asc')->get();

        $pessoas = Pessoa::where('id', 1)->first();






        return view('findex')->with('pessoas', $pessoas);
    }
}
