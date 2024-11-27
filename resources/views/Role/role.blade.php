@extends('Admin.Admin-Layouts.app');

@section('content')
    <h1 class="text-center">Welcome To role Dashboard</h1>

    <!-- Button trigger modal -->
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Add Role
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Role</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="rolename" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="guard_name">Guard Name</label>
                                    <input type="text" name="guard_name" id="guard_name" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="rolebtn">Add Role</button>
                </div>
            </div>
        </div>
    </div>



    <table id="rolestbl" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Gurad Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <div class="container mt-3">
        {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
          Edit 
        </button> --}}
    </div>

    
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                position: 'top-end',
                toast: true,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
            });
        </script>
    @endif

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Role</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="container">
                        <form action="" id="roleform" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="editrolename" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="guard_name">Guard Name</label>
                                    <input type="text" name="guard_name" id="editguard_name" class="form-control">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>

            </div>
        </div>
    </div>
@endsection
