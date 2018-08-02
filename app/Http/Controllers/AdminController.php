<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function customers()
    {
        return view('admin.customers');
    }

    public function products()
    {
        return view('admin.products');
    }

    public function payments()
    {
        return view('admin.payments');
    }

    public function bookings()
    {
        return view('admin.bookings');
    }
}
