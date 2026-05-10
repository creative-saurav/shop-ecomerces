<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class DashboardController extends Controller
{
    //
    public function index()
    {
        return view('admin.dashboard');
    }

    public function cacheClear()
    {
        Artisan::call('cache:clear');
        return redirect()->back()->with('success', 'Cache cleared successfully.');
    }
}
