@extends('admin.layout')
@section('page_title', 'Manage Product')
@section('product_select', 'active')
@section('container')
    @if ($id > 0)
        {{ $image_requried = '' }}
    @else
        {{ $image_requried ='requried'}}
    @endif
    @if(session()->has('sku_error'))
    <div class="alert alert-danger" role="alert">
        {{ session('sku_error') }}
        <button type="button" class="close" data-dismiss="alert" aria-label="close">
            <span aria-hidden="true"></span></button>
    </div>

   @endif
  @error('attr_image.*')
   <div class="alert alert-danger" role="alert">
      {{ $message }}
       <button type="button" class="close" data-dismiss="alert" aria-label="close">
           <span aria-hidden="true"></span></button>
   </div>

  @enderror
  @error('images.*')
   <div class="alert alert-danger" role="alert">
      {{ $message }}
       <button type="button" class="close" data-dismiss="alert" aria-label="close">
           <span aria-hidden="true"></span></button>
   </div>

  @enderror
    <h3> Manage Product</h3>
    <div class="row">

        <form action="{{ route('product.insert') }}" method="post" enctype="multipart/form-data">
        <div class="col-lg-12  mt-2">

                <div class="table-data__tool-right mb-2">
                    <a href="{{ route('admin.product') }}">
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
                                aria-invalid="false" {{ $image_requried }}>
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
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="cc-payment" class="control-label mb-1">Category</label>
                                    <select id="slug" name="category_id" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>
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
                                <div class="col-md-4">
                                    <label for="category" class="control-label mb-1">Product Brand</label>
                                    <input id="name" name="brand" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false" value="{{ $brand }}" required>

                                </div>
                                <div class="col-md-4">
                                    <label for="category" class="control-label mb-1">Product Model</label>
                                    <input id="name" name="model" type="text" class="form-control" aria-required="true"
                                        aria-invalid="false" value="{{ $model }}" required>

                                </div>
                            </div>
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







                    </div>
                </div>
        </div>


        <h2 class="m-b-10">Product Images</h2>
        <div class="col-lg-12  mt-2" >

                    <div class="card" >



                        <div class="card-body" >
                            <div class="form-group">
                                <div class="row" id="new_img_box">
                                    @php
                                    $loop_count_num = 1;

                                @endphp
                                @foreach ($productImgArr as $key=>$val)
                                <?php
                                    $loop_count_pre = $loop_count_num;
                                $pIArr = (array)$val;
                                ?>
                                <input id="name" name="piid[]" type="hidden"  value="{{ $pIArr['id'] }}">
                                    <div class="col-md-3 product_images_{{ $loop_count_num++ }}">
                                        <label for="images" class="control-label mb-1">Image</label>
                                        <input id="image" name="images[]" type="file" class="form-control" aria-required="true"
                                            aria-invalid="false" >
                                            @if($pIArr['images'] != '')
                                            <img width="80px" src="{{ asset('storage/media/' . $pIArr['images'] ) }}"/>
                                            @endif
                                        @error('images')
                                            <div class="alert alert-danger" role="alert">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    @if($loop_count_num == 2)
                                    <div class="col-md-2">

                                        <label for="images" class="control-label mb-1"></label>
                                        <button class="au-btn au-btn-icon au-btn--green au-btn--large mt-4" onclick="add_image_more()">
                                            <i class="zmdi zmdi-plus"></i>Add</button>
                                        </div>

                                    @else
                                    <div class="col-md-2">
                                        <label for="category" class="control-label mb-1"></label>
                                    <a href="{{ url('admin/product/product_image_delete/') }}/{{ $pIArr['id'] }}/{{ $id }}">
                                    <button class="au-btn au-btn-icon au-btn--green au-btn--large mt-4" type="button" >
                                        <i class="zmdi zmdi-minus"></i>Delete</button>

                                    </a>

                                </div>
                                @endif
                                @endforeach

                                </div>

                            </div>

                        </div>

                    </div>

                </div>






<h2 class="m-b-10">Product Attributes</h2>
<div class="col-lg-12  mt-2" id="new_box">
@php
    $loop_count_num = 1;

@endphp
@foreach ($productAttrArr as $key=>$val)
<?php
    $loop_count_pre = $loop_count_num;
$pArr = (array)$val;
?>
<input id="name" name="paid[]" type="hidden"  value="{{ $pArr['id'] }}">
            <div class="card" id="product_arrt_{{ $loop_count_num++ }}">



                <div class="card-body" >
                    <div class="form-group">
                        <div class="row">

                            <div class="col-md-4">
                                <label for="sku" class="control-label mb-1">SKU</label>
                                <input id="name" name="sku[]" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" value="{{ $pArr['sku'] }}" required >

                            </div>
                            <div class="col-md-3">
                                <label for="mrp" class="control-label mb-1">MRP</label>
                                <input id="name" name="mrp[]" type="number" class="form-control" aria-required="true"
                                    aria-invalid="false" value="{{ $pArr['mrp'] }}" required>

                            </div>
                            <div class="col-md-3">
                                <label for="price" class="control-label mb-1">Price</label>
                                <input id="name" name="price[]" type="number" class="form-control" aria-required="true" value="{{ $pArr['price'] }}"
                                    aria-invalid="false" >

                            </div>
                            <div class="col-md-2">
                                <label for="mrp" class="control-label mb-1">Qty</label>
                                <input id="name" name="qty[]" type="number" class="form-control" aria-required="true"
                                    aria-invalid="false" value="{{ $pArr['qty'] }}" >

                            </div>
                            <div class="col-md-4">
                                <label for="cc-payment" class="control-label mb-1">Size</label>
                                <select id="slug" name="size_id[]" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" >
                                    <option value="">Select Size</option>
                                    @foreach ($size as $list)

                                       @if ($pArr['size_id'] == $list->id)
                                       <option selected value="{{ $list->id }}">

                                        {{ $list->size }}</option>


                                        @else
                                            <option value="{{ $list->id }}">

                                        {{ $list->size }}</option>
                                        @endif
                                    @endforeach

                                </select>

                                @error('size')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="cc-payment" class="control-label mb-1">Color</label>
                                <select id="slug" name="color_id[]" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" >
                                    <option value="">Select color</option>
                                    @foreach ($color as $list)
                                    @if($pArr['color_id'] == $list->id)

                                            <option selected value="{{ $list->id }}">

@else

<option  value="{{ $list->id }}">

    @endif
    {{ $list->color }}</option>
                                    @endforeach

                                </select>

                                @error('')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-2">
                                <label for="category" class="control-label mb-1">Image</label>
                                <input id="image" name="attr_image[]" type="file" class="form-control" aria-required="true"
                                    aria-invalid="false" >
                                    @if($pArr['attr_image'] != '')
                                    <img width="80px" src="{{ asset('storage/media/' . $pArr['attr_image'] ) }}"/>
                                    @endif
                                @error('attr_image')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            @if($loop_count_num == 2)
                            <div class="col-md-2">

                                <label for="category" class="control-label mb-1"></label>
                                <button class="au-btn au-btn-icon au-btn--green au-btn--large mt-4" onclick="add_more()">
                                    <i class="zmdi zmdi-plus"></i>Add</button>
                                </div>

                            @else
                            <div class="col-md-2">
                                <label for="category" class="control-label mb-1"></label>
                            <a href="{{ url('admin/product/product_arrt_delete/') }}/{{ $pArr['id'] }}/{{ $id }}">
                            <button class="au-btn au-btn-icon au-btn--green au-btn--large mt-4" type="button" >
                                <i class="zmdi zmdi-minus"></i>Delete</button>

                            </a>
                        </div>
                            @endif


                        </div>
                    </div>
                </div>

            </div>
            @endforeach
        </div>
        <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">

                <span id="payment-button-amount">Submit</span>

                <input type="hidden" name="id" value="{{ $id }}">

        </div>
    </form>
    </div>

    <script>
        var loop_count = 1;
        function add_more() {
            loop_count++;
            var html = '<input id="name" name="paid[]" type="hidden"  ><div class="card" id="product_arrt_'+loop_count+'"><div class = "card-body" ><div class = "form-group" ><div class = "row" >';
            html+='<div class="col-md-4"><label for="sku" class="control-label mb-1">SKU</label><input id="name" name="sku[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';
                html+= '<div class="col-md-3"><label for="mrp" class="control-label mb-1">MRP</label><input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true" aria-invalid="false" required></div>';
                html+= '<div class="col-md-3"><label for="price" class="control-label mb-1">Price</label><input id="price" name="price[]" type="number" class="form-control" aria-required="true" aria-invalid="false" required></div>';
                html+='  <div class="col-md-2"><label for="mrp" class="control-label mb-1">Qty</label><input id="name" name="qty[]" type="number" class="form-control" aria-required="true"aria-invalid="false" ></div>';

                html+='<div class="col-md-4"><label for="cc-payment" class="control-label mb-1">Size</label><select id="slug" name="size_id[]" type="text" class="form-control" aria-required="true" aria-invalid="false" ><option value="">Select Size</option> @foreach ($size as $list)   @if ($pArr['size_id'] == $list->id)<option selected value="{{ $list->id }}">{{ $list->size }}</option>@else<option value="{{ $list->id }}">{{ $list->size }}</option> @endif @endforeach</select></div>';
html+='<div class="col-md-3">  <label for="cc-payment" class="control-label mb-1">Color</label><select id="slug" name="color_id[]" type="text" class="form-control" aria-required="true"aria-invalid="false" > <option value="">Select color</option>@foreach ($color as $list)   @if($pArr['color_id'] == $list->id)<option selected value="{{ $list->id }}">@else<option  value="{{ $list->id }}">@endif{{ $list->color }}</option> @endforeach</select></div>';
html+= '<div class="col-md-3"><label for="category" class="control-label mb-1">Image</label><input id="image" name="attr_image[]" type="file" class="form-control" aria-required="true"aria-invalid="false" ></div>';
html+= '<div class="col-md-2"><label for="category" class="control-label mb-1"></label><button class="au-btn au-btn-icon au-btn--green au-btn--large mt-4" onclick=remove_more("'+loop_count+'")><i class="zmdi zmdi-minus"></i>Remove</button></div>';
            html+= '</div></div></div></div>';

            $('#new_box').append(html);
        }
        function remove_more(loop_count){
         $('#product_arrt_'+loop_count).remove();
        }
        var loop_image_count = 1;
        function add_image_more(){
            loop_image_count++;
           var html= '<input id="name" name="piid[]" type="hidden"  value=""><div class="col-md-3 product_images_'+loop_image_count+'"><label for="images" class="control-label mb-1">Image</label><input id="image" name="images[]" type="file" class="form-control" aria-required="true"aria-invalid="false" ></div>';
            html+= '<div class="col-md-2 product_images_'+loop_image_count+'"><label for="category" class="control-label mb-1"></label><button class="au-btn au-btn-icon au-btn--green au-btn--large mt-4" onclick=remove_image_more("'+loop_image_count+'")><i class="zmdi zmdi-minus"></i>Remove</button></div>';
            $('#new_img_box').append(html);

        }
        function remove_image_more(loop_image_count){
         $('.product_images_'+loop_image_count).remove();
        }
    </script>

@endsection
