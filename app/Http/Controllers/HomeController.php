<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('welcome');
    }
}
