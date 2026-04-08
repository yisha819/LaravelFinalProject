<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DepartmentController extends Controller
{
    public function index(): View
    {
        $departments = Department::latest()->paginate(5);
        return view('departments.index', compact('departments'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        return view('departments.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        Department::create($request->all());

        return redirect('/departments')->with('success', 'Department created successfully.');
    }

    public function show(Department $department): View
    {
        return view('departments.show', compact('department'));
    }

    public function edit(Department $department): View
    {
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, Department $department): RedirectResponse
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
        ]);

        $department->update($request->all());

        return redirect('/departments')->with('success', 'Department updated successfully');
    }

    public function destroy(Department $department): RedirectResponse
    {
        $department->delete();
        
        return redirect('/departments')->with('success', 'Department deleted successfully');
    }
}
