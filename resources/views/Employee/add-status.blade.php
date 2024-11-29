@extends('Admin.Admin-Layouts.app');

@section('content')
    <h3 class="text-center">Add status Dashboard</h3>


    <!-- Button trigger modal -->
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Add Status
        </button>
    </div>

    <!-- Start Add Status Code -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Status</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="date" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="in_time">In-Time</label>
                                    <input type="time" name="in_time" id="in_time" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="out_time">Out-Time</label>
                                    <input type="time" name="out_time" id="out_time" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="total_availability">Total Availability</label>
                                    <input type="text" name="total_availability" id="total_availability"
                                        class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="break_time">Break Time</label>
                                    <input type="text" name="break_time" id="break_time" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="worked_hours">Worked Hours</label>
                                    <input type="text" name="worked_hours" id="worked_hours" class="form-control">
                                </div>

                                <div class="col-12">
                                    <label for="work_report">Work Report</label>
                                    <textarea name="work_report" class="form-control" id="work_report" rows="6"></textarea>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="addbtn">Add Status</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Add Status Code -->

    <!-- Start Table code -->
    <table id="empstatus" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>In Time</th>
                <th>Out Time</th>
                <th>Availability</th>
                <th>Break Time</th>
                <th>Worked Hours</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
    <!-- End Table code -->

    <!-- Start View Code -->
    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">View Status Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Date:</strong> <span id="viewdate"></span></p>
                    <p><strong>In Time:</strong> <span id="viewintime"></span></p>
                    <p><strong>Out Time:</strong> <span id="viewouttime"></span></p>
                    <p><strong>Availability:</strong> <span id="viewavailability"></span></p>
                    <p><strong>Total Worked:</strong> <span id="viewworkedhour"></span></p>
                    <p><strong>Work Report:</strong> <span id="viewworkreport"></span></p>
                    <p><strong>Status:</strong> <span id="viewstatus"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End View Code -->

     <!-- Start Edit code -->
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
                    <h4 class="modal-title">Edit Status</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="container">
                        <form action="" id="editstatus" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-6">
                                    <label for="date">Date</label>
                                    <input type="date" name="date" id="statusdate" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="in_time">In-Time</label>
                                    <input type="time" name="in_time" id="statusin_time" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="out_time">Out-Time</label>
                                    <input type="time" name="out_time" id="statusout_time" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="total_availability">Total Availability</label>
                                    <input type="text" name="total_availability" id="statustotal_availability"
                                        class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="break_time">Break Time</label>
                                    <input type="text" name="break_time" id="statusbreak_time" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="worked_hours">Worked Hours</label>
                                    <input type="text" name="worked_hours" id="statusworked_hours" class="form-control">
                                </div>

                                <div class="col-12">
                                    <label for="work_report">Work Report</label>
                                    <textarea name="work_report" class="form-control" id="statuswork_report" rows="6"></textarea>
                                </div>
                            </div>

                     
                            <button type="submit" class="btn btn-primary">Update Status</button>

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
    <!-- End Edit code -->



@endsection
