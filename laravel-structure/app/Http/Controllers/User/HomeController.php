<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

class HomeController
{
    public function index()
    {
      return view('user.index');
    }

    public function tes()
    {
      return view('tes');
    }

    public function login()
    {
      return view('auth/loginUser');
    }

    public function show($id)
    {
      return view('user/detail');
    }

    public function about()
    {
      return view('user/about');
    }
}
