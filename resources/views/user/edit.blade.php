{{-- @extends('layouts.edu-admin')

@section('title', 'Edit User')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="mb-4 page-header">
        <div>
            <h2 class="mb-1 fw-bold">Edit User</h2>
            <p class="mb-0 text-muted">
                Update user information and account details.
            </p>
        </div>

        <a href="{{ route('user.show', $result->id) }}"
            class="btn btn-outline-primary rounded-pill">
            <i class="fa fa-arrow-left me-1"></i>
            Back
        </a>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card form-card">

                <div class="p-5 card-body">

                    @if (session('success'))
                        <div class="alert alert-success rounded-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('user.update', $result->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <!-- Current Image -->
                        <div class="mb-4 text-center">

                            @if ($result->profile_image)
                                <img src="{{ asset('images/users/' . $result->profile_image) }}"
                                    class="mb-3 profile-preview">
                            @else
                                <img src="{{ asset('images/users/default.jpg') }}"
                                    class="mb-3 profile-preview">
                            @endif

                            <div>
                                <label class="form-label fw-semibold">
                                    Change Profile Image
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

                        </div>

                        <!-- Name -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Full Name
                            </label>

                            <input type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $result->name) }}">

                            @error('name')
                                <div class="mt-2 text-danger">
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
                                class="form-control"
                                value="{{ old('email', $result->email) }}">

                            @error('email')
                                <div class="mt-2 text-danger">
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
                                class="form-control"
                                value="{{ old('phone_number', $result->phone_number) }}">

                            @error('phone_number')
                                <div class="mt-2 text-danger">
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
                                class="form-control"
                                value="{{ old('address', $result->address) }}">

                            @error('address')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Status -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Account Status
                            </label>

                            <select name="status" class="form-select">

                                <option value="active"
                                    {{ old('status', $result->status) == 'active' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="block"
                                    {{ old('status', $result->status) == 'block' ? 'selected' : '' }}>
                                    Blocked
                                </option>

                            </select>

                            @error('status')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Buttons -->
                        <div class="gap-3 d-flex">

                            <button type="submit"
                                class="px-5 btn btn-primary rounded-pill">

                                <i class="fa fa-save me-2"></i>
                                Save Changes

                            </button>

                            <a href="{{ route('user.show', $result->id) }}"
                                class="px-5 btn btn-outline-secondary rounded-pill">

                                Cancel

                            </a>

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
    border-radius:30px;
    box-shadow:0 10px 40px rgba(0,0,0,.06);
}

.form-control,
.form-select{
    border-radius:15px;
    padding:14px;
    border:1px solid #e5e7eb;
}

.form-control:focus,
.form-select:focus{
    border-color:#4f46e5;
    box-shadow:0 0 0 .2rem rgba(79,70,229,.15);
}

.profile-preview{
    width:120px;
    height:120px;
    border-radius:50%;
    object-fit:cover;
    border:5px solid #f3f4f6;
    box-shadow:0 5px 20px rgba(0,0,0,.1);
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

@endsection --}}
{{--
@extends('layouts.edu-admin')

@section('title', 'Edit User')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="mb-4 page-header">
        <div>
            <h2 class="mb-1 fw-bold">Edit User</h2>
            <p class="mb-0 text-muted">
                Update user information and account details.
            </p>
        </div>

        <a href="{{ route('user.show', $result->id) }}"
            class="btn btn-outline-primary rounded-pill">
            <i class="fa fa-arrow-left me-1"></i>
            Back
        </a>
    </div>

    <div class="row justify-content-center">

        <div class="col-lg-8">

            <div class="card form-card">

                <div class="p-5 card-body">

                    @if (session('success'))
                        <div class="alert alert-success rounded-4">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('user.update', $result->id) }}"
                          method="POST"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PUT')

                        <!-- Current Image -->
                        <div class="mb-4 text-center">

                            @if ($result->profile_image)
                                <img src="{{ asset('images/users/' . $result->profile_image) }}"
                                    class="mb-3 profile-preview">
                            @else
                                <img src="{{ asset('images/users/default.jpg') }}"
                                    class="mb-3 profile-preview">
                            @endif

                            <div>
                                <label class="form-label fw-semibold">
                                    Change Profile Image
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

                        </div>

                        <!-- Name -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Full Name
                            </label>

                            <input type="text"
                                name="name"
                                class="form-control"
                                value="{{ old('name', $result->name) }}">

                            @error('name')
                                <div class="mt-2 text-danger">
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
                                class="form-control"
                                value="{{ old('email', $result->email) }}">

                            @error('email')
                                <div class="mt-2 text-danger">
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
                                class="form-control"
                                value="{{ old('phone_number', $result->phone_number) }}">

                            @error('phone_number')
                                <div class="mt-2 text-danger">
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
                                class="form-control"
                                value="{{ old('address', $result->address) }}">

                            @error('address')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Status -->
                        <div class="mb-4">

                            <label class="form-label fw-semibold">
                                Account Status
                            </label>

                            <select name="status" class="form-select">

                                <option value="active"
                                    {{ old('status', $result->status) == 'active' ? 'selected' : '' }}>
                                    Active
                                </option>

                                <option value="block"
                                    {{ old('status', $result->status) == 'block' ? 'selected' : '' }}>
                                    Blocked
                                </option>

                            </select>

                            @error('status')
                                <div class="mt-2 text-danger">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <!-- Buttons -->
                        <div class="gap-3 d-flex">

                            <button type="submit"
                                class="px-5 btn btn-primary rounded-pill">

                                <i class="fa fa-save me-2"></i>
                                Save Changes

                            </button>

                            <a href="{{ route('user.show', $result->id) }}"
                                class="px-5 btn btn-outline-secondary rounded-pill">

                                Cancel

                            </a>

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
    border-radius:30px;
    box-shadow:0 10px 40px rgba(0,0,0,.06);
}

.form-control,
.form-select{
    border-radius:15px;
    padding:14px;
    border:1px solid #e5e7eb;
}

.form-control:focus,
.form-select:focus{
    border-color:#4f46e5;
    box-shadow:0 0 0 .2rem rgba(79,70,229,.15);
}

.profile-preview{
    width:120px;
    height:120px;
    border-radius:50%;
    object-fit:cover;
    border:5px solid #f3f4f6;
    box-shadow:0 5px 20px rgba(0,0,0,.1);
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

@endsection --}}

@extends('layouts.edu-admin')

@section('title', 'Edit User')

@section('content')

    <div class="container-fluid">

        <!-- Header -->
        <div class="mb-4 page-header">
            <div>
                <h2 class="mb-1 fw-bold">Edit User</h2>
                <p class="mb-0 text-muted">
                    Update user information and account details.
                </p>
            </div>

            <a href="{{ route('user.show', $result->id) }}" class="btn btn-outline-primary rounded-pill">
                <i class="fa fa-arrow-left me-1"></i>
                Back
            </a>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card form-card">

                    <div class="p-5 card-body">

                        @if (session('success'))
                            <div class="alert alert-success rounded-4">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('user.update', $result->id) }}" method="POST" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <!-- Current Image -->
                            <div class="mb-4 text-center">

                                @if ($result->profile_image)
                                    <img id="profilePreview" src="{{ asset('images/users/' . $result->profile_image) }}"
                                        class="mb-3 profile-preview">
                                @else
                                    <img id="profilePreview" src="{{ asset('images/users/default.jpg') }}" class="mb-3 profile-preview">
                                @endif

                                <div>
                                    <label class="form-label fw-semibold">
                                        Change Profile Image
                                    </label>

                                    <input type="hidden" name="remove_image" id="remove_image" value="0">

                                    <div class="gap-2 d-flex align-items-center">
                                        <input type="file" name="profile_image" id="profile_image" class="form-control">
                                        @if ($result->profile_image != 'default.jpg')
                                            <button type="button" class="btn btn-outline-danger" id="removeImageBtn"
                                                title="Use Default Image">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        @endif
                                    </div>
                                    @error('profile_image')
                                        <div class="invalid-feedback d-block field-error">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>





                            </div>

                            <!-- Name -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Full Name
                                </label>

                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name') != '' ? old('name') : $result->name }}">
                                @error('name')
                                    <div class="invalid-feedback d-block field-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Email -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Email Address
                                </label>

                                <input type="email" name="email" class="form-control"
                                    value="{{ old('email') != '' ? old('email') : $result->email }}">

                                @error('email')
                                    <div class="invalid-feedback d-block field-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <!-- Phone -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Phone Number
                                </label>

                                <input type="text" name="phone_number" class="form-control"
                                    value="{{ old('phone_number') != '' ? old('phone_number') : $result->phone_number }}">
                                @error('phone_number')
                                    <div class="invalid-feedback d-block field-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <!-- Address -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Address
                                </label>

                                <input type="text" name="address" class="form-control"
                                    value="{{ old('address') != '' ? old('address') : $result->address }}">

                                @error('address')
                                    <div class="invalid-feedback d-block field-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <!-- Role -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    User Role
                                </label>

                                <select name="role" class="form-select">

                                    <option value="user"
                                        {{ old('role') != '' ? (old('role') == 'user' ? 'selected' : '') : ($result->role == 'user' ? 'selected' : '') }}>
                                        User
                                    </option>

                                    <option value="admin"
                                        {{ old('role') != '' ? (old('role') == 'admin' ? 'selected' : '') : ($result->role == 'admin' ? 'selected' : '') }}>
                                        Admin
                                    </option>

                                </select>

                                @error('role')
                                    <div class="invalid-feedback d-block field-error">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <!-- Status -->
                            <div class="mb-4">

                                <label class="form-label fw-semibold">
                                    Account Status
                                </label>

                                <select name="status" class="form-select">

                                    <option value="1"
                                        {{ old('status') != '' ? (old('status') == 1 ? 'selected' : '') : ($result->status == 1 ? 'selected' : '') }}>
                                        Active
                                    </option>

                                    <option value="0" {{ old('status', $result->status) == 0 ? 'selected' : '' }}>
                                        Blocked
                                    </option>

                                </select>

                                @error('status')
                                    <div class="invalid-feedback d-block field-error">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            <!-- Buttons -->
                            <div class="gap-3 d-flex">

                                <button type="submit" class="px-5 btn btn-primary rounded-pill">

                                    <i class="fa fa-save me-2"></i>
                                    Save Changes

                                </button>

                                <a href="{{ route('user.show', $result->id) }}"
                                    class="px-5 btn btn-outline-secondary rounded-pill">

                                    Cancel

                                </a>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <style>
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .form-card {
            border: none;
            border-radius: 30px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, .06);
        }

        .form-control,
        .form-select {
            border-radius: 15px;
            padding: 14px;
            border: 1px solid #e5e7eb;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: #4f46e5;
            box-shadow: 0 0 0 .2rem rgba(79, 70, 229, .15);
        }

        .profile-preview {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid #f3f4f6;
            box-shadow: 0 5px 20px rgba(0, 0, 0, .1);
        }

        .btn-primary {
            background: linear-gradient(135deg, #4f46e5, #7c3aed);
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 15px;
        }

        .field-error {
            display: block;
            color: #dc3545;
            font-size: .875rem;
            margin-top: .35rem;
            transition: opacity .35s ease;
        }
    </style>

    <script>
        document.getElementById('removeImageBtn')?.addEventListener('click', function() {

            document.getElementById('remove_image').value = 1;

            document.getElementById('profilePreview').src =
                "{{ asset('images/users/default.jpg') }}";

            document.getElementById('profile_image').value = "";

            this.disabled = true;
            this.innerHTML = '<i class="fa fa-check"></i>';
        });
    </script>

@endsection
