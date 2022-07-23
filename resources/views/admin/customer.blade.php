@extends('admin.layout')
@section('customers_select', 'active')
@section('page_title', 'Customer')
@section('container')

@if(session()->has('message'))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
    {{ session('message') }}

    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif

    <h3>Customer</h3>
    <div class="row">

        <div class="col-lg-12  mt-2">

            <div class="au-card">

                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2" id="datatable2">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>name</th>
                                <th>email</th>
                                <th>Phone</th>


                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $list)
                                <tr class="tr-shadow">
                                    <td>{{ $list->id }}</td>
                                    <td>{{ $list->name }}</td>
                                    <td>{{ $list->email }}</td>
                                    <td>{{ $list->phone }}</td>




                                    <td>

                                        <div class="table-data-feature">
                                            @if ($list->status == 1)
                                        <a href="customer/status/0/{{ $list->id }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Active">
                                                    <i class=" fas fa-solid fa-toggle-on"></i>
                                                </button>
                                            </a>
                                            @elseif ($list->status == 0)
                                            <a href="customer/status/1/{{ $list->id }}">
                                                <button class="item" data-toggle="tooltip" data-placement="top"
                                                    title="Inactive">
                                                    <i class=" fas fa-solid fa-toggle-off"></i>
                                                </button>
                                            </a>
                                            @endif
                                            <a href="customer/show/{{ $list->id }}">
                                            <button class="item" data-toggle="tooltip" data-placement="top"
                                            title="View">
                                            <i class="zmdi zmdi-more"></i>
                                        </button></a>

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
