//store data 
$(document).ready(function () {

    function calculateTimeDifference() {
        var in_time = $('#in_time').val();
        var out_time = $('#out_time').val();

        if (in_time && out_time) {
            // Convert time strings to Date objects
            var inTime = new Date(`1970-01-01T${in_time}:00`);
            var outTime = new Date(`1970-01-01T${out_time}:00`);

            // Calculate the difference in milliseconds
            var diffMs = outTime - inTime;

            // Convert milliseconds to hours and minutes
            var hours = Math.floor(diffMs / (1000 * 60 * 60));
            var minutes = Math.floor((diffMs % (1000 * 60 * 60)) / (1000 * 60));

            // Format the result as HH:MM
            var totalAvailability = `${hours}:${minutes.toString().padStart(2, '0')}`;

            $('#total_availability').val(totalAvailability);

        } else {
            // Clear the total_availability field if inputs are invalid
            $('#total_availability').val('');
        }
    }

    // Attach change event listeners to in_time and out_time inputs
    // $('#in_time, #out_time').on('change', calculateTimeDifference);

    function calculateworked() {
        var break_time = parseFloat($('#break_time').val()) || 0; // Parse break time, default to 0 if empty
        var totalHoursDecimal = parseFloat($('#total_availability').val()) || 0; // Get total hours in decimal

        // Subtract break time from total availability
        var workedHours = Math.max(0, totalHoursDecimal - break_time); // Ensure worked hours don't go negative

        // Convert worked hours back to HH:MM format
        var workedHoursHours = Math.floor(workedHours);
        var workedHoursMinutes = Math.floor((workedHours % 1) * 60);

        var workedHoursFormatted = `${workedHoursHours}:${workedHoursMinutes.toString().padStart(2, '0')}`;

        // Update the worked_hours field
        $('#worked_hours').val(workedHoursFormatted);
    }

    // Attach change event listener to break_time and total_availability inputs
    $('#break_time, #in_time, #out_time').on('change', function () {
        calculateTimeDifference(); // Recalculate total availability
        calculateworked();         // Recalculate worked hours
    });
    
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


$(document).on('click', '.statusedit', function() {
    var statusId = $(this).data('id');

    $.ajax({
        url: '/employee-status/' + statusId + 'edit',
        type: 'GET',
        success: function(response) {
            $('#statusdate').val(response.date);
            $('#statusin_time').val(response.in_time);
            $('#statusout_time').val(response.out_time);
            $('#statustotal_availability').val(response.total_availability);
            $('#statusbreak_time').val(response.break_time);
            $('#statuswork_report').val(response.work_report);
            $('#statusworked_hours').val(response.worked_hours);

            $('#editstatus').attr('action', '/employee-status/' + statusId);

            $('#statusout_time, #statusin_time, #out_time').on('change', function () {
                calculateTimeDifference(); // Recalculate total availability
                calculateworked();         // Recalculate worked hours
            });
        }

    });

});

$('#editstatus').on('submit', function (e) {
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
            window.location.reload();
        }
    });
});