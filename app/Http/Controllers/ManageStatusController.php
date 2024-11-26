<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeStatus;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class ManageStatusController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $empstatus = EmployeeStatus::with('user')->get(); 
    
            return DataTables::of($empstatus)
                ->addIndexColumn()
                ->addColumn('employee_name', function ($empstatus) {
                    return $empstatus->user->name ?? 'N/A';
                })
                ->addColumn('status', function ($empstatus) {
                    $statusClass = $empstatus->status == 'Approved' ? 'success' : ($empstatus->status == 'Rejected' ? 'danger' : 'warning');
                    return '
                        <div class="dropdown">
                            <button class="btn btn-' . $statusClass . ' dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ' . ucfirst($empstatus->status) . '
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item change-empstatus" href="#" data-id="' . $empstatus->id . '" data-status="Approved">Approve</a></li>
                                <li><a class="dropdown-item change-empstatus" href="#" data-id="' . $empstatus->id . '" data-status="Rejected">Reject</a></li>
                            </ul>
                        </div>';
                })  
                ->addColumn('action', function ($empstatus) {
                    $btn = ' <a href="" data-id="' . $empstatus->id . '" class="statusview btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal">View</a>';
                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
    
        return view('Employee.manage-status');
    }

    public function updateStatus(Request $request) {
        $empstatus = EmployeeStatus::find($request->id);
        $empstatus->status = $request->status;
        $empstatus->save();
        return response()->json(['status' => true, 'message' => 'status updated successfully.']);
    }
}
