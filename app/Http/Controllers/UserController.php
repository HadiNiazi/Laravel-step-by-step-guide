<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $name = "Hadi Niazi";
        return view('user.index', compact('name'));
    }

    public function show($id)
    {
        return "My id is ".$id;
    }
}
