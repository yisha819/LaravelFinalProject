@extends('employees.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Add New Employee</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="/employees">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>

        <form action="/employees" method="POST">
            @csrf

            <div class="mb-3">
                <label for="inputFullName" class="form-label"><strong>Full Name:</strong></label>
                <input 
                    type="text" 
                    name="full_name" 
                    class="form-control @error('full_name') is-invalid @enderror" 
                    id="inputFullName" 
                    placeholder="Enter Full Name"
                    value="{{ old('full_name') }}">
                @error('full_name')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputEmail" class="form-label"><strong>Email:</strong></label>
                <input 
                    type="email" 
                    name="email" 
                    class="form-control @error('email') is-invalid @enderror" 
                    id="inputEmail" 
                    placeholder="Enter Email Address"
                    value="{{ old('email') }}">
                @error('email')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="inputPosition" class="form-label"><strong>Position:</strong></label>
                <input 
                    type="text" 
                    name="position" 
                    class="form-control @error('position') is-invalid @enderror" 
                    id="inputPosition" 
                    placeholder="Enter Job Position"
                    value="{{ old('position') }}">
                @error('position')
                    <div class="form-text text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-floppy-disk"></i> Save Employee
            </button>
        </form>

    </div>
</div>
@endsection