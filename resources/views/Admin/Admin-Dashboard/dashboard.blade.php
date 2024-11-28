@extends('Admin.Admin-Layouts.app');

@section('content')
    <h3 class="text-center">Welcome To Dashboard</h3>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card mt-3">
            <div class="d-flex">
                <img src="{{ asset('assets/img/Company.png') }}" alt="" class="img-fluid m-3">
                <div class="card-content">
                    <h5 class="mt-3">{{ $employees }}</h5>
                    <p class="">Total Employees</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
        <div class="card mt-3">
            <div class="d-flex">
                <img src="{{ asset('assets/img/Company.png') }}" alt="" class="img-fluid m-3">
                <div class="card-content">
                    <h5 class="mt-3">{{ $leaves }}</h5>
                    <p class="">Today Leaves</p>
                </div>
            </div>
        </div>
    </div>
@endsection
