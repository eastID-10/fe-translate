<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // Change this to your real backend URL when ready
    private string $apiBase = 'https://kindling-shifty-stumble.ngrok-free.dev';
 
    public function home()
    {
        return view('pages.home', ['apiBase' => $this->apiBase]);
    }
 
    public function about()
    {
        return view('pages.about');
    }
}
 