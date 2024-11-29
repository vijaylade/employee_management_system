<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EmployeeStatus;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;

class EmployeeStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $empstatus = EmployeeStatus::where('user_id', Auth::id())->get(); 
    
            return DataTables::of($empstatus)
                ->addIndexColumn()
                ->addColumn('status', function ($empstatus) {
                    $statusClass = $empstatus->status == 'Approved' ? 'btn-success' : 
                                   ($empstatus->status == 'Rejected' ? 'btn-danger' : 'btn-warning');
                    return '<button class="btn ' . $statusClass . ' btn-sm">' . $empstatus->status . '</button>';
                })
                ->addColumn('action', function ($empstatus) {
                    $btn = '<a href="#" data-id="' . $empstatus->id . '" class="statusedit btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">Edit</a>';
                    $btn .= ' <a href="#" data-id="' . $empstatus->id . '" class="statusview btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal">View</a>';
                    return $btn;
                })
                ->rawColumns(['action','status'])
                ->make(true);
        }
    
        return view('Employee.add-status');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Employee.add-status');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $empstatus = EmployeeStatus::create([
            'user_id' => auth()->id(),
            'date' => $request->date,
            'in_time' => $request->in_time,
            'out_time' => $request->out_time,
            'total_availability' => $request->total_availability,
            'break_time' => $request->break_time,
            'worked_hours' => $request->worked_hours,
            'work_report' => $request->work_report,
        ]);

        return response()->json([
            'success' => 'Status added successfully',
            'employee' => $empstatus,
        ]);
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $empstatus = EmployeeStatus::findOrFail($id);
        return response()->json($empstatus);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $empstatus = EmployeeStatus::findOrFail($id);
        return response()->json($empstatus);    
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $empstatus = EmployeeStatus::findOrFail($id);
    
        $empstatus->update([
            'date' => $request->date,
            'in_time' => $request->in_time,
            'out_time' => $request->out_time,
            'break_time' => $request->break_time,
            'work_report' => $request->work_report,
        ]);

        return redirect()->route('employee-status.create')->with('success', 'Status updated successfully');    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
