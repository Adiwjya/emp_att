<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AssignController extends Controller
{
    public function index()
    {
        return view('assign.index');
    }
}
