<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Listing;
use App\Models\Package;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    //



    public function test_page(){




       $users = User::where('email','admin@admin.com')->get();
        // dd($users);
        return view('test')->with('users',$users);


    }


    public function index()
    {

        return redirect()->route('login');
        //
    }
}
