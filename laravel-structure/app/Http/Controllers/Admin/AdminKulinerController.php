<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use DataTables, Auth, File;

class AdminKulinerController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/kulinerAdmin');
    }

    public function getKulinerDatatable()
    {
      $data = DB::table('kuliner')
      ->get();
      return Datatables::of($data)
      ->addIndexColumn()
      ->addColumn('aksi', function($row){
          $btn = '<a href="javascript:void(0)" data-id="'.$row->id.'" class="btn-edit-kuliner" style="font-size: 18pt; text-decoration: none;" class="mr-3">
          <i class="fas fa-pen-square"></i>
          </a>';
          $btn = $btn. '<a href="javascript:void(0)" data-id="'.$row->id.'" data-nama="'.$row->nama.'" class="btn-delete-kuliner" style="font-size: 18pt; text-decoration: none; color:red;">
          <i class="fas fa-trash"></i>
          </a>';
          return $btn;
        })
      ->rawColumns(['aksi'])
      ->make(true);
    }

    public function loadDataTable()
    {
      return view('datatable/tableKulinerAdmin');
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
        $jamBuka = $request->jam;
        $gambar = $request->file('gambar');

        $fileEx = $gambar->getClientOriginalName();
        $fileArr = explode(".", $fileEx);
        $panjangArray = count($fileArr);
        $indexTerakhir = $panjangArray - 1;
        if($this->checkGambar($fileArr[$indexTerakhir])) {
          $gambarName = time().'_'.$fileEx;
          $gambarPath = "img/kuliner";
          $gambar->move($gambarPath, $gambarName, "public");

          $wisata = DB::table('kuliner')->insert([
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'lokasi' => $lokasi,
            'jam_buka' => $jamBuka,
            'gambar' => $gambarPath.'/'.$gambarName,
            'id_user' => Auth::id()
          ]);

          if($wisata) {
            return response()->json([
              'status' => 'ok'
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
        $data = DB::table('kuliner')->where('id', $id)->get();
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
      $jamBuka = $request->jam;
      $gambar = $request->file('gambar');
      if($gambar != null) {
        $fileEx = $gambar->getClientOriginalName();
        $fileArr = explode(".", $fileEx);
        $panjangArray = count($fileArr);
        $indexTerakhir = $panjangArray - 1;
        if($this->checkGambar($fileArr[$indexTerakhir])) {
          $gambarName = time().'_'.$fileEx;
          $gambarPath = "img/kuliner";
          $gambarDelete = DB::table('kuliner')->where('id', $id)->value('gambar');
          File::delete($gambarDelete);
          $gambar->move($gambarPath, $gambarName, "public");

          $wisata = DB::table('kuliner')->where('id', $id)->update([
            'nama' => $nama,
            'deskripsi' => $deskripsi,
            'lokasi' => $lokasi,
            'jam_buka' => $jamBuka,
            'gambar' => $gambarPath.'/'.$gambarName,
          ]);

          if($wisata) {
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
        $wisata = DB::table('kuliner')->where('id', $id)->update([
          'nama' => $nama,
          'deskripsi' => $deskripsi,
          'lokasi' => $lokasi,
          'jam_buka' => $jamBuka,
        ]);

        return response()->json([
          'status' => 'ok'
        ]);
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
      $gambarPath = DB::table('kuliner')->where('id', $id)->value('gambar');
      File::delete($gambarPath);
      DB::table('kuliner')->where('id', $id)->delete();
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
