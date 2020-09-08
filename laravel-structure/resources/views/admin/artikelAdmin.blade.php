@extends('admin/layout/master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <button type="button" name="button" class="btn btn-primary"  data-toggle="modal" data-target="#artikelModal">+Tambah Artikel</button>
        <br><br>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Artikel</div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="table-artikel"></div>
                </div>
            </div>
        </div>
    </div>
</main>

<!-- Add wisata Modal-->
<div class="modal fade" id="artikelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Artikel</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-tambah-artikel">
                    @csrf

                    <label for="namatenaga">Judul</label>
                    <input type="text" class="form-control" id="" name="nama">

                    <label for="alamat" class="mt-2">Deskripsi</label>
                    <textarea type="tex" class="form-control" id="deskripsi-artikel" name=""> </textarea>

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
<div class="modal fade" id="editArtikelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Wisata</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form accept-charset="utf-8" enctype="multipart/form-data" method="post" action="" id="form-edit-artikel">
                    @csrf

                    <label for="namatenaga">Judul</label>
                    <input type="text" class="form-control" id="" name="nama-edit">

                    <label for="alamat" class="mt-2">Deskripsi</label>
                    <textarea type="tex" class="form-control" id="deskripsi-artikel-edit" name=""> </textarea>

                    <div class="form-group mt-3">
                        <label for="file">View Gambar</label>
                        <br>
                        <img id="image-edit-artikel" src="" style="width: 70%; height: 70%; border-radius: 10px;" alt="">
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
<script src="{{ asset('admin/js/artikel.js') }}"></script>
@endsection
