@extends('components.admin-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Manage Users</h5>
            <p>View and manage all registered users</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-download me-1"></i> Export</button>
        <button class="btn btn-sm btn-primary-custom"><i class="bi bi-person-plus me-1"></i> Add User</button>
    </div>
</div>

<div class="dashboard-content">
    <!-- FILTER -->
    <div class="dashboard-card mb-4">
        <div class="d-flex flex-wrap gap-3 justify-content-between align-items-center">
            <div class="d-flex gap-2 flex-wrap">
                <button class="btn btn-sm btn-primary-custom">All (12,480)</button>
                <button class="btn btn-sm btn-outline-primary-custom">Attendees</button>
                <button class="btn btn-sm btn-outline-primary-custom">Organizers</button>
                <button class="btn btn-sm btn-outline-primary-custom">Suspended</button>
            </div>
            <div class="input-group" style="max-width:280px;">
                <span class="input-group-text bg-transparent"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" placeholder="Search users...">
            </div>
        </div>
    </div>

    <!-- USERS TABLE -->
    <div class="dashboard-card">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Joined</th>
                        <th>Events/Tickets</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($users as $user)
                        
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <strong>{{ $user->name }}</strong>
                                </div>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td><span class="section-badge mb-0" style="font-size:0.7rem;">{{ $user->role }}</span></td>
                            <td>{{ $user->created_at->format('d M, Y') }}</td>
                            <td>12 tickets</td>
                            <td><span class="status-badge active">Active</span></td>
                            <td>
                                <div class="d-flex gap-1"><button class="action-btn" title="View"><i class="bi bi-eye"></i></button><button class="action-btn" title="Edit"><i class="bi bi-pencil"></i></button><button class="action-btn danger" title="Suspend"><i class="bi bi-slash-circle"></i></button></div>
                            </td>
                        </tr>

                    @empty
                        <p>No users found</p>
                    @endforelse


                    
                </tbody>
            </table>
        </div>
        {{ $users->links('vendor.pagination.bootstrap-4') }}
    </div>
</div>

@endsection
