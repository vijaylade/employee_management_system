//store data 
$(document).ready(function () {
    $('#addbtn').on('click', function () {
        var date = $('#date').val();
        var in_time = $('#in_time').val();
        var out_time = $('#out_time').val();
        var total_availability = $('#total_availability').val();
        var break_time = $('#break_time').val();
        var worked_hours = $('#worked_hours').val();
        var work_report = $('#work_report').val();

        $.ajax({
            url: '/employee-status',
            type: 'POST',
            data: {
                date: date,
                in_time: in_time,
                out_time: out_time,
                total_availability: total_availability,
                break_time: break_time,
                worked_hours: worked_hours,
                work_report: work_report
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                console.log('Employee status added successfully:', result);
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
    $('#empstatus').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/employee-status',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
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

//view viewstatus
$(document).on('click', '.statusview', function () {
    var statusId = $(this).data('id');

    $.ajax({
        url: '/employee-status/' + statusId,
        method: 'GET',
        success: function (response) {
            // Populate the view modal fields with the fetched data
            $('#viewdate').text(response.date);
            $('#viewintime').text(response.in_time);
            $('#viewouttime').text(response.out_time);
            $('#viewavailability').text(response.total_availability);
            $('#viewworkedhour').text(response.worked_hours);
            $('#viewworkreport').text(response.work_report);
            $('#viewstatus').text(response.status);
        },
        error: function (xhr, status, error) {
            console.error('Error fetching leave data:', error);
            alert('Failed to fetch leave details.');
        }
    });
});