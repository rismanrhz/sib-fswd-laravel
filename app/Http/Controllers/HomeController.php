<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        return view('home');
    }

    public function create(): View
    {
        return view('create');
    }

    public function show($home = null): View
    {
        return view('detail');
    }

    public function edit($home = null): View
    {
        return view('edit');
    }

    public function destroy($home = null): View
    {
        return view('create');
    }
}
