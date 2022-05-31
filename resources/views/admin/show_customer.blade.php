@extends('admin.layout')
@section('customers_select', 'active')
@section('page_title', 'Show Customer Details')
@section('container')



    <h3>Customer Details</h3>
    <div class="row">

        <div class="col-lg-12  mt-2">

            <div class="au-card">

                <div class="table-responsive table-responsive-data2">
                    <table class="table table-data2">
                        <thead>
                            <tr>

                                <th>Field</th>
                                <th>Value</th>



                            </tr>
                        </thead>
                        <tbody>
                            <tr class="tr-shadow">
                                <td>ID</td>
                                <td>{{ $customer_list->id }}</td>
                            </tr>

                                <tr class="tr-shadow">
                                    <td>Name</td>
                                    <td>{{ $customer_list->name }}</td>
                                </tr>
                                <tr class="tr-shadow">
                                    <td>Email</td>
                                    <td>{{ $customer_list->email }}</td>
                                </tr>
                                <tr class="tr-shadow">
                                    <td>Phone</td>
                                    <td>{{ $customer_list->phone }}</td>
                                </tr>
                                <tr class="tr-shadow">
                                    <td>Address</td>
                                    <td>{{ $customer_list->address }}</td>
                                </tr>
                                <tr class="tr-shadow">
                                    <td>City</td>
                                    <td>{{ $customer_list->city }}</td>
                                </tr>
                                <tr class="tr-shadow">
                                    <td>State</td>
                                    <td>{{ $customer_list->state }}</td>
                                </tr>
                                <tr class="tr-shadow">
                                    <td>Zip</td>
                                    <td>{{ $customer_list->zip }}</td>
                                </tr>
                                <tr class="tr-shadow">
                                    <td>Company</td>
                                    <td>{{ $customer_list->company }}</td>
                                </tr>
                                <tr class="tr-shadow">
                                    <td>GST Number</td>
                                    <td>{{ $customer_list->gstin }}</td>
                                </tr>
                                <tr class="tr-shadow">
                                    <td>Added On</td>
                                    <td>{{ \Carbon\Carbon::parse($customer_list->created_at)->format('d-m-y') }}</td>
                                </tr>
                                <tr class="tr-shadow">
                                    <td>Updated On</td>
                                    <td>{{ \Carbon\Carbon::parse($customer_list->updated_at)->format('d-m-y') }}</td>
                                </tr>
                            <tr class="spacer"></tr>
                            <tr class="tr-shadow"></tr>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection
