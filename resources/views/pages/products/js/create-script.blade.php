<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>

<script>
    $(function () {
        $("#product").addClass("active");
        inputIntTypeOnly($(".numeric"));

        $.validator.setDefaults({
            submitHandler: function () {
                showLoading();
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
                sale_price: {
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
                sale_price: {
                    required: "Please input a sale price",
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
