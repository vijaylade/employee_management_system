@extends('Admin.Admin-Layouts.app');

@section('content')
    <h3 class="text-center">Welcome To leaves Dashboard</h3>

    <!-- Button trigger modal -->
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Apply Leave
        </button>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Leave</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">

                            <div class="col-12">
                                <label for="leave_category">Leave Category</label>
                                <select name="leave_category" class="form-control" id="leavecategory">
                                    <option value="">Select Category</option>
                                    <option value="casual leave">Casual Leave</option>
                                    <option value="medical leave">Medical Leave</option>
                                    <option value="emergency leave">Emergency Leave</option>
                                    <option value="maternity leave">Maternity Leave</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="days">days</label>
                                <select name="days" class="form-control" id="days">
                                    <option value="">Select days</option>
                                    <option value="0.5">Half Day</option>
                                    <option value="1.0">Single Day</option>
                                    <option value="multiple">Multiple Day</option>
                                </select>
                            </div>





                        </div>

                        <div class="row">
                            <div class="col-6">
                                <label for="from_date">From-date</label>
                                <input type="date" name="from_date" id="from_date" class="form-control">
                            </div>

                            <div class="col-6">
                                <label for="to_date">to-date</label>
                                <input type="date" name="to_date" id="to_date" class="form-control">
                            </div>

                        </div>

                        <div class="col-12">
                            <label for="reason">Reason</label>
                            <textarea name="reason" class="form-control" id="reason" rows="2"></textarea>
                        </div>


                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="leavebtn">Apply Leave</button>
                </div>
            </div>
        </div>
    </div>

    <table id="leavestable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>leave_category</th>
                <th>from leave</th>
                <th>days</th>
                <th>status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>


    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Leave</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="container">
                        <form action="" id="editleaveForm" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="row">

                                <div class="col-12">
                                    <label for="leave_category">Leave Category</label>
                                    <select name="leave_category" class="form-control" id="editleavecategory">
                                        <option value="">Select Category</option>
                                        <option value="casual leave">Casual Leave</option>
                                        <option value="medical leave">Medical Leave</option>
                                        <option value="emergency leave">Emergency Leave</option>
                                        <option value="maternity leave">Maternity Leave</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="days">days</label>
                                    <select name="days" class="form-control" id="editdays">
                                        <option value="">Select days</option>
                                        <option value="0.5">Half Day</option>
                                        <option value="1.0">Single Day</option>
                                        <option value="multiple">Multiple Day</option>
                                    </select>
                                </div>





                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <label for="from_date">From-date</label>
                                    <input type="date" name="from_date" id="editfrom_date" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="to_date">to-date</label>
                                    <input type="date" name="to_date" id="editto_date" class="form-control">
                                </div>

                            </div>

                            <div class="col-12">
                                <label for="reason">Reason</label>
                                <textarea name="reason" class="form-control" id="editreason" rows="2"></textarea>
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
