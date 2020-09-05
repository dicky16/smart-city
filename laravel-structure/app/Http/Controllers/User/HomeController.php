<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {
      $data = DB::table('wisata')->paginate(6);
      return view('user.index', ['wisata' => $data]);
    }

    public function tes()
    {
      return view('tes');
    }

    public function login()
    {
      return view('auth/loginUser');
    }

    public function show()
    {
      return view('user/detail');
    }

    public function about()
    {
      return view('user/about');
    }
}
