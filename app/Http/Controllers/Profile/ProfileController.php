<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {

        $user = auth()->user();  
        $employee = Employee::where('user_id', $user->id)->first();
        return view('Profile.profile', compact('user','employee'));
    }
}
