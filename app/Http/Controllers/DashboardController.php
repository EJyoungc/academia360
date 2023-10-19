<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Routing\Route;
use Illuminate\Support\Facades\Cache;

class DashboardController extends Controller
{
    //

    public function index()
    {
        // Artisan::call('storage:link');

        return view('dashboard');
    }
}
