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
                            <th>Item</th>
                            <th>Base Price</th>
                            <th>Stock Total</th>
                            <th>Created date</th>
                            <th>Updated date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Item</th>
                            <th>Base Price</th>
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
                                <td>{{number_format($item['base_price'],2)}}</td>
                                <td>{{$item['stock_total']}}</td>
                                <td>{{date('Y-m-d H:i:s',strtotime($item['created_at']))}}</td>
                                <td>{{date('Y-m-d H:i:s',strtotime($item['updated_at']))}}</td>
                                <td>
                                    <form id="form_product_delete_{{$item->_id}}" method="POST">
{{--                                          action="{{route('products.destroy')}}">--}}
                                        <input type="hidden" name="id" id="product_id" value="{{$item->_id}}">
{{--                                        <a href='{{route("products.info",["id"=>$item->_id])}}'--}}
{{--                                           class="btn btn-primary"><i--}}
{{--                                                class="fa fa-edit" aria-hidden="true"></i></a>--}}
                                        <button type="button" class="btn btn-danger"
                                                onclick="deleteProduct({{$item->_id}})"><i
                                                class="fa fa-trash" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- ./card-body -->
                <div class="card-footer">
                    {{--                    <div class="row">--}}
                    {{--                        <div class="col-sm-3 col-6">--}}
                    {{--                            <div class="description-block border-right">--}}
                    {{--                                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 17%</span>--}}
                    {{--                                <h5 class="description-header">$35,210.43</h5>--}}
                    {{--                                <span class="description-text">TOTAL REVENUE</span>--}}
                    {{--                            </div>--}}
                    {{--                            <!-- /.description-block -->--}}
                    {{--                        </div>--}}
                    {{--                        <!-- /.col -->--}}
                    {{--                        <div class="col-sm-3 col-6">--}}
                    {{--                            <div class="description-block border-right">--}}
                    {{--                                <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>--}}
                    {{--                                <h5 class="description-header">$10,390.90</h5>--}}
                    {{--                                <span class="description-text">TOTAL COST</span>--}}
                    {{--                            </div>--}}
                    {{--                            <!-- /.description-block -->--}}
                    {{--                        </div>--}}
                    {{--                        <!-- /.col -->--}}
                    {{--                        <div class="col-sm-3 col-6">--}}
                    {{--                            <div class="description-block border-right">--}}
                    {{--                                <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>--}}
                    {{--                                <h5 class="description-header">$24,813.53</h5>--}}
                    {{--                                <span class="description-text">TOTAL PROFIT</span>--}}
                    {{--                            </div>--}}
                    {{--                            <!-- /.description-block -->--}}
                    {{--                        </div>--}}
                    {{--                        <!-- /.col -->--}}
                    {{--                        <div class="col-sm-3 col-6">--}}
                    {{--                            <div class="description-block">--}}
                    {{--                                <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>--}}
                    {{--                                <h5 class="description-header">1200</h5>--}}
                    {{--                                <span class="description-text">GOAL COMPLETIONS</span>--}}
                    {{--                            </div>--}}
                    {{--                            <!-- /.description-block -->--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}
                    <!-- /.row -->
                </div>
                <!-- /.card-footer -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
@endsection('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#product").addClass("active");
        $("#example1").DataTable({
            "responsive": true, "lengthChange": false, "autoWidth": false,
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
