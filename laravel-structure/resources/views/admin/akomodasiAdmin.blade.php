@extends('admin/layout/master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <button type="button" name="button" class="btn btn-primary"  data-toggle="modal" data-target="#akomodasiModal">+Tambah Data Akomodasi</button>
        <br><br>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Akomodasi</div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="table-akomodasi"></div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Add wisata Modal-->
<div class="modal fade" id="akomodasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Akomodasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-akomodasi">
                    @csrf

                    <label for="nama">Nama Akomodasi</label>
                    <input type="text" class="form-control" id="" name="nama">

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="tex" class="form-control" id="deskripsi-akomodasi" name=""> </textarea>

                    <label for="lokasi" class="mt-2">Lokasi</label>
                    <p>Masukkan latitude dan longitude tempat akomodasi Anda (bisa dilihat di google maps)</p>
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" id="" name="lat" placeholder="Latitude">
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" id="" name="lon" placeholder="Longitude">
                      </div>
                    </div>

                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input input id="gambar" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="Submit">
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>

<!-- Edit wisata Modal-->
<div class="modal fade" id="editAkomodasiModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Akomodasi</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-akomodasi">
                    @csrf

                    <label for="nama">Nama Akomodasi</label>
                    <input type="text" class="form-control" id="" name="nama-edit">

                    <label for="deskripsi" class="mt-2">Deskripsi</label>
                    <textarea type="tex" class="form-control" id="deskripsi-akomodasi-edit" name=""> </textarea>

                    <label for="lokasi" class="mt-2">Lokasi</label>
                    <p>Masukkan latitude dan longitude tempat akomodasi Anda (bisa dilihat di google maps)</p>
                    <div class="row">
                      <div class="col">
                        <input type="text" class="form-control" id="" name="lat-edit" placeholder="Latitude">
                      </div>
                      <div class="col">
                        <input type="text" class="form-control" id="" name="lon-edit" placeholder="Longitude">
                      </div>
                    </div>


                    <div class="form-group mt-3">
                        <label for="file">View Gambar</label>
                        <br>
                        <img id="image-edit-akomodasi" src="" style="width: 70%; height: 70%; border-radius: 10px;" alt="">
                    </div>
                    <div class="form-group mt-3">
                        <label for="file">Gambar</label>
                        <input input id="gambar-edit" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <input type="hidden" name="edit-id" value="">
                    </div>

                </form>

            </div>

        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('admin/js/akomodasi.js') }}"></script>
@endsection
