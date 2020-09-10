<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserWisataController
{
    public function index($id)
    {
      $data = DB::table('wisata')->where('id', $id)->get();
      return view('user/detailWisata', ['data' => $data]);
    }

    public function show($id)
    {
      $data = DB::table('wisata')->where('id', $id)->get();
      return response()->json([
        'data' => $data
      ]);
    }
}
