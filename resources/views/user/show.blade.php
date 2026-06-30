@extends('layouts.edu-admin')

@section('title', 'User Details')

@section('content')

    <div class="container-fluid">

        <div class="row justify-content-center">

            <div class="col-lg-10">

                <div class="border-0 shadow card rounded-4">

                    <!-- Header -->
                    <div class="py-3 text-white card-header bg-primary rounded-top-4">

                        <div class="d-flex justify-content-between align-items-center">

                            <h3 class="mb-0">
                                <i class="fa-solid fa-user me-2"></i>
                                User Details
                            </h3>

                            <span class="badge bg-light text-primary fs-6">
                                ID : {{ $result->id }}
                            </span>

                        </div>

                    </div>

                    <!-- Body -->
                    <div class="p-4 card-body">

                        <div class="row align-items-center">

                            <!-- Image -->
                            <div class="text-center col-md-3">

                                <img src="{{ $result->profile_image ? asset('images/users/' . $result->profile_image) : asset('images/users/default.jpg') }}"
                                    class="border shadow rounded-circle" width="180" height="180"
                                    style="object-fit: cover;">

                                <h4 class="mt-3 fw-bold">
                                    {{ $result->name }}
                                </h4>

                                @if ($result->status == '1')
                                    <span class="badge bg-success">
                                        Active
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Blocked
                                    </span>
                                @endif

                            </div>

                            <!-- Details -->
                            <div class="col-md-9">

                                <table class="table table-hover">

                                    <tbody>

                                        <tr>
                                            <th width="30%">Email</th>
                                            <td>{{ $result->email }}</td>
                                        </tr>

                                        <tr>
                                            <th>Phone Number</th>
                                            <td>{{ $result->phone_number }}</td>
                                        </tr>

                                        <tr>
                                            <th>Address</th>
                                            <td>{{ $result->address }}</td>
                                        </tr>

                                        <tr>
                                            <th>Role</th>
                                            <td>
                                                @if ($result->role == 'admin')
                                                    <span class="badge bg-danger">
                                                        Admin
                                                    </span>
                                                @else
                                                    <span class="badge bg-info">
                                                        User
                                                    </span>
                                                @endif
                                            </td>
                                        </tr>

                                        <tr>
                                            <th>Created At</th>
                                            <td>
                                                {{ $result->created_at->format('d M Y - h:i A') }}
                                            </td>
                                        </tr>

                                    </tbody>

                                </table>

                            </div>

                        </div>

                    </div>

                    <!-- Footer -->
                    <div class="p-3 bg-white border-0 card-footer text-end">

                        <a href="{{ route('user') }}" class="px-4 btn btn-secondary rounded-pill">

                            <i class="fa-solid fa-arrow-left me-1"></i>
                            Back

                        </a>

                        <a href="{{ route('user.edit', $result->id) }}" class="px-4 btn btn-primary rounded-pill">

                            <i class="fa-solid fa-pen-to-square me-1"></i>
                            Edit

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
