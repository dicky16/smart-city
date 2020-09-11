<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserKulinerController
{
    public function index($id)
    {
      $data = DB::table('kuliner')->where('id', $id)->get();
      return view('user/detailKuliner', ['data' => $data]);
    }

    public function show($id)
    {
      $data = DB::table('kuliner')->where('id', $id)->get();
      return response()->json([
        'data' => $data
      ]);
    }
}
