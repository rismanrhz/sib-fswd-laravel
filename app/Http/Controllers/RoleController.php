<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index()
    {
        $role = [
            [
                "id" => 'RL-1',
                "role" => 'admin'
            ],
            [
                "id" => 'RL-2',
                "role" => 'user'
            ]
        ];

        return view('role.index', compact('role'));
    }
}
