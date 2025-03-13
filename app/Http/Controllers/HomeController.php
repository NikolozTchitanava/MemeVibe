<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Welcome to Memeviibe',
            'message' => 'This is the initial home page of Memeviibe!',
        ];

        return view('home', $data);
    }
}
