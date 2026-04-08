<?php

namespace App\Http\Controllers;

use App\Models\LeaveRequest;
use App\Models\Employee;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LeaveRequestController extends Controller
{
    public function index(): View
    {
        $leaveRequests = LeaveRequest::with('employee')->latest()->paginate(5);
        return view('leave_requests.index', compact('leaveRequests'))
                    ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(): View
    {
        $employees = Employee::all();
        return view('leave_requests.create', compact('employees'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'type' => 'required',
            'start_date' => 'required|date',
            'status' => 'required',
        ]);

        LeaveRequest::create($request->all());

        return redirect('/leave-requests')->with('success', 'Leave request created successfully.');
    }

    public function show(LeaveRequest $leaveRequest): View
    {
        $leaveRequest->load('employee');
        return view('leave_requests.show', compact('leaveRequest'));
    }

    public function edit(LeaveRequest $leaveRequest): View
    {
        $employees = Employee::all();
        return view('leave_requests.edit', compact('leaveRequest', 'employees'));
    }

    public function update(Request $request, LeaveRequest $leaveRequest): RedirectResponse
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'type' => 'required',
            'start_date' => 'required|date',
            'status' => 'required',
        ]);

        $leaveRequest->update($request->all());

        return redirect('/leave-requests')->with('success', 'Leave request updated successfully');
    }

    public function destroy(LeaveRequest $leaveRequest): RedirectResponse
    {
        $leaveRequest->delete();
        
        return redirect('/leave-requests')->with('success', 'Leave request deleted successfully');
    }
}
