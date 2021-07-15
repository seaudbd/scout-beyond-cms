<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function loadHomePage() {
        $title = 'Home';
        return view('Frontend/home', compact('title'));
    }
}
