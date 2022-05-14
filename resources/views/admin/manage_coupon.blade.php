@extends('admin.layout')
@section('page_title','Manage Coupon')
@section('coupon_select','active')
@section('container')
    <h3> Manage Coupon</h3>
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
                <div class="card-header">Manage Coupon</div>
                <div class="card-body">



                    <form action="{{ route('coupon.insert') }}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Coupon Title</label>
                            <input id="title" name="title" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $title }}" required>
                                @error('name')


                                @enderror
                        </div>

                        <div class="form-group">
                            <label for="cc-payment" class="control-label mb-1">Cupon Code</label>
                            <input id="code" name="code" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $code }}" required>
                                @error('code')
                                <div class="alert alert-danger" role="alert">
                                   {{ $message }}
                                </div>

                                @enderror
                        </div>
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Coupon Value</label>
                            <input id="value" name="value" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $value }}" required>
                                @error('name')


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
