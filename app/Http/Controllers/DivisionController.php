<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Http\Requests\StoreDivisionRequest;
use App\Http\Requests\UpdateDivisionRequest;
use App\Http\Resources\DivisionCollection;
use App\Http\Resources\DivisionResource;

class DivisionController extends Controller
{

    public function index()
    {
        $divisions = Division::get();
        return new DivisionCollection($divisions);
    }

    public function store(StoreDivisionRequest $request)
    {
        $division = Division::create([
            'name' => $request->name
        ]);
        return new DivisionResource($division);
    }

    public function show(Division $division)
    {
        return new DivisionResource($division);
    }

    public function update(UpdateDivisionRequest $request, Division $division)
    {
        $division->update([
            'name'  => $request->name
        ]);

        return new DivisionResource($division);
    }

    public function destroy(Division $division)
    {
        //
    }
}
