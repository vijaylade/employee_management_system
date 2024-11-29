@extends('Admin.Admin-Layouts.app');

@section('content')
    <h3 class="text-center">manage status Dashboard</h3>

    <!--table code -->
    <table id="managestatus" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Employee Name</th>
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
