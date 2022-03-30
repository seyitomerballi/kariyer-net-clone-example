<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    function showSuccessAlert(message, is_success = true) {
        Swal.fire({
            text: message,
            icon: is_success ? 'success' : 'error',
            confirmButtonText: 'Tamam'
        });
    }

    function showSuccessAlertWithReload(message, is_success = true) {

        Swal.fire({
            text: message,
            icon: is_success ? 'success' : 'error',
            showConfirmButton: true,
            confirmButtonText: 'Tamam',
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.reload();
            }
        });
    }

    $(document).on('click', 'a[update-button]', function (e) {
        e.preventDefault();
        var url = $(this).attr('update-button-url');
        var table = $(this).parents('table.dataTable');
        $.ajax({
            url: url,
            type: "POST",
            dataType: 'json',
            success: function (response) {
                showSuccessAlertWithReload(response.message, true);
                reloadTable(table);
            },
            error: function (response) {
                showSuccessAlert(response, false);
            },
        })
    });

    function reloadTable(table) {
        _datatableInit(table);
    }
</script>
@yield('scripts')