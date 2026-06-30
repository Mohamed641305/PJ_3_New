@extends('layouts.edu-admin')

@section('title', 'Users')

@section('content')

    <style>
        /* Card Header Dark Mode */
        body.dark-mode .card-header {
            background: #2a2d3a !important;
        }

        body.dark-mode .card-header h3,
        body.dark-mode .card-header small {
            color: #fff !important;
        }

        body.dark-mode .table {
            color: #fff;
        }

        body.dark-mode .table thead {
            background: #34384a;
        }

        body.dark-mode .table-light th {
            background: #34384a !important;
            color: #fff !important;
            border-color: #444;
        }

        body.dark-mode .table tbody tr {
            background: #2a2d3a;
        }

        body.dark-mode .table tbody tr:hover {
            background: #34384a;
        }

        body.dark-mode .card {
            background: #2a2d3a;
            color: #fff;
        }

        /* Table Border Radius */
        .table-wrapper {
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid #e9ecef;
        }

        body.dark-mode .table-wrapper {
            border-color: #444;
        }

        .table {
            margin-bottom: 0;
        }

        .card {
            border-radius: 20px;
        }
    </style>

    <div class="container-fluid">

        <div class="border-0 shadow card rounded-4">

            <div class="py-4 bg-white border-0 card-header rounded-top-4">
                <div class="d-flex justify-content-between align-items-center">

                    <div>
                        <h3 class="mb-1 fw-bold">
                            <i class="fas fa-users text-primary me-2"></i>
                            Users Management
                        </h3>

                        <small class="text-muted">
                            Total Users:
                            <span class="badge bg-primary rounded-pill">
                                {{ $usercount }}
                            </span>
                        </small>
                    </div>

                    <a href="{{ route('user.create') }}" class="px-4 btn btn-primary rounded-pill">
                        <i class="fa-solid fa-user-plus me-1"></i>
                        Add User
                    </a>

                </div>
            </div>

            <div class="card-body">



                <div class="table-wrapper">

                    <div class="table-responsive">

                        <table class="table align-middle table-hover">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                    <th>Status</th>
                                    <th width="180">Actions</th>
                                </tr>
                            </thead>

                            <tbody>

                                @forelse($users as $item)
                                    <tr>

                                        <td>{{ $item->id }}</td>

                                        <td>
                                            <img src="{{ $item->profile_image ? asset('images/users/' . $item->profile_image) : asset('images/users/default.jpg') }}"
                                                width="55" height="55" class="border shadow-sm rounded-circle"
                                                style="object-fit: cover;">
                                        </td>

                                        <td class="fw-semibold">
                                            {{ $item->name }}
                                        </td>

                                        <td>{{ $item->email }}</td>

                                        <td>
                                            @if ($item->role == 'admin')
                                                <span class="badge bg-danger">
                                                    Admin
                                                </span>
                                            @else
                                                <span class="badge bg-info">
                                                    User
                                                </span>
                                            @endif
                                        </td>

                                        <td>
                                            @if ($item->status == '1')
                                                <span class="badge bg-success">
                                                    Active
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    Blocked
                                                </span>
                                            @endif
                                        </td>

                                        <td>

                                            <a href="{{ route('user.show', $item->id) }}"
                                                class="btn btn-success btn-sm rounded-circle" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>

                                            <a href="{{ route('user.edit', $item->id) }}"
                                                class="btn btn-primary btn-sm rounded-circle" title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="{{ route('user.delete', $item->id) }}"
                                                class="btn btn-danger btn-sm rounded-circle" title="Delete"
                                                onclick="return confirm('Are you sure?')">
                                                <i class="fas fa-trash"></i>
                                            </a>

                                        </td>

                                    </tr>

                                @empty

                                    <tr>
                                        <td colspan="7" class="py-4 text-center">
                                            No users found
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
