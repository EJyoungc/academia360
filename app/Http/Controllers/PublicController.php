<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Models\Package;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    //

    public function index()
    {

        return redirect()->route('login');
        //
    }
}
