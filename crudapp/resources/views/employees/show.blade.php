@extends('employees.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Employee Details</h2>
    <div class="card-body">

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-primary btn-sm" href="{{ route('employees.index') }}">
                <i class="fa fa-arrow-left"></i> Back
            </a>
        </div>

        <div class="row mt-4">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Full Name:</strong> <br/>
                    {{ $employee->full_name }}
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Email:</strong> <br/>
                    {{ $employee->email }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Position:</strong> <br/>
                    {{ $employee->position }}
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                <div class="form-group">
                    <strong>Date Joined:</strong> <br/>
                    {{ $employee->created_at->format('M d, Y') }}
                </div>
            </div>
        </div>

    </div>
</div>
@endsection