<!-- SweetAlert2 -->
<script src="{{asset('plugins/sweetalert2/sweetalert2.min.js')}}"></script>
<!-- Toastr -->
<script src="{{asset('plugins/toastr/toastr.min.js')}}"></script>

<style>
    .swal2-popup.swal2-toast .swal2-title {
        padding-top: 10px!important;
    }
    .swal-wide{
        width:850px !important;
    }
</style>
<script>
    $(function () {
        @if($message = Session::get('notification'))
        const type = "{{ Session::get('notification')['alert_type'], 'info' }}";
        switch (type) {
            case 'info':
                Swal.fire({
                    position: 'center',
                    icon: 'info',
                    title: '{{ Session::get('notification')['message'] }}',
                    showConfirmButton: false,
                    timer: 1500
                })
                break;

            case 'warning':
                Swal.fire({
                    position: 'center',
                    icon: 'warning',
                    title: '{{ Session::get('notification')['message'] }}',
                    showConfirmButton: false,
                    timer: 1500
                })
                break;

            case 'success':
                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    title: '{{ Session::get('notification')['message'] }}',
                    showConfirmButton: false,
                    timer: 1500
                })
                break;

            case 'error':
                Swal.fire({
                    position: 'center',
                    icon: 'error',
                    title: '{{ Session::get('notification')['message'] }}',
                    showConfirmButton: false,
                    timer: 1500
                })
                break;
        }
        @endif
    });
</script>
