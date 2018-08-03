<?php

namespace App\Http\Controllers;

use App\SalonItem;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index()
    {
        return view("index")->with('products',SalonItem::all());
    }

    public function services()
    {
        return view('services')->with('products',SalonItem::where(['item_type'=>2])->get());
    }

    public function products()
    {
        return view('products')->with('products',SalonItem::where(['item_type'=>2])->get());
    }
}
