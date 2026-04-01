@extends('employees.layout')

@section('content')

<div class="card mt-5">
    <h2 class="card-header">Employee Management System</h2>
    <div class="card-body">

        @if(session('success'))
            <div class="alert alert-success" role="alert"> {{ session('success') }} </div>
        @endif

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-success btn-sm" href="/employees/create"> 
                <i class="fa fa-plus"></i> Add New Employee 
            </a>
        </div>

        <table class="table table-bordered table-striped mt-4">
            <thead>
                <tr>
                    <th width="80px">No</th>
                    <th>Full Name</th>
                    <th>Email</th>
                    <th>Position</th>
                    <th width="250px">Action</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($employees as $employee)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $employee->full_name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->position }}</td>
                    <td>
                        <form action="/employees/{{ $employee->id }}" method="POST">
                            <a class="btn btn-info btn-sm" href="/employees/{{ $employee->id }}">
                                <i class="fa-solid fa-list"></i> Show
                            </a>

                            <a class="btn btn-primary btn-sm" href="/employees/{{ $employee->id }}/edit">
                                <i class="fa-solid fa-pen-to-square"></i> Edit
                            </a>

                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fa-solid fa-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">There are no data.</td>
                </tr>
            @endforelse
            </tbody>
        </table>

        {!! $employees->links() !!}

    </div>
</div>
@endsection