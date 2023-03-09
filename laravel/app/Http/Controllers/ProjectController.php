<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function dropdowns()
    {
        return view('projects.dropdown');
    }

    public function postDropdowns(Request $request)
    {
        return $request->all();
    }
}
