<?php

namespace App\Http\Controllers\Leave;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use App\Models\Leaves;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $leaves = Leaves::where('user_id', Auth::id())->get(); 
    
            return DataTables::of($leaves)
                ->addIndexColumn()
                ->addColumn('from_leave', function ($leave) {
                    return $leave->from_date . ' to ' . $leave->to_date; 
                })
                ->addColumn('action', function ($leaves) {
                    $btn = '<a href="" data-id="' . $leaves->id . '" class="leaveedit btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">Edit</a>';
                    $btn .= ' <a href="" data-id="' . $leaves->id . '" class="leaveview btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#viewModal">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('Leaves.my-leaves');  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Leaves.my-leaves');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // Calculate days for "Multiple Days"
    if ($request->days === 'multiple') {
        $fromDate = Carbon::parse($request->from_date);
        $toDate = Carbon::parse($request->to_date);

        // Calculate the difference in days
        $totalDays = $fromDate->diffInDays($toDate) + 1; // Include the start date

        Leaves::create([
            'user_id' => auth()->id(),
            'leave_category' => $request->leave_category,
            'days' => $totalDays, // Store total days in the column
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'reason' => $request->reason,
        ]);
    } else {
        // For Half Day or Single Day
        Leaves::create([
            'user_id' => auth()->id(),
            'leave_category' => $request->leave_category,
            'days' => $request->days, // Store '0.5' or '1.0'
            'from_date' => $request->from_date,
            'to_date' => $request->from_date, // Same date for single or half day
            'reason' => $request->reason,
        ]);
    }

        return response()->json([
            'success' => 'Leave added successfully',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $leave = Leaves::findOrFail($id);
        return response()->json($leave);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $leave = Leaves::findOrFail($id);
        return response()->json($leave);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $leave = Leaves::findOrFail($id);

        $leave->update([
            'leave_category' => $request->leave_category,
            'days' => $request->days,
            'from_date' => $request->from_date,
            'to_date' => $request->to_date,
            'reason' => $request->reason,
        ]);

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}