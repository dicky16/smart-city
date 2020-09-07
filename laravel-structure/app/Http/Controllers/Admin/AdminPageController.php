<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Auth;

class AdminPageController
{
    public function index()
    {
      return view('admin/index');
    }

    public function logout()
    {
      Auth::logout();
      return redirect('/');
    }
}
