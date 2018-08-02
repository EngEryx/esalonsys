<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view("index");
    }

    public function services()
    {
        return view('services');
    }

    public function products()
    {
        return view('products');
    }
}
