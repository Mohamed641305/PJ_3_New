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
            border-radius: 16px;
            overflow: hidden;
            border: none;
            background: #ffffff;
            padding: 12px;
            margin-top: 8px;
            box-shadow: 0 12px 30px rgba(16, 24, 40, 0.08);
        }

        body.dark-mode .table-wrapper {
            border-color: #444;
        }

        .table {
            margin-bottom: 0;
        }

        .card {
            border-radius: 20px;
            margin: 0 auto;
            max-width: 1200px;
        }

        .container-fluid {
            padding: 1rem 1rem 1.5rem;
        }

        .table-shell {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 14px;
            margin: 0 auto;
            max-width: 100%;
        }

        .page-header {
            display: grid;
            grid-template-columns: 1fr auto;
            align-items: center;
            gap: 15px;
        }

        .page-header .header-title {
            justify-self: center;
            text-align: center;
            min-width: 0;
        }

        .page-header .header-title h3 {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .page-header .header-title .text-muted {
            display: block;
        }

        .page-header .btn {
            flex: 0 0 auto;
        }

        /* keep subtle lift for table wrapper (already applied above) */

        .user-avatar {
            width: 55px;
            height: 55px;
            object-fit: cover;
            border: 2px solid #fff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, .12);
        }

        .action-btns {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .action-btns .btn {
            width: 38px;
            height: 38px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }

        .table-shell {
            width: 100%;
            display: flex;
            flex-direction: column;
            gap: 14px;
        }

        .search-box {
            margin-bottom: 0;
            width: 100%;
        }

        .search-controls {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            width: 100%;
        }

        .search-controls .input-group {
            flex: 1 1 320px;
            min-width: 240px;
            box-shadow: 0 8px 24px rgba(79, 70, 229, 0.10);
            border-radius: 16px;
            overflow: hidden;
        }

        .search-controls .input-group-text {
            background: #fff;
            border: none;
            color: #4f46e5;
            padding-left: 15px;
        }

        .search-controls .form-control,
        .search-controls .form-select {
            border: none;
            padding: 12px 14px;
            box-shadow: none;
        }

        .search-controls .form-control:focus,
        .search-controls .form-select:focus {
            box-shadow: none;
        }

        .user-card-mobile {
            display: none;
        }

        .mobile-card-title {
            font-size: 1rem;
        }

        .user-card-mobile .card-body {
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 12px;
        }

        .user-card-mobile .profile-block {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 8px;
            width: 100%;
        }

        .user-card-mobile .profile-meta {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 4px;
            width: 100%;
        }

        .user-card-mobile .badge-group {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 6px;
        }

        @media (max-width: 767px) {
            .page-header {
                align-items: flex-start;
            }

            .page-header .btn {
                width: 100%;
                justify-content: center;
            }

            .search-controls {
                flex-direction: column;
                align-items: stretch;
            }

            .search-controls .input-group {
                width: 100%;
                flex: 1 1 100%;
            }

            .user-card-mobile {
                display: block;
                margin-left: auto;
                margin-right: auto;
                max-width: 500px;
            }

            .table thead {
                display: none;
            }

            .table,
            .table tbody,
            .table tr,
            .table td {
                display: block;
                width: 100%;
            }

            .table tr {
                margin-bottom: 15px;
                border: 1px solid #e9ecef;
                border-radius: 15px;
                padding: 15px;
                background: #fff;
            }

            body.dark-mode .table tr {
                background: #2a2d3a;
                border-color: #444;
            }

            .table td {
                border: none;
                padding: 8px 0;
            }

            .table td::before {
                content: attr(data-label);
                font-weight: 600;
                display: inline-block;
                min-width: 90px;
                color: #6c757d;
            }

            body.dark-mode .table td::before {
                color: #cbd5e1;
            }
        }
    </style>

    <div class="container-fluid">

        <div class="border-0 shadow card rounded-4">

            <div class="py-4 bg-white border-0 card-header rounded-top-4">
                <div class="page-header">

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
                        <span class="d-none d-sm-inline">Add User</span>
                    </a>

                </div>
            </div>

            <div class="card-body">

                <div class="table-shell">
                    <div class="search-box">
                        <div class="search-controls">
                            <div class="input-group">
                                <span class="input-group-text"><i class="fas fa-search"></i></span>
                                <input type="text" id="userSearch" class="form-control"
                                    placeholder="Search by name, email, phone...">
                            </div>

                        </div>
                    </div>

                    <div class="table-wrapper">

                        <div class="table-responsive d-none d-md-block">

                            <table class="table align-middle table-hover" id="usersTable">

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
                                        <tr data-name="{{ strtolower($item->name) }}"
                                            data-email="{{ strtolower($item->email) }}"
                                            data-phone="{{ $item->phone_number ?? ($item->phone ?? '') }}">

                                            <td data-label="#">{{ $item->id }}</td>

                                            <td data-label="Photo">
                                                <img src="{{ $item->profile_image ? asset('images/users/' . $item->profile_image) : asset('images/users/default.jpg') }}"
                                                    class="rounded-circle user-avatar">
                                            </td>

                                            <td class="fw-semibold" data-label="Name">
                                                {{ $item->name }}
                                            </td>

                                            <td data-label="Email">{{ $item->email }}</td>

                                            <td data-label="Role">
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

                                            <td data-label="Status">
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

                                            <td data-label="Actions">
                                                <div class="action-btns">
                                                    <a href="{{ route('user.show', $item->id) }}"
                                                        class="btn btn-success btn-sm" title="View">
                                                        <i class="fas fa-eye"></i>
                                                    </a>

                                                    <a href="{{ route('user.edit', $item->id) }}"
                                                        class="btn btn-primary btn-sm" title="Edit">
                                                        <i class="fas fa-edit"></i>
                                                    </a>

                                                    <a href="{{ route('user.delete', $item->id) }}"
                                                        class="btn btn-danger btn-sm" title="Delete"
                                                        onclick="return confirm('Are you sure?')">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </div>
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

                        <div class="d-block d-md-none" id="usersCards">
                            @forelse($users as $item)
                                <div class="mb-3 card user-card-mobile" data-name="{{ strtolower($item->name) }}"
                                    data-email="{{ strtolower($item->email) }}"
                                    data-phone="{{ $item->phone_number ?? ($item->phone ?? '') }}">
                                    <div class="card-body">
                                        <div class="profile-block">
                                            <img src="{{ $item->profile_image ? asset('images/users/' . $item->profile_image) : asset('images/users/default.jpg') }}"
                                                class="rounded-circle user-avatar">
                                            <div class="profile-meta">
                                                <h6 class="mb-1 fw-semibold mobile-card-title">{{ $item->name }}</h6>
                                                <div class="small text-muted">{{ $item->email }}</div>
                                                <div class="mt-1 badge-group">
                                                    @if ($item->role == 'admin')
                                                        <span class="badge bg-danger">Admin</span>
                                                    @else
                                                        <span class="badge bg-info">User</span>
                                                    @endif

                                                    @if ($item->status == '1')
                                                        <span class="badge bg-success">Active</span>
                                                    @else
                                                        <span class="badge bg-secondary">Blocked</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="action-btns">
                                            <a href="{{ route('user.show', $item->id) }}" class="btn btn-success btn-sm"><i
                                                    class="fas fa-eye"></i></a>
                                            <a href="{{ route('user.edit', $item->id) }}" class="btn btn-primary btn-sm"><i
                                                    class="fas fa-edit"></i></a>
                                            <a href="{{ route('user.delete', $item->id) }}" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="py-4 text-center">No users found</div>
                            @endforelse
                        </div>

                    </div>

                </div>

            </div>

        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('userSearch');
                const rows = document.querySelectorAll('#usersTable tbody tr');
                const cards = document.querySelectorAll('#usersCards .user-card-mobile');

                function normalizeSearchValue(value) {
                    return String(value || '')
                        .toLowerCase()
                        .normalize('NFKD')
                        .replace(/[\u0300-\u036f]/g, '')
                        .replace(/[^\p{L}\p{N}]/gu, '');
                }

                function getSearchText(item) {
                    const values = [
                        item.getAttribute('data-name') || '',
                        item.getAttribute('data-email') || '',
                        item.getAttribute('data-phone') || ''
                    ];

                    return values.map(normalizeSearchValue).join(' ');
                }

                function matchesSearch(item, term) {
                    if (!term) {
                        return true;
                    }

                    const searchText = getSearchText(item);
                    const tokens = term.split(/\s+/).filter(Boolean);

                    return tokens.every(function(token) {
                        return searchText.includes(token);
                    });
                }

                function applySearch() {
                    const term = normalizeSearchValue(searchInput ? searchInput.value : '');

                    rows.forEach(function(row) {
                        row.style.display = matchesSearch(row, term) ? '' : 'none';
                    });

                    cards.forEach(function(card) {
                        card.style.display = matchesSearch(card, term) ? '' : 'none';
                    });
                }

                if (searchInput) {
                    searchInput.addEventListener('input', applySearch);
                }
            });
        </script>

    @endsection
