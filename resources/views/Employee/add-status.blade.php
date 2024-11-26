@extends('Admin.Admin-Layouts.app');

@section('content')
    <h1 class="text-center">Add status Dashboard</h1>

    
    <!-- Button trigger modal -->
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Add Status
        </button>
    </div>

    <!-- Modal -->
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
                                    <input type="date" name="in_time" id="in_time" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="out_time">Out-Time</label>
                                    <input type="date" name="out_time" id="out_time" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="total_availability">Total Availability</label>
                                    <input type="text" name="total_availability" id="total_availability" class="form-control">
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
                    <button type="submit" class="btn btn-primary" id="addbtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <!--table code -->
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

        <!--View Model-->
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
@endsection
