$(document).ready(function () {

    //fetch data 
    $('#managetable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/manage-leave',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'employee_name', name: 'employee_name' },
            { data: 'leave_category', name: 'leave_category' },
            { data: 'from_leave', name: 'from_leave' },
            { data: 'days', name: 'days' },
            { data: 'status', name: 'status' },
            { data: 'reason', name: 'reason' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

});

$(document).on('click', '.change-status', function (e) {
    e.preventDefault();
    const leaveId = $(this).data('id');
    const newStatus = $(this).data('status');

    $.ajax({
        url: '/manage-leave/update-status',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: leaveId,
            status: newStatus
        },
        success: function (response) {
            if (response.status) {
                $('#managetable').DataTable().ajax.reload();
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: response.message,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });
            } else {
                alert('Failed to update status.');
            }
        },
        error: function () {
            alert('An error occurred. Please try again.');
        }
    });
});
