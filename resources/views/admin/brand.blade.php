@extends('admin.layout')
@section('brand_select', 'active')
@section('page_title', 'Brand')
@section('container')

    {{ session('message') }}

    <h3>Category</h3>
    <div class="row">

        <div class="col-lg-12  mt-2">
            <div class="table-data__tool-right mb-2">
                <a href="manage_brand">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>add brand</button>
                </a>
            </div>
            <div class="au-card">

                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>

                                <th>name</th>
                                <th>image</th>


                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $list)
                                <tr class="tr-shadow">
                                    <td>
                                        <span class="block-email">{{ $list->name }}</span>
                                    </td>
                                    <td> @if($list->image != '')
                                        <img width="80px" src="{{ asset('storage/media/' . $list->image ) }}"/>
                                        @endif</td>




                                    <td>

                                        <div class="table-data-feature">
                                            @if ($list->status == 1)
                                        <a href="brand/status/0/{{ $list->id }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Active">
                                                    <i class=" fas fa-solid fa-toggle-on"></i>
                                                </button>
                                            </a>
                                            @elseif ($list->status == 0)
                                            <a href="brand/status/1/{{ $list->id }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Inactive">
                                                    <i class=" fas fa-solid fa-toggle-off"></i>
                                                </button>
                                            </a>
                                            @endif

                                            <a href="manage_brand/{{ $list->id }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Edit">
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button></a>
                                            <a href="brand/delete/{{ $list->id }}">
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
                            @endforeach
                            </tr>
                            <tr class="spacer"></tr>
                            <tr class="tr-shadow">








                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
