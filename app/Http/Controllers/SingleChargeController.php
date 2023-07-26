<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SingleChargeController extends Controller
{
    public function index()
    {
        return view('single_charge');
    }
}
