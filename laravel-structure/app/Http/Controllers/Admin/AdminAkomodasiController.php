<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables, Auth, File;

class AdminAkomodasiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/akomodasiAdmin');
    }

    public function getAkomodasiDatatable()
    {
      $data = DB::table('akomodasi')
      ->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-edit-akomodasi" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-delete-akomodasi" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
      ->make(true);
    }

    public function loadDataTable()
    {
      return view('datatable/tableAkomodasi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $nama = $request->nama;
      $deskripsi = $request->deskripsi;
      $lokasi = $request->lokasi;
      $gambar = $request->file('gambar');
      $id = Auth::id();

      $fileEx = $gambar->getClientOriginalName();
      $fileArr = explode(".", $fileEx);
      $panjangArray = count($fileArr);
      $indexTerakhir = $panjangArray - 1;
      if($this->checkGambar($fileArr[$indexTerakhir])) {
        $gambarName = time().'_'.$fileEx;
        $gambarPath = "img/akomodasi";
        $gambar->move($gambarPath, $gambarName, "public");

        $akomodasi = DB::table('akomodasi')->insert([
          'nama' => $nama,
          'deskripsi' => $deskripsi,
          'lokasi' => $lokasi,
          'gambar' => $gambarPath.'/'.$gambarName,
          'id_user' => $id,
          'created_at' =>  \Carbon\Carbon::now(),
        ]);

        if($akomodasi) {
          return response()->json([
            'status' => 'ok',
          ]);
        }
      } else {
        return response()->json([
          'status' => 'image_not_valid'
        ]);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('akomodasi')->where('id', $id)->get();
        return response()->json([
          'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $nama = $request->nama;
      $deskripsi = $request->deskripsi;
      $lokasi = $request->lokasi;
      $gambar = $request->file('gambar');
      $id = Auth::id();
      if($gambar != null) {
      $fileEx = $gambar->getClientOriginalName();
      $fileArr = explode(".", $fileEx);
      $panjangArray = count($fileArr);
      $indexTerakhir = $panjangArray - 1;
      if($this->checkGambar($fileArr[$indexTerakhir])) {
        $gambarName = time().'_'.$fileEx;
        $gambarPath = "img/akomodasi";
        $gambar->move($gambarPath, $gambarName, "public");
        $gambarHapus = DB::table('akomodasi')->where('id', $id)->value('gambar');
        File::delete($gambarHapus);

        $akomodasi = DB::table('akomodasi')->where('id', $id)->update([
          'nama' => $nama,
          'deskripsi' => $deskripsi,
          'lokasi' => $lokasi,
          'gambar' => $gambarPath.'/'.$gambarName,
          'id_user' => $id,
          'updated_at' => \Carbon\Carbon::now(),
        ]);

        if($akomodasi) {
          return response()->json([
            'status' => 'ok',
          ]);
        }
      } else {
        return response()->json([
          'status' => 'image_not_valid'
        ]);
      }
    } else {
      $akomodasi = DB::table('akomodasi')->where('id', $id)->update([
        'nama' => $nama,
        'deskripsi' => $deskripsi,
        'lokasi' => $lokasi,
        'id_user' => $id,
        'updated_at' => \Carbon\Carbon::now(),
      ]);
      if($akomodasi) {
        return response()->json([
          'status' => 'ok'
        ]);
      }
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('akomodasi')->where('id', $id)->delete();
        return response()->json([
          'status' => 'deleted'
        ]);
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