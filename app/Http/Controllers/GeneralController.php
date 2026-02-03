<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GeneralController extends Controller
{
    /**
     * Display the home page.
     */
    public function index() {
        return view('index');
    }
}
