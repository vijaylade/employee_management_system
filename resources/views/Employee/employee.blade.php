@extends('Admin.Admin-Layouts.app');

@section('content')
    <h1 class="text-center">Welcome To Emp</h1>

    <!-- Button trigger modal -->
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Add Employee
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Employee</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h5>Profile</h5>
                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="email" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" id="password" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="company_email">Company Email</label>
                                    <input type="email" name="company_email" id="company_email" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="role">Role</label>
                                    <select name="role_id" class="form-control" id="role">
                                        <option value="">Select Role</option>
                                        @foreach ($roles as $role)
                                            <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for="joining_date">Joining Date</label>
                                    <input type="date" name="joining_date" id="joining_date" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="designation">Designation</label>
                                    <select name="designation" class="form-control" id="designation">
                                        <option value="">Select Designation</option>
                                        <option value="trainee_engineer">Trainee Engineer</option>
                                        <option value="team_leader">Team Leader</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for="gender">Gender</label>
                                    <div>
                                        <input type="radio" name="gender" value="male"> Male
                                        <input type="radio" name="gender" value="female"> Female
                                        <input type="radio" name="gender" value="other"> Other
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="birth_date">Birth Date</label>
                                    <input type="date" name="birth_date" id="birth_date" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" name="phone_number" id="phone_number" class="form-control">
                                </div>



                                <div class="col-6">
                                    <label for="address">Address</label>
                                    <textarea name="address" class="form-control" id="address" rows="2"></textarea>
                                </div>
                            </div>

                            <h5>Government Proof</h5>
                            <div class="row">
                                <div class="col-6">
                                    <label for="aadhar_number">Aadhar Card Number</label>
                                    <input type="text" name="aadhar_number" id="aadhar_number" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="pan_number">PAN Card Number</label>
                                    <input type="text" name="pan_number" id="pan_number" class="form-control">
                                </div>
                            </div>

                            <h5>Bank Details</h5>
                            <div class="row">
                                <div class="col-6">
                                    <label for="account_number">Account Number</label>
                                    <input type="text" name="account_number" id="account_number"
                                        class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="ifsc_code">Bank IFSC Code</label>
                                    <input type="text" name="ifsc_code" id="ifsc_code" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="empbtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <table id="employeeTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Joining Date</th>
                <th>Designation</th>
                <th>Status</th>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Employee</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="container">
                        <h5>Profile</h5>
                        <form action="" id="editForm" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="editname" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="email">Email</label>
                                    <input type="email" name="email" id="editemail" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="company_email">Company Email</label>
                                    <input type="email" name="company_email" id="editcompany_email"
                                        class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="joining_date">Joining Date</label>
                                    <input type="date" name="joining_date" id="editjoining_date"
                                        class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="designation">Designation</label>
                                    <select name="designation" class="form-control" id="editdesignation">
                                        <option value="trainee_engineer">Trainee Engineer</option>
                                        <option value="team_leader">Team Leader</option>
                                        <option value="manager">Manager</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" id="editstatus">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for="gender">Gender</label>
                                    <div>
                                        <input type="radio" name="gender" value="male"> Male
                                        <input type="radio" name="gender" value="female"> Female
                                        <input type="radio" name="gender" value="other"> Other
                                    </div>
                                </div>

                                <div class="col-6">
                                    <label for="birth_date">Birth Date</label>
                                    <input type="date" name="birth_date" id="editbirth_date" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" name="phone_number" id="editphone_number"
                                        class="form-control">
                                </div>

                                <div class="col-12">
                                    <label for="address">Address</label>
                                    <textarea name="address" class="form-control" id="editaddress" rows="2"></textarea>
                                </div>
                            </div>

                            <h5>Government Proof</h5>
                            <div class="row">
                                <div class="col-6">
                                    <label for="aadhar_number">Aadhar Card Number</label>
                                    <input type="text" name="aadhar_number" id="editaadhar_number"
                                        class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="pan_number">PAN Card Number</label>
                                    <input type="text" name="pan_number" id="editpan_number" class="form-control">
                                </div>
                            </div>

                            <h5>Bank Details</h5>
                            <div class="row">
                                <div class="col-6">
                                    <label for="account_number">Account Number</label>
                                    <input type="text" name="account_number" id="editaccount_number"
                                        class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="ifsc_code">Bank IFSC Code</label>
                                    <input type="text" name="ifsc_code" id="editifsc_code" class="form-control">
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
