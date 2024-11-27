
$(document).ready(function () {

    //store data 
    $('#rolebtn').on('click', function () {
        var name = $('#rolename').val();
        var guard_name = $('#guard_name').val();

        $.ajax({
            url: '/roles',
            type: 'POST',
            data: {
                name: name,
                guard_name: guard_name
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (result) {
                console.log('Role added successfully:', result);
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

    //fetch data 
    $('#rolestbl').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url: '/roles',
            type: 'GET',
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'guard_name', name: 'guard_name' },
            { data: 'action', name: 'action', orderable: false, searchable: false },
        ]
    });


    // Delete record
    $(document).on('click', '.roledelete', function () {
        var roleId = $(this).data('id');
        var url = '/roles/' + roleId;

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        Swal.fire({
                            toast: true,
                            position: 'top-end',
                            icon: 'success',
                            title: response.success,
                            showConfirmButton: false,
                            timer: 3000,
                            timerProgressBar: true,
                        });
                        $('#rolestbl').DataTable().ajax.reload();
                    },
                    error: function (xhr) {
                        Swal.fire(
                            'Error!',
                            'Something went wrong.',
                            'error'
                        );
                    }
                });
            }
        });
    });

});


$(document).on('click', '.roleedit', function () {
    var roleId = $(this).data('id');

    $.ajax({
        url: '/roles/' + roleId + '/edit',
        method: 'GET',
        success: function (response) {
            // Populate the form fields
            $('#editrolename').val(response.name);
            $('#editguard_name').val(response.guard_name);

            $('#roleform').attr('action', '/roles/' + roleId);
        }
    });
});

$('#roleform').on('submit', function (e) {
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
            $('#rolestbl').DataTable().ajax.reload();
        }
    });
});

