@extends('admin.layout')
@section('page_title', 'Manage Banner')
@section('banner_select', 'active')
@section('container')
    <h3> Manage Banner</h3>
    <div class="row">

        <div class="col-lg-12  mt-2">
            <div class="table-data__tool-right mb-2">
                <a href="banner">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Back</button>
                </a>
            </div>
            <div class="card">
                @if (session()->has('message'))
                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                        {{ session('message') }}

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                @endif
                <div class="card-header">Add Banner</div>
                <div class="card-body">



                    <form action="{{ route('banner.insert') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                            <div class="col-md-6">
                            <label for="category" class="control-label mb-1">Banner Name</label>
                            <input id="name" name="name" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $name }}" required>
                            @error('name')
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="category" class="control-label mb-1">Banner Image</label>
                            <input id="name" name="image" type="file" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $image }}" required>
                                @if($image != '')
                                <img width="80px" src="{{ asset('storage/media/' . $image ) }}"/>
                                @endif
                            @error('image')
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="category" class="control-label mb-1">Btn Text</label>
                            <input id="name" name="btn_text" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $btn_text }}" required>
                            @error('name')
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="category" class="control-label mb-1">Btn Link</label>
                            <input id="name" name="btn_link" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $btn_link }}" required>
                            @error('name')
                            @enderror
                        </div>
                        </div>

                    </div>


                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                                <span id="payment-button-amount">Submit</span>

                            </button>
                        </div>
                        <input type="hidden" name="id" value="{{ $id }}">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
