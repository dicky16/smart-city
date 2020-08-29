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
}
