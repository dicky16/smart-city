<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminPageController
{
    public function index()
    {
      return view('admin/index');
    }
}
