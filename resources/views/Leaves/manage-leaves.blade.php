@extends('Admin.Admin-Layouts.app');

@section('content')
    <h3 class="text-center">Welcome To manage leaves Dashboard</h3>

    <table id="managetable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>leave_category</th>
                <th>from leave</th>
                <th>days</th>
                <th>status</th>
                <th>reason</th>
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
                    <h5 class="modal-title" id="viewModalLabel">View Leave Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><strong>Leave Category:</strong> <span id="viewleavecategory"></span></p>
                    <p><strong>Days:</strong> <span id="viewdays"></span></p>
                    <p><strong>From Date:</strong> <span id="viewfrom_date"></span></p>
                    <p><strong>To Date:</strong> <span id="viewto_date"></span></p>
                    <p><strong>Reason:</strong> <span id="viewreason"></span></p>
                    <p><strong>Status:</strong> <span id="viewstatus"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
