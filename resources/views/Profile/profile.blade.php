@extends('Admin.Admin-Layouts.app');

@section('content')

    
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">Profile</div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name ?? ''}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ Auth::user()->email ?? ''}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="company_email">Company Email </label>
                        <input type="text" name="company_email" class="form-control" value="{{ $user->company_email ?? ''}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" value="{{ $user->status ?? ''}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="joining_date">Joining Date</label>
                        <input type="date" name="joining_date" class="form-control" value="{{ $employee->joining_date ?? ''}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="designation">Designation</label>
                        <input type="text" name="designation" class="form-control" value="{{ $employee->designation ?? ''}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Mobile Number</label>
                        <input type="text" name="phone_number" class="form-control" value="{{ $employee->phone_number ?? ''}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Birth Date</label>
                        <input type="text" name="birth_date" class="form-control" value="{{ $employee->birth_date ?? ''}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control" value="{{ $employee->address ?? ''}}" disabled>
                    </div>
                    
                </form>
            </div>

        </div>
    </div>    
   
@endsection
