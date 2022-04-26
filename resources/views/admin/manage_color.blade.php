@extends('admin.layout')
@section('page_title','Manage Color')
@section('color_select','active')
@section('container')
    <h3> Manage Color</h3>
    <div class="row">

        <div class="col-lg-12  mt-2">
            <div class="table-data__tool-right mb-2">
                <a href="color">
                    <button class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="zmdi zmdi-plus"></i>Back</button>
                </a>
            </div>
            <div class="card">
                {{ session('message') }}
                <div class="card-header">Add Color</div>
                <div class="card-body">



                    <form action="{{ route('color.insert') }}" method="post" >
                        @csrf
                        <div class="form-group">
                            <label for="category" class="control-label mb-1">Category Name</label>
                            <input id="color" name="color" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" value="{{ $color }}" required>
                                @error('color')


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
