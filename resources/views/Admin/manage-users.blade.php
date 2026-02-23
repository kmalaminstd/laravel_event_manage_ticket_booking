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
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar" style="width:32px;height:32px;font-size:0.7rem;">SJ</div>
                                <strong>Sarah Johnson</strong>
                            </div>
                        </td>
                        <td>sarah@mail.com</td>
                        <td><span class="section-badge mb-0" style="font-size:0.7rem;">Attendee</span></td>
                        <td>Jan 12, 2026</td>
                        <td>12 tickets</td>
                        <td><span class="status-badge active">Active</span></td>
                        <td>
                            <div class="d-flex gap-1"><button class="action-btn" title="View"><i
                                        class="bi bi-eye"></i></button><button class="action-btn" title="Edit"><i
                                        class="bi bi-pencil"></i></button><button class="action-btn danger"
                                    title="Suspend"><i class="bi bi-slash-circle"></i></button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar" style="width:32px;height:32px;font-size:0.7rem;">SM</div>
                                <strong>SoundMax Pro</strong>
                            </div>
                        </td>
                        <td>contact@soundmax.com</td>
                        <td><span class="section-badge mb-0"
                                style="font-size:0.7rem;background:rgba(232,168,56,0.15);color:var(--accent);">Organizer</span>
                        </td>
                        <td>Nov 05, 2024</td>
                        <td>8 events</td>
                        <td><span class="status-badge active">Active</span></td>
                        <td>
                            <div class="d-flex gap-1"><button class="action-btn" title="View"><i
                                        class="bi bi-eye"></i></button><button class="action-btn" title="Edit"><i
                                        class="bi bi-pencil"></i></button><button class="action-btn danger"
                                    title="Suspend"><i class="bi bi-slash-circle"></i></button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar" style="width:32px;height:32px;font-size:0.7rem;">MC</div>
                                <strong>Mike Chen</strong>
                            </div>
                        </td>
                        <td>mike@mail.com</td>
                        <td><span class="section-badge mb-0"
                                style="font-size:0.7rem;background:rgba(232,168,56,0.15);color:var(--accent);">Organizer</span>
                        </td>
                        <td>Feb 10, 2026</td>
                        <td>2 events</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>
                            <div class="d-flex gap-1"><button class="action-btn success" title="Approve"><i
                                        class="bi bi-check-lg"></i></button><button class="action-btn danger"
                                    title="Reject"><i class="bi bi-x-lg"></i></button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar" style="width:32px;height:32px;font-size:0.7rem;">JD</div>
                                <strong>John Doe</strong>
                            </div>
                        </td>
                        <td>john@mail.com</td>
                        <td><span class="section-badge mb-0" style="font-size:0.7rem;">Attendee</span></td>
                        <td>Jan 05, 2026</td>
                        <td>24 tickets</td>
                        <td><span class="status-badge active">Active</span></td>
                        <td>
                            <div class="d-flex gap-1"><button class="action-btn" title="View"><i
                                        class="bi bi-eye"></i></button><button class="action-btn" title="Edit"><i
                                        class="bi bi-pencil"></i></button><button class="action-btn danger"
                                    title="Suspend"><i class="bi bi-slash-circle"></i></button></div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar" style="width:32px;height:32px;font-size:0.7rem;">TD</div>
                                <strong>Tom Davis</strong>
                            </div>
                        </td>
                        <td>tom@mail.com</td>
                        <td><span class="section-badge mb-0" style="font-size:0.7rem;">Attendee</span></td>
                        <td>Dec 18, 2025</td>
                        <td>5 tickets</td>
                        <td><span class="status-badge refunded">Suspended</span></td>
                        <td>
                            <div class="d-flex gap-1"><button class="action-btn success" title="Reactivate"><i
                                        class="bi bi-check-lg"></i></button><button class="action-btn danger"
                                    title="Delete"><i class="bi bi-trash"></i></button></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-muted" style="font-size:0.85rem;">Showing 1–5 of 12,480 users</span>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>

@endsection
