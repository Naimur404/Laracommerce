@extends('admin.layout')
@section('review_select', 'active')
@section('page_title', 'Product Review')
@section('container')

@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{ session('message') }}

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
    <h3>Product Review</h3>
    <div class="row">

        <div class="col-lg-12  mt-2">

            <div class="au-card">

                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2" id="example">
                        <thead>
                            <tr>

                                <th>Si</th>
                                <th>Rating</th>
                                <th>Review</th>
                                <th>Added On</th>
                                  <th></th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($product_review as $list)
                                <tr class="tr-shadow">
                                    <td>
                                        <span class="block-email">{{ $list->id }}</span>
                                    </td>
                                    <td>
                                        <span class="block-email">{{ $list->rating }}</span>
                                    </td>


                                        <td>
                                            <span class="block-email">{{ $list->review }}</span>
                                        </td>
                                        <td>
                                            <span class="block-email">{{getCustomDate($list->added_on)}}</span>
                                        </td>



                                    <td>

                                        <div class="table-data-feature">
                                            @if ($list->status == 1)
                                        <a href="product_review/status/0/{{ $list->id }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Approved">
                                                    <i class=" fas fa-solid fa-toggle-on"></i>
                                                </button>
                                            </a>
                                            @elseif ($list->status == 0)
                                            <a href="product_review/status/1/{{ $list->id }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="UnApproved">
                                                    <i class=" fas fa-solid fa-toggle-off"></i>
                                                </button>
                                        </a>
                                            @endif


                                            <a href="product_review/delete/{{ $list->id }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Delete">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button></a>

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
