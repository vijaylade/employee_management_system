$(document).ready(function () {
    //fetch data 
    $('#managestatus').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/manage-status',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'employee_name', name: 'employee_name' },
            { data: 'date', name: 'date' },
            { data: 'in_time', name: 'in_time' },
            { data: 'out_time', name: 'out_time' },
            { data: 'total_availability', name: 'total_availability' },
            { data: 'break_time', name: 'break_time' },
            { data: 'worked_hours', name: 'worked_hours' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });
});

$(document).on('click', '.change-empstatus', function () {
    var empId = $(this).data('id');
    var datastatus = $(this).data('status');

    $.ajax({
        url: '/update-status',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            id: empId,
            status: datastatus
        },
        success: function(response) {
            if (response.status) {
                $('#managestatus').DataTable().ajax.reload();
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

        }

    });


});