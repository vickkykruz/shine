<?php

namespace App\Http\Controllers\ViewController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('welcome');
    }
	
	public function service(): View
    {
        return view('services');
    }

    public function contact(): View
    {
        return view('contact');
    }
}
