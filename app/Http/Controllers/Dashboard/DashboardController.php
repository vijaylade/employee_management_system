<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Leaves;

class DashboardController extends Controller
{
    public function index() {

        $employees = Employee::count();
        $leaves = Leaves::count();

        return view('Admin.Admin-Dashboard.dashboard', compact('employees','leaves'));
    }
}
