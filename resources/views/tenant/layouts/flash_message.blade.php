<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        @if ($message = Session::get('success'))
        Swal.fire({
            icon: 'success',
            title: {{ $message }},
            showConfirmButton: false,
            timer: 1500
        });
        @elseif($message = Session::get('error'))
        Swal.fire({
            icon: 'error',
            title: {{ $message }},
            showConfirmButton: false,
            timer: 1500
        });
        @elseif ($message = Session::get('warning'))
        Swal.fire({
            icon: 'warning',
            title: {{ $message }},
            showConfirmButton: false,
            timer: 1500
        });
        @elseif ($message = Session::get('info'))
        Swal.fire({
            icon: 'info',
            title: {{ $message }},
            showConfirmButton: false,
            timer: 1500
        });
        @elseif ($errors->any())
        Swal.fire({
            icon: 'error',
            title: {{ 'errors' }},
            showConfirmButton: false,
            timer: 3000
        });
        @endif
    });
</script>
