@extends('Admin.Admin-Layouts.app');

@section('content')

    
    <div class="col-xl-6">
        <div class="card mb-4">
            <div class="card-header">Update Profile</div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" value="{{ Auth::user()->name }}">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" value="{{ Auth::user()->email }}">
                    </div>
                </form>
            </div>

        </div>
    </div>    
   
@endsection
