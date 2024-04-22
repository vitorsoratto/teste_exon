<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StructureController extends Controller
{
    public function index()
    {
        return view('structures');
    }

    public function register()
    {
        return view('structure.register');
    }
}
