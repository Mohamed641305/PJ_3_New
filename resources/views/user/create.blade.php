@extends('layouts.edu-admin')

@section('title', 'Create User')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="mb-4 page-header">
        <div>
            <h2 class="mb-1 fw-bold">Create New User</h2>
            <p class="mb-0 text-muted">
                Add a new user to the system.
            </p>
        </div>

        <a href="{{ route('user') }}" class="btn btn-outline-primary rounded-pill">
            <i class="fa fa-arrow-left me-1"></i>
            Back
        </a>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card form-card">

                <div class="p-5 card-body">

                    <form method="POST"
                          action="{{ route('user.store') }}"
                          enctype="multipart/form-data">

                        @csrf

                        <!-- Profile Image -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Profile Image
                            </label>

                            <input type="file"
                                   name="profile_image"
                                   class="form-control">

                            @error('profile_image')
                                <div class="mt-2 alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Name -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Full Name
                            </label>

                            <input type="text"
                                   name="name"
                                   value="{{ old('name') }}"
                                   class="form-control"
                                   placeholder="Enter full name">

                            @error('name')
                                <div class="mt-2 alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Email -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Email Address
                            </label>

                            <input type="email"
                                   name="email"
                                   value="{{ old('email') }}"
                                   class="form-control"
                                   placeholder="example@email.com">

                            @error('email')
                                <div class="mt-2 alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Password -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Password
                            </label>

                            <input type="password"
                                   name="password"
                                   class="form-control"
                                   placeholder="Enter password">

                            @error('password')
                                <div class="mt-2 alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Phone -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Phone Number
                            </label>

                            <input type="text"
                                   name="phone_number"
                                   value="{{ old('phone_number') }}"
                                   class="form-control"
                                   placeholder="01xxxxxxxxx">

                            @error('phone_number')
                                <div class="mt-2 alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Address -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Address
                            </label>

                            <input type="text"
                                   name="address"
                                   value="{{ old('address') }}"
                                   class="form-control"
                                   placeholder="Enter address">

                            @error('address')
                                <div class="mt-2 alert alert-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Buttons -->
                        <div class="d-grid">

                            <button type="submit"
                                    class="btn btn-primary btn-lg rounded-pill">

                                <i class="fa fa-user-plus me-2"></i>
                                Create User

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

<style>

.page-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.form-card{
    border:none;
    border-radius:25px;
    box-shadow:0 10px 35px rgba(0,0,0,.06);
}

.form-control{
    border-radius:15px;
    padding:14px;
    border:1px solid #e5e7eb;
}

.form-control:focus{
    border-color:#4f46e5;
    box-shadow:0 0 0 .2rem rgba(79,70,229,.15);
}

.btn-primary{
    background:linear-gradient(135deg,#4f46e5,#7c3aed);
    border:none;
}

.btn-primary:hover{
    transform:translateY(-2px);
}

.alert{
    border-radius:15px;
}

</style>

@endsection