<meta name="_token" content="{!! csrf_token() !!}"/>
@extends('layouts.backend')
@section('title', 'Product')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('homepage')}}">Home</a></li>
                    <li class="breadcrumb-item active">Product</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection('breadcrumb')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Products</h5>
                    <div class="card-tools">
                        <a href="{{route('products.create')}}" class="btn btn-primary float-right">
                            <i class="fas fa-plus"></i> Add item
                        </a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Base Price</th>
                            <th>Sale Price</th>
                            <th>Stock Total</th>
                            <th>Created date</th>
                            <th>Updated date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Base Price</th>
                            <th>Sale Price</th>
                            <th>Stock Total</th>
                            <th>Created date</th>
                            <th>Updated date</th>
                            <th>Action</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($products as $key => $item)
                            <tr>
                                <td>{{$item['name']}}</td>
                                <td>{{number_format($item['base_price'] ?? 0,2)}}</td>
                                <td>{{number_format($item['sale_price'] ?? 0 ,2)}}</td>
                                <td>{{$item['stock_total'] ?? 0}}</td>
                                <td>{{date('Y-m-d H:i:s',strtotime($item['created_at']))}}</td>
                                <td>{{date('Y-m-d H:i:s',strtotime($item['updated_at']))}}</td>
                                <td class="product-actions text-center">
                                    <a class="btn btn-info btn-sm" href="{{route('products.info',['id'=> $item['_id']])}}">
                                        <i class="fas fa-pencil-alt">
                                        </i>
                                        Edit
                                    </a>

                                    <form method="POST" action="{{route('products.destroy',['id'=> $item['_id']])}}" style="display: inline-block!important;">
                                        {!! csrf_field() !!}
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash">
                                            </i>
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- ./card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection('content')

@push('styles')
    @include('pages.products.css.default')
@endpush

@include('pages.products.js.list-script')
