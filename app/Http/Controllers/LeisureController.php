<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LeisureController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $profiles = Profile::all();
        // return view('home', compact('profiles'));
        return view('leisure.index');
    }

    public function salt()
    {
        // $profiles = Profile::all();
        // return view('home', compact('profiles'));
        return view('leisure.salt');
    }

    public function lighting()
    {
        // $profiles = Profile::all();
        // return view('home', compact('profiles'));
        return view('leisure.lighting');
    }

    public function aroma()
    {
        // $profiles = Profile::all();
        // return view('home', compact('profiles'));
        return view('leisure.aroma');
    }

    public function sound()
    {
        // $profiles = Profile::all();
        // return view('home', compact('profiles'));
        return view('leisure.sound');
    }

    
}
