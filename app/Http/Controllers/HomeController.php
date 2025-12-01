<?php

namespace App\Http\Controllers;

use App\Models\Field;

class HomeController extends Controller
{
    public function index()
    {
        $fields = Field::all();
        return view('home', compact('fields'));
    }
}
