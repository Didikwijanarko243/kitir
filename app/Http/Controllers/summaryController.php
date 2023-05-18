<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class summaryController extends Controller
{
    public function index()
    {
        return view('pages.summary');
    }
}
