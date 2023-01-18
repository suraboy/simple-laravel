<meta name="_token" content="{!! csrf_token() !!}"/>
@extends('layouts.backend')
@section('title', 'Dashboard')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Dashboard</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
@endsection('breadcrumb')

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products in stock</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="chart-responsive">
                                <canvas id="pieChart" height="150"></canvas>
                            </div>
                            <!-- ./chart-responsive -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-4">
                            <ul class="chart-legend clearfix">
                                @foreach($products as $key => $item)
                                    <li><i class="far fa-circle"
                                           style="color: {{$item['color']}}"></i> {{$item['name']}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->
{{--                <div class="card-footer p-0">--}}
{{--                    <ul class="nav nav-pills flex-column">--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                United States of America--}}
{{--                                <span class="float-right text-danger">--}}
{{--                        <i class="fas fa-arrow-down text-sm"></i>--}}
{{--                        12%</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                India--}}
{{--                                <span class="float-right text-success">--}}
{{--                        <i class="fas fa-arrow-up text-sm"></i> 4%--}}
{{--                      </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                China--}}
{{--                                <span class="float-right text-warning">--}}
{{--                        <i class="fas fa-arrow-left text-sm"></i> 0%--}}
{{--                      </span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <!-- /.footer -->
@endsection('content')

<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
{{--<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>--}}
<link rel="stylesheet" href="{{asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#dashboard").addClass("active");

        // $('.product-rand-color').each(function () {
        //     const hue = 'rgb(' + (Math.floor((256-199)*Math.random()) + 200) + ',' + (Math.floor((256-199)*Math.random()) + 200) + ',' + (Math.floor((256-199)*Math.random()) + 200) + ')';
        //     $(this).css("color", hue);
        // });
        //-------------
        // - PIE CHART -
        //-------------
        const arrayData = @json($pie_chart);


        // Get context with jQuery - using jQuery's .get() method.
        const pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        const pieData = {
            labels: arrayData.group_name,
            datasets: [
                {
                    data: arrayData.group_stock_total,
                    backgroundColor: arrayData.group_color
                }
            ]
        }
        const pieOptions = {
            legend: {
                display: false
            }
        }
        // Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        // eslint-disable-next-line no-unused-vars
        const pieChart = new Chart(pieChartCanvas, {
            type: 'doughnut',
            data: pieData,
            options: pieOptions
        })
    });
</script>
