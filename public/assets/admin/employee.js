
//store data 
$(document).ready(function () {
    $('#empbtn').on('click', function () {
        var formData = {
            name: $('#name').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            company_email: $('#company_email').val(),
            joining_date: $('#joining_date').val(),
            designation: $('#designation').val(),
            status: $('#status').val(),
            gender: $('input[name="gender"]:checked').val(),
            birth_date: $('#birth_date').val(),
            phone_number: $('#phone_number').val(),
            address: $('#address').val(),
            aadhar_number: $('#aadhar_number').val(),
            pan_number: $('#pan_number').val(),
            account_number: $('#account_number').val(),
            ifsc_code: $('#ifsc_code').val(),
        };

        $.ajax({
            url: '/employee',
            type: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                console.log('Employee added successfully:', result);
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
    $('#employeeTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/employee',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'email', name: 'email' },
            { data: 'joining_date', name: 'joining_date' },
            { data: 'designation', name: 'designation' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });

    // Delete record
    $('#employeeTable').on('click', '.delete', function () {
        var userid = $(this).data('id');

        $.ajax({
            url: '/employee/' + userid,
            type: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                alert('record delete');
            }
        });
    });

});

$(document).on('click', '.edit', function () {
    var userId = $(this).data('id');

    $.ajax({
        url: '/employee/' + userId + '/edit',
        method: 'GET',
        success: function (response) {
            // Populate the form fields
            $('#editname').val(response.user.name);
            $('#editemail').val(response.user.email);
            $('#editcompany_email').val(response.user.company_email);

            $('input[name="gender"][value="' + response.employee.gender + '"]').prop('checked', true);
            $('#editjoining_date').val(response.employee.joining_date);
            $('#editdesignation').val(response.employee.designation);
            $('#editstatus').val(response.employee.status);
            $('#editbirth_date').val(response.employee.birth_date);
            $('#editphone_number').val(response.employee.phone_number);
            $('#editaddress').val(response.employee.address);
            $('#editaadhar_number').val(response.employee.aadhar_number);
            $('#editpan_number').val(response.employee.pan_number);
            $('#editaccount_number').val(response.employee.account_number);
            $('#editifsc_code').val(response.employee.ifsc_code);

            $('#editForm').attr('action', '/employee/' + userId);
        }
    });
});

$('#editForm').on('submit', function (e) {
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
        }
    });
});




