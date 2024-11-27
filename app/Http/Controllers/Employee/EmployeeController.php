<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $users = User::with('employee')->select(['id', 'name', 'email']); 
    
            return DataTables::of($users)
                ->addIndexColumn()
                ->addColumn('joining_date', function ($user) {
                    return $user->employee->joining_date ?? 'N/A';
                })
                ->addColumn('designation', function ($user) {
                    return $user->employee->designation ?? 'N/A';
                })
                ->addColumn('status', function ($user) {
                    return $user->employee->status ?? 'N/A';
                })
                ->addColumn('action', function ($user) {
                    $btn = '<a href="" data-id="' . $user->id . '" class="edit btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">Edit</a>';
                    $btn .= ' <a href="" data-id="' . $user->id . '" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('Employee.employee');  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all(); 
        return view('Employee.employee', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'role' => 'required|string|exists:roles,name', 
            'company_email' => 'nullable|email',
        ]);

        $role = Role::where('name', $validated['role'])->firstOrFail();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role_id' => $role->id, 
            'password' => Hash::make($request->password), 
            'company_email' => $request->company_email,
            'status' => $request->status,
        ]);

    $employee = Employee::create([
        'user_id' => $user->id, 
        'employee_name' => $request->name,
        'joining_date' => $request->joining_date,
        'designation' => $request->designation,
        'gender' => $request->gender,
        'birth_date' => $request->birth_date,
        'phone_number' => $request->phone_number,
        'address' => $request->address,
        'aadhar_number' => $request->aadhar_number,
        'pan_number' => $request->pan_number,
        'account_number' => $request->account_number,
        'status' => $request->status,
        'ifsc_code' => $request->ifsc_code,
    ]);

    return response()->json([
        'success' => 'Employee added successfully',
        'user' => $user,
        'employee' => $employee,
    ]);
    
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::with('employee')->findOrFail($id);
        return response()->json([
            'user' => $user,
            'employee' => $user->employee
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $employee = $user->employee;
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'company_email' => $request->company_email,
            'status' => $request->status,
        ]);
    
        $employee->update([
            'employee_name' => $request->name,
            'joining_date' => $request->joining_date,
            'designation' => $request->designation,
            'status' => $request->status,
            'gender' => $request->gender,
            'phone_number' => $request->phone_number,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'aadhar_number' => $request->aadhar_number,
            'pan_number' => $request->pan_number,
            'account_number' => $request->account_number,
            'ifsc_code' => $request->ifsc_code,
        ]);
    
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        if ($user) {
            Employee::where('user_id', $user->id)->delete();
            $user->delete();
        }
        return $user;
    }
}