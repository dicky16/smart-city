<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController
{
    public function index()
    {
      $wisata = DB::table('wisata')->paginate(6);
      // $kuliner = DB::table('kuliner')->paginate(6);
      // $akomodasi = DB::table('akomodasi')->paginate(6);
      // $artikel = DB::table('artikel')->paginate(6);
      return view('user.index', compact(['wisata']));
    }

    public function getWisata()
    {
      $wisata = DB::table('wisata')->get();
      return response()->json([
        'data' => $wisata
      ]);
    }

    public function getAkomodasi()
    {
      $akomodasi = DB::table('akomodasi')->get();
      return response()->json([
        'data' => $akomodasi
      ]);
    }

    public function getArtikel()
    {
      $artikel = DB::table('artikel')->get();
      return response()->json([
        'data' => $artikel
      ]);
    }

    public function getKuliner()
    {
      $artikel = DB::table('kuliner')->get();
      return response()->json([
        'data' => $artikel
      ]);
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

    public function contact()
    {
      return view('user/contact');
    }
}
