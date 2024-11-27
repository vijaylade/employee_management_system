@extends('Admin.Admin-Layouts.app');

@section('content')
    <h1 class="text-center">Welcome To permission Dashboard</h1>

    <!-- Button trigger modal -->
    <div class="d-flex justify-content-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            + Add Permission
        </button>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Permission</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <form>
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" id="name" class="form-control">
                                </div>

                                <div class="col-6">
                                    <label for="guard_name">Guard Name</label>
                                    <input type="text" name="guard_name" id="guard_name" class="form-control">
                                </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="permissionbtn">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    
@endsection
