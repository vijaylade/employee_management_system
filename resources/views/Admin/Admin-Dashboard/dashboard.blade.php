@extends('Admin.Admin-Layouts.app');

@section('content')

    
        <h1 class="text-center">Welcome To {{ Auth::user()->role}} Dashboard</h1>
    
   
@endsection