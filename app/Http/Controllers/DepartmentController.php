<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use App\Http\Resources\DepartmentCollection;
use App\Http\Resources\DepartmentResource;

class DepartmentController extends Controller
{

    public function index()
    {
        $departments = Department::get();
        return new DepartmentCollection($departments);
    }

    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create([
            'name' => $request->name
        ]);
        return new DepartmentResource($department);

    }

    public function show(Department $department)
    {

        return new DepartmentResource($department);
        
    }

    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $department->update([
            'name'  => $request->name
        ]);

        return new DepartmentResource($department);

    }
}
