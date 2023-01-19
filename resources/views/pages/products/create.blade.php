<meta name="_token" content="{!! csrf_token() !!}"/>
@extends('layouts.backend')
@section('title', 'Product')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{route('products.index')}}">Product</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection('breadcrumb')

@section('content')
    <form id="quickForm" action="{{route('products.insert')}}" method="POST">
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Create Product</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label> <span style="color:red;"> *</span>
                                            <input type="text" name="product_name" class="form-control"
                                                   placeholder="Please input product name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Stock Total</label> <span style="color:red;"> *</span>
                                            <input type="text" name="stock_total" class="form-control numeric"
                                                   maxlength="10" placeholder="Please input stock total">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Base Price </label> <span style="color:red;"> *</span>
                                            <input type="text" name="base_price" class="form-control numeric"
                                                   maxlength="10" placeholder="Please input base price">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Sale Price </label> <span style="color:red;"> *</span>
                                            <input type="text" name="sale_price" class="form-control numeric"
                                                   maxlength="10" placeholder="Please input sale price">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">
                            <i class="fa fa-save" role="presentation" aria-hidden="true"></i> Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection('content')

@include('pages.products.js.create-script')
