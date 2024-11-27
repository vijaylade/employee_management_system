<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Permission;
use Illuminate\Support\Facades\Hash;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $permission = Permission::get(); 
    
            return DataTables::of($permission)
                ->addIndexColumn()
                ->addColumn('action', function ($permission) {
                    $btn = '<a href="#" data-id="' . $permission->id . '" class="permissionedit btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#myModal">Edit</a>';
                    $btn .= ' <a href="#" data-id="' . $permission->id . '" class="permissiondelete btn btn-danger btn-sm">Delete</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    
        return view('Permission.permission');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Permission.permission');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);

        return response()->json([
            'success' => 'Permission added successfully',
            'permission' => $permission,
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
        $permission = Permission::findOrFail($id);
        return response()->json($permission);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = Permission::findOrFail($id);
    
        $permission->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name,
        ]);
    
        return redirect()->back()->with('success', 'Permission updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $permission = Permission::findOrFail($id); 
        $permission->delete();
        return response()->json(['success' => 'Permission deleted successfully.']);
    }
}
