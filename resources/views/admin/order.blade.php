@extends('admin.layout')
@section('page_title','Manage Order')
@section('order_select','active')
@section('container')



<div class="col-md-12">
    <!-- DATA TABLE -->
    <h3 class="title-5 m-b-35">Manage Order</h3>

    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2" id="datatable">
            <thead>
                <tr>

                    <th>Order Id</th>
                    <th>Customer Details</th>
                    <th>Order Status</th>
                    <th>Payment Type</th>
                    <th>Transjection Id</th>
                    <th>status</th>
                    <th>Total Amount</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($orders as $data)
                <tr class="tr-shadow">




                    <td> ST{{ $data->id }}</td>
                    <td>
                     {{ $data->name }}<br/>
                     {{ $data->phone }}<br/>
                     {{ $data->email }}<br/>
                     {{ $data->address }}<br/>



                    </td>
                    <td>
                        <span class="block-email">{{ $data->orders_status }}</span>
                    </td>
                    <td class="desc"><b>{{ $data->payment_type }}</b></td>
                    <td>{{ $data->tran_id }}</td>
                    <td>
                        <span class="status--process"><b>{{ $data->payment_status }}</b></span>
                    </td>
                    <td> ৳ {{ $data->total_amt }}</td>
                    <td>  {{ $data->added_on }}</td>
                    <td>
                        <div class="table-data-feature">

                            <a href="{{ url('admin/order_details') }}/{{ $data->id }}"><button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            </a>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
                                <i class="zmdi zmdi-more"></i>
                            </button>
                        </div>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>
@endsection
