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
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form id="quickForm" action="{{route('products.insert')}}" method="POST">
                    {!! csrf_field() !!}
                    <div class="card-header">
                        <h5 class="card-title">Create Product</h5>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <!-- text input -->
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" name="product_name" class="form-control"
                                           placeholder="Input Product Name">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Base Price</label>
                                    <input type="text" name="base_price" class="form-control numeric"
                                           maxlength="10" placeholder="Input Price/Bath">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label>Stock Total</label>
                                    <input type="text" name="stock_total" class="form-control numeric"
                                           maxlength="10" placeholder="Input Stock Total">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection('content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
@include('commons.alert')
<script>
    function inputIntTypeOnly(elm) {
        elm.on("keydown", function (event) {
            var e = event || window.event,
                key = e.keyCode || e.which,
                ruleSetArr_1 = [8, 9, 46], // backspace,tab,delete
                ruleSetArr_2 = [48, 49, 50, 51, 52, 53, 54, 55, 56, 57],	// top keyboard num keys
                ruleSetArr_3 = [96, 97, 98, 99, 100, 101, 102, 103, 104, 105], // side keyboard num keys
                ruleSetArr_4 = [17, 67, 86],	// Ctrl & V
                //ruleSetArr_5 = [110,189,190], add this to ruleSetArr to allow float values
                ruleSetArr = ruleSetArr_1.concat(ruleSetArr_2, ruleSetArr_3, ruleSetArr_4);	// merge arrays of keys

            if (ruleSetArr.indexOf() !== "undefined") {	// check if browser supports indexOf() : IE8 and earlier
                var retRes = ruleSetArr.indexOf(key);
            } else {
                var retRes = $.inArray(key, ruleSetArr);
            }
            ;
            if (retRes == -1) {	// if returned key not found in array, return false
                return false;
            } else if (key == 67 || key == 86) {	// account for paste events
                event.stopPropagation();
            }
            ;

        }).on('paste', function (event) {
            var $thisObj = $(this),
                origVal = $thisObj.val(),	// orig value
                newVal = event.originalEvent.clipboardData.getData('Text');	// paste clipboard value
            if (newVal.replace(/\D+/g, '') == "") {	// if paste value is not a number, insert orig value and ret false
                $thisObj.val(origVal);
                return false;
            } else {
                $thisObj.val(newVal.replace(/\D+/g, ''));
                return false;
            }
            ;

        });
    };


    $(function () {
        $("#product").addClass("active");
        inputIntTypeOnly($(".numeric"));

        $.validator.setDefaults({
            submitHandler: function () {
                $('#quickForm').submit();
            }
        });
        $('#quickForm').validate({
            rules: {
                product_name: {
                    required: true,
                    minlength: 5
                },
                base_price: {
                    required: true,
                },
                stock_total: {
                    required: true
                },
            },
            messages: {
                product_name: {
                    required: "Please input a product name",
                    minlength: "Your product name must be at least 5 characters long"
                },
                base_price: {
                    required: "Please input a base price",
                },
                stock_total: {
                    required: "Please input a stock total",
                },
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
