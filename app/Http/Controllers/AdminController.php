<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
    */

    //for authorization
    public function index()
    {
        $is_admin=Auth::user()->is_admin;

        if($is_admin=='1')
        {
            return view('admin.index');
        }
        else
        {
            // return view('index');
            return view('dashboard');
        }
    }
}
