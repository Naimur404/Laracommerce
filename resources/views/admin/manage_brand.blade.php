@extends('admin.layout')
@section('page_title','Manage Brand')
@section('brand_select','active')
@section('container')
    <h3> Manage Brand</h3>
    <div class="row">

        <div class="col-lg-12  mt-2">
            <div class="table-data__tool-right mb-2">
                <a href="category">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Back</button>
                </a>
            </div>
            <div class="card">
                @if(session()->has('message'))
                <div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                    {{ session('message') }}

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                @endif
                <div class="card-header">Add Brand</div>
                <div class="card-body">



                    <form action="{{ route('brand.insert') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Brand Name</label>
                            <input id="name" name="name" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $name }}" required>
                                @error('name')

                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                 </div>
                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Image</label>
                            <input id="image" name="image" type="file" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $image }}">
                                @if($image != '')
                                <img width="80px" src="{{ asset('storage/media/' . $image ) }}"/>
                                @endif
                                @error('image')
                                <div class="alert alert-danger" role="alert">
                                   {{ $message }}
                                </div>

                                @enderror
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
