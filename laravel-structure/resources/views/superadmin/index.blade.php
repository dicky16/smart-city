@extends('superadmin/layout/master')
@section('content')
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Tables</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Tables</li>
        </ol>
        <div class="card mb-4">
            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Admin</div>
            <div class="card-body">
                <div class="table-responsive">
                    <div id="table-admin"></div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('js')
<script src="{{ asset('superadmin/js/superadmin.js') }}"></script>
@endsection
