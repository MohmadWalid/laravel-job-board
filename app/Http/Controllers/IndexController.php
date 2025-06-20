<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index()
    {
        return view('jobs.index');
    }
    function contact()
    {
        return view('jobs.contact', ['pageTitle' => 'Contact']);
    }
    function about()
    {
        return view('jobs.about', ['pageTitle' => 'About']);
    }
}
