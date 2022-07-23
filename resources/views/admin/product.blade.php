@extends('admin.layout')
@section('product_select', 'active')
@section('page_title', 'Product')
@section('container')

@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{ session('message') }}

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

    <h3>Product</h3>
    <div class="row">

        <div class="col-lg-12  mt-2">
            <div class="table-data__tool-right mb-2">
                <a href="manage_product">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add product</button>
                </a>
            </div>
            <div class="au-card">

                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2" id="product_table">
                        <thead>
                            <tr>

                                <th>name</th>
                                <th>slug</th>
                                <th>image</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $list)
                                <tr class="tr-shadow">

                                    <td>{{ $list->pname }}</td>
                                    <td>
                                        <span class="block-email">{{ $list->pslug }}</span>
                                    </td>
                                    <td>
                                        @if($list->image != '')
                                        <img width="80px" src="{{ asset('storage/media/' . $list->image) }}"/>
                                        @endif

                                    </td>


                                    <td>

                                        <div class="table-data-feature">
                                            @if ($list->status == 1)
                                                <a href="product/status/0/{{ $list->id }}">
                                                    <button class="item" data-toggle="tooltip"
                                                        data-placement="top" title="Active">
                                                        <i class=" fas fa-solid fa-toggle-on"></i>
                                                    </button>
                                                </a>
                                            @elseif ($list->status == 0)
                                                <a href="product/status/1/{{ $list->id }}">
                                                    <button class="item" data-toggle="tooltip"
                                                        data-placement="top" title="Inactive">
                                                        <i class=" fas fa-solid fa-toggle-off"></i>
                                                    </button>
                                                </a>
                                            @endif

                                            <a href="{{ route('manage_product.edit', $list->id) }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button></a>
                                            <a href="product/delete/{{ $list->id }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button></a>
                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                                title="More">
                                                <i class="zmdi zmdi-more"></i>
                                            </button>
                                        </div>
                                    </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
