<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $role = Role::get(); 
    
            return DataTables::of($role)
                ->addIndexColumn()
                ->addColumn('action', function ($role) {
                    $btn = '<a href="#" data-id="' . $role->id . '" class="roleedit btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">Edit</a>';
                    $btn .= ' <a href="#" data-id="' . $role->id . '" class="roledelete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('Role.role');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Role.role');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $role = Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);

        return response()->json([
            'success' => 'Role added successfully',
            'role' => $role,
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
        $role = Role::findOrFail($id);
        return response()->json($role);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::findOrFail($id);
    
        $role->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);
    
        return redirect()->back()->with('success', 'Role updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail($id); 
        $role->delete();
        return response()->json(['success' => 'Role deleted successfully.']);
    }
}
