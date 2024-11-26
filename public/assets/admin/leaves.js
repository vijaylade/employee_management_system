
//store data 
$(document).ready(function () {
    $('#leavebtn').on('click', function () {

        var leavecategory = $('#leavecategory').val();
        var days = $('#days').val();
        var fromdate = $('#from_date').val();
        var todate = $('#to_date').val();
        var reason = $('#reason').val();

        $.ajax({
            url: '/leaves',
            type: 'POST',
            data: {
                leave_category: leavecategory,
                days: days,
                from_date: fromdate,
                to_date: todate,
                reason: reason
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                console.log('leaves added successfully:', result);
                $('#exampleModal').modal('hide');

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: result.success,
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                });

            }
        });
    });
});

$(document).ready(function () {

    //fetch data 
    $('#leavestable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/leaves',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'leave_category', name: 'leave_category' },
            { data: 'from_leave', name: 'from_leave' },
            { data: 'days', name: 'days' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

});

$(document).on('click', '.leaveedit', function () {
    var leaveId = $(this).data('id');

    $.ajax({
        url: '/leaves/' + leaveId + '/edit',
        method: 'GET',
        success: function (response) {
            // Populate the form fields
            $('#editleavecategory').val(response.leave_category);
            $('#editdays').val(response.days);
            $('#editfrom_date').val(response.from_date);
            $('#editto_date').val(response.to_date);
            $('#editreason').val(response.reason);

            $('#editleaveForm').attr('action', '/leaves/' + leaveId);
        }
    });
});

$('#editleaveForm').on('submit', function (e) {
    e.preventDefault();

    var formActionUrl = $(this).attr('action');
    var formData = $(this).serialize();

    $.ajax({
        url: formActionUrl,
        method: 'POST',
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            $('#myModal').modal('hide');
            Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: result.success,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
            });
        }
    });
});

//view leave
$(document).on('click', '.leaveview', function () {
    var leaveId = $(this).data('id');

    $.ajax({
        url: '/leaves/' + leaveId,
        method: 'GET',
        success: function (response) {
            // Populate the view modal fields with the fetched data
            $('#viewleavecategory').text(response.leave_category);
            $('#viewdays').text(response.days);
            $('#viewfrom_date').text(response.from_date);
            $('#viewto_date').text(response.to_date);
            $('#viewreason').text(response.reason);
            $('#viewstatus').text(response.status);
        },
        error: function (xhr, status, error) {
            console.error('Error fetching leave data:', error);
            alert('Failed to fetch leave details.');
        }
    });
});
