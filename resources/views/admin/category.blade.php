@extends('admin.layout')
@section('container')

    {{session('message') }}

<h3>Category</h3>
    <div class="row">

        <div class="col-lg-12  mt-2">
            <div class="table-data__tool-right mb-2">
                <a href="manage_category">
                <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                    <i class="zmdi zmdi-plus"></i>add categoy</button>
                </a>
            </div>
            <div class="au-card">

                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>

                                <th>name</th>
                                <th>slug</th>

                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $list)


                            <tr class="tr-shadow">

                                <td>{{ $list->name }}</td>
                                <td>
                                    <span class="block-email">{{ $list ->slug }}</span>
                                </td>


                                <td>
                                    <div class="table-data-feature">
                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                            title="Send" >
                                            <i class="zmdi zmdi-mail-send"></i>
                                        </button>
                                        <a href="manage_category/{{ $list->id }}">
                                        <button class="item" data-toggle="tooltip" data-placement="top"
                                            title="Edit">
                                            <i class="zmdi zmdi-edit"></i>
                                        </button></a>
                                        <a href="category/delete/{{ $list->id }}">
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
