@extends('layouts.dashboard')

@section('content')

<header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Employees</h3>
                <p class="text-subtitle text-muted">Handle Employee data and profile.</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('employees.index') }}">Employees</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">
                    Data Employees
                </h5>
            </div>
            <div class="card-body">
                <div class="d-flex">
                    <a href="{{ route('') }}" class="btn btn-primary mb-3 ms-auto">New Employees</a>
                </div>

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Fullname</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Birth Date</th>
                            <th>Hire Date</th>
                            <th>Departement</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Salary</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees as $employee)
                        
                        <tr>
                            <td>{{ $employee->fullname }}</td>
                            <td>{{ $employee->email }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->birth_date }}</td>
                            <td>{{ $employee->hire_date }}</td>
                            <td>{{ $employee->departement }}</td>
                            <td>{{ $employee->role }}</td>
                            <td>
                                @if ($employee->status == 'active')
                                    <span class="text-success">{{ $employee->status }}</span>
                                @else
                                    <span class="text-danger">{{ $employee->status }}</span>
                                @endif
                            </td>
                            <td>{{ $employee->salary }}</td>
                            <td></td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        
    </section>
</div>

</div>

@endsection