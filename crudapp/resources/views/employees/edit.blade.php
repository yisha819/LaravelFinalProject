@extends('employees.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Edit Employee</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="/employees">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>

        <form action="/employees/{{ $employee->id }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="inputFullName" class="form-label"><strong>Full Name:</strong></label>
                <input 
                    type="text" 
                    name="full_name" 
                    value="{{ $employee->full_name }}"
                    class="form-control @error('full_name') is-invalid @enderror" 
                    id="inputFullName">
                @error('full_name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputEmail" class="form-label"><strong>Email:</strong></label>
                <input 
                    type="email" 
                    name="email" 
                    value="{{ $employee->email }}"
                    class="form-control @error('email') is-invalid @enderror" 
                    id="inputEmail">
                @error('email')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPosition" class="form-label"><strong>Position:</strong></label>
                <input 
                    type="text" 
                    name="position" 
                    value="{{ $employee->position }}"
                    class="form-control @error('position') is-invalid @enderror" 
                    id="inputPosition">
                @error('position')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-floppy-disk"></i> Update Employee
            </button>
        </form>

    </div>
</div>
@endsection