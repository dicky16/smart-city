@extends('admin/layout/master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <button type="button" name="button" class="btn btn-primary">+Tambah Wisata</button>
        <br><br>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="table-wisata"></div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
