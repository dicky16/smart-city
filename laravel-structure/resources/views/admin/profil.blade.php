@extends('admin/layout/master')
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Edit Profile</h1>
        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>-->
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- edit form column -->
        <div class="col-md-9 personal-info">


            <form class="form-horizontal" role="form">


                <div class="form-group row mt-2" >
                    <div class="col-sm-6 mb-3 mb-sm-2" sty>
                        <div class="text-center">
                            <img src="{{ url('') }}/{{ auth()->user()->gambar }}" class="w-50 p-3">
                            <h6>Upload a different photo...</h6>
                            <div class="form-group" style="margin-left:80pt;">
                                <input input id="gambar" type="file" name="gambar" accept="image/*" onchange="readURL(this);" aria-describedby="inputGroupFileAddon01">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Username:</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="{{ auth()->user()->name }}" name="name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-3 control-label">Email:</label>
                            <div class="col-lg-12">
                                <input class="form-control" type="text" value="{{ auth()->user()->email }}" name="email">
                                <input type="hidden" name="edit-id" value="{{ auth()->user()->id }}">
                            </div>
                        </div>
                        <div class="form-group" style="margin-top:65pt;">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-12">
                                <input type="button" class="btn btn-primary" data-id="{{ auth()->user()->id }}" id="btn-edit-profile" value="Save Changes">
                                <span></span>
                                <a href="{{url('dashboard')}}" class="btn btn-default">Cancel</a>
                            </div>
                        </div>
                    </div>
                </div>


            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="{{ asset('admin/js/profil.js') }}"></script>
@endsection
