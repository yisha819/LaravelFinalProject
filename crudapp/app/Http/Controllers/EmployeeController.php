<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $employees = Employee::latest()->paginate(5);
        return view('employees.index', compact('employees'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        return view('employees.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:employees',
            'position' => 'required',
        ]);

        Employee::create($request->all());

        // FIXED: Using relative path to avoid localhost issues
        return redirect('/employees')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee): View
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee): View
    {
        return view('employees.edit', compact('employee'));
    }

    public function update(Request $request, Employee $employee): RedirectResponse
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'position' => 'required',
        ]);

        $employee->update($request->all());

        // FIXED: Using relative path
        return redirect('/employees')->with('success', 'Employee updated successfully');
    }

    public function destroy(Employee $employee): RedirectResponse
    {
        $employee->delete();
        
        // FIXED: Using relative path
        return redirect('/employees')->with('success', 'Employee deleted successfully');
    }
}