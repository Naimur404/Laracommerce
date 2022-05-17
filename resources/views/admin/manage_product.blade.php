@extends('admin.layout')
@section('page_title', 'Manage Product')
@section('product_select', 'active')
@section('container')
@if($id>0)
{{ $image_requried = " " }}
@else
{{ $image_requried = "requried" }}
@endif
    <h3> Manage Product</h3>
    <div class="row">

        <div class="col-lg-12  mt-2">
            <div class="table-data__tool-right mb-2">
                <a href="product">
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
                <div class="card-header">Add Product</div>
                <div class="card-body">



                    <form action="{{ route('product.insert') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Product Name</label>
                            <input id="name" name="name" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $name }}" required>
                            @error('name')
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Product Image</label>
                            <input id="image" name="image" type="file" class="form-control" aria-required="true"
                                aria-invalid="false"  {{ $image_requried }}>
                            @error('image')
                            <div class="alert alert-danger" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Slug</label>
                            <input id="slug" name="slug" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $slug }}" required>
                            @error('slug')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Category</label>
                            <select id="slug" name="category_id" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" required>
                                <option value="">Select Category</option>
                                @foreach ($category as $list)
                                @if ($category_id == $list->id)
                                <option selected value="{{ $list->id }}">
                                    @else
                                    <option value="{{ $list->id }}">
                                @endif
                                {{ $list->name }}</option>
                                @endforeach

                            </select>

                            @error('slug')
                                <div class="alert alert-danger" role="alert">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Product Brand</label>
                            <input id="name" name="brand" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $brand }}" required>

                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Product Model</label>
                            <input id="name" name="model" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $model }}" required>

                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Short Desc</label>
                            <textarea id="name" name="short_desc" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">{{ $short_desc }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label mb-1"> Desc</label>
                            <textarea id="name" name="desc" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">{{ $desc }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Keywords</label>
                            <textarea id="name" name="keywords" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">{{ $keywords }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Technical Specification </label>
                            <textarea id="name" name="technical_specification" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">{{ $technical_specification }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Uses</label>
                            <textarea id="name" name="uses" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">{{ $uses }}</textarea>

                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Warranty</label>
                            <textarea id="name" name="warranty" type="text" class="form-control" aria-required="true"
                                aria-invalid="false">{{ $warranty }}</textarea>

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
