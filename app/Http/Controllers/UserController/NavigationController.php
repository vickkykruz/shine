<?php

namespace App\Http\Controllers\UserController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;

class NavigationController extends Controller
{
    public function home(): View
	{
		return view('pages.home');
	}
}
