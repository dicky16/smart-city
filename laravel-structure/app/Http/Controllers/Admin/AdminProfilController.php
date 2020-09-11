<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables, Auth, File;
use App\User;

class AdminProfilController
{
    public function index($id)
    {
      $data = DB::table('users')->where('id', $id)->get();
      return view('admin/profil', ['data' => $data]);
    }

    public function update(Request $req, $id)
    {
      $nama = $req->nama;
      $email = $req->email;
      $gambar = $req->file('gambar');

      if($gambar != null) {
        $fileEx = $gambar->getClientOriginalName();
        $fileArr = explode(".", $fileEx);
        $panjangArray = count($fileArr);
        $indexTerakhir = $panjangArray - 1;
        if($this->checkGambar($fileArr[$indexTerakhir])) {
          $gambarName = time().'_'.$fileEx;
          $gambarPath = "img/profil";
          $gambar->move($gambarPath, $gambarName, "public");
          $gambarHapus = DB::table('users')->where('id', $id)->value('gambar');
          File::delete($gambarHapus);

          $profil = User::find($id);
          $profil->name = $nama;
          $profil->email = $email;
          $profil->gambar = $gambarPath.'/'.$gambarName;
          $profil->save();

          if($profil) {
            return response()->json([
              'status' => 'ok'
            ]);
          }

      } else {
        return response()->json([
          'status' => 'image_not_valid'
        ]);
      }
    } else {
      $profil = User::find($id);
      $profil->name = $nama;
      $profil->email = $email;
      $profil->save();

      if($profil) {
        return response()->json([
          'status' => 'ok'
        ]);
      }
    }
    }

    function checkGambar($file)
    {
      $file = strtolower($file);
      $ex = array("png","jpg","jpeg","svg","gif");
      if(in_array($file, $ex)) {
        return true;
      }
      return false;
    }
}
