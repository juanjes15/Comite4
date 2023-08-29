<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstructorViewController extends Controller
{
    public function index()
    {
        return view('instructorViews.solicitar1');
    }
}
