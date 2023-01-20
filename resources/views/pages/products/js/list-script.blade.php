<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $("#product").addClass("active");
        $("#productTable").DataTable({
            "order": [[ 5, "desc" ]],
            "responsive": true,
            "autoWidth": false,
            "oLanguage": {
                "sProcessing": showLoading()
            },
            "initComplete": function () {
                hideLoading()
            },
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
</script>
