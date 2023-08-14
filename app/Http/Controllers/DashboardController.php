<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index ()
    {
        return Inertia::render('Dashboard');
    }
    public function store(Request $request)
    {
        return Inertia::render('About',[
            'firstName' => $request->firstName
        ]);
    }
}
