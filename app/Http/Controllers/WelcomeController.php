<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class WelcomeController extends Controller
{
    public function index()
    {
        $menus = Menu::where('is_active', true)->get();
        return view('welcome', compact('menus'));
    }
}
