<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Resources\DepartmentResource;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::get();

        return response()->json([
            'message'       => 'success',
            'departments'   => $departments
        ]);
    }

    public function store(StoreDepartmentRequest $request)
    {
        $a = Department::create([
            'name' => $request->name
        ]);

        // return response()->json([
        //     'message'       => 'success',
        //     'department'    => $a
        // ]);
        return new DepartmentResource($request);
    }

    public function show(Department $department)
    {
        // return "äsd";
        return new DepartmentResource($department);
        
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        //
    }

    public function destroy(Department $department)
    {
        //
    }
}
