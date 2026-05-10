<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Home page
    public function index()
    {
        return view('website.theme.' . setting('theme') . '.index');
    }
}
