<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Middleware\RedirectionToRole;

class HomeController extends Controller
{

    //nothing here except redirection according user role

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware(RedirectionToRole::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
