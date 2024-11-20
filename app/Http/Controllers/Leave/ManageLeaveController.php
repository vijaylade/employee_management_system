<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Leaves;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ManageLeaveController extends Controller
{
    public function index(Request $request) {

        if ($request->ajax()) {
            $leaves = Leaves::with('user')->get(); 
    
            return DataTables::of($leaves)
                ->addIndexColumn()
                ->addColumn('employee_name', function ($leaves) {
                    return $leaves->user->name ?? 'N/A';
                })
                ->addColumn('from_leave', function ($leave) {
                    return $leave->from_date . ' to ' . $leave->to_date; 
                })
                ->addColumn('action', function ($leaves) {
                    $btn = ' <a href="" data-id="' . $leaves->id . '" class="leaveview btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal">View</a>';
                    return $btn;
                })
                ->addColumn('status', function ($leave) {
                    $statusClass = $leave->status == 'Approved' ? 'success' : ($leave->status == 'Rejected' ? 'danger' : 'warning');
                    return '
                        <div class="dropdown">
                            <button class="btn btn-' . $statusClass . ' dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ' . ucfirst($leave->status) . '
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item change-status" href="#" data-id="' . $leave->id . '" data-status="Approved">Approve</a></li>
                                <li><a class="dropdown-item change-status" href="#" data-id="' . $leave->id . '" data-status="Rejected">Reject</a></li>
                            </ul>
                        </div>';
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }

        return view('Leaves.manage-leaves');
    }

    public function updateStatus(Request $request)
{
    $leave = Leaves::find($request->id);
    if (!$leave) {
        return response()->json(['status' => false, 'message' => 'Leave not found.'], 404);
    }

    // Update the status
    $leave->status = $request->status;
    $leave->save();

    return response()->json(['status' => true, 'message' => 'Leave status updated successfully.']);
}

}
