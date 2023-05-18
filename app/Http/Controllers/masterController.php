<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class masterController extends Controller
{
    public function index()
    {
        
        return view('pages.master');
    }

}
