@extends('components.admin-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Manage Events</h5>
            <p>Review, approve, and manage all events</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-download me-1"></i> Export</button>
    </div>
</div>

<div class="dashboard-content">
    <div class="dashboard-card mb-4">
        <div class="d-flex flex-wrap gap-3 justify-content-between align-items-center">
            <div class="d-flex gap-2 flex-wrap">
                <button class="btn btn-sm btn-primary-custom">All (3,210)</button>
                <button class="btn btn-sm btn-outline-primary-custom">Active</button>
                <button class="btn btn-sm btn-outline-primary-custom">Pending</button>
                <button class="btn btn-sm btn-outline-primary-custom">Suspended</button>
                <button class="btn btn-sm btn-outline-primary-custom">Completed</button>
            </div>
            <div class="d-flex gap-2">
                <select class="form-select form-select-sm" style="width:auto;border-radius:var(--radius-full);">
                    <option>All Categories</option>
                    <option>Concert</option>
                    <option>Workshop</option>
                    <option>Conference</option>
                </select>
                <div class="input-group" style="max-width:240px;">
                    <span class="input-group-text bg-transparent"><i class="bi bi-search"></i></span><input type="text" class="form-control" placeholder="Search events...">
                </div>
            </div>
        </div>
    </div>

    <div class="dashboard-card">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Organizer</th>
                        <th>Category</th>
                        <th>Date</th>
                        <th>Tickets Sold</th>
                        <th>Revenue</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($events as $event)
                        <tr>
                            <td><strong>{{ $event->name }}</strong></td>
                            <td>{{ $event->user->name }}</td>
                            <td>{{ $event->category->name }}</td>
                            <td>{{ $event->start_date->format('M d , Y') }}</td>
                            <td>320/500</td>
                            <td>$15,680</td>
                            <td>
                                @if ($event->suspended)
                                    <span class="status-badge pending">Suspend</span>
                                @else
                                    @if ($event->admin_approved)
                                        <span class="status-badge active">Active</span>
                                    @else
                                        <span class="status-badge pending">Pending</span>
                                    @endif
                                @endif
                            </td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="/event/{{ $event->id }}/{{ $event->slug }}" class="action-btn" title="View"><i class="bi bi-eye"></i></a>
                                    @if ($event->admin_approved)                                      
                                        <x-forms.form method="POST">
                                            <button class="action-btn danger" title="Reject"><i class="bi bi-x-lg"></i></button>
                                        </x-forms.form>
                                    @else
                                        <x-forms.form method="POST">
                                            @method('PATCH')
                                            <button class="action-btn success" title="Approve"><i class="bi bi-check-lg"></i></button>
                                        </x-forms.form>
                                    @endif
                                     <x-forms.form method="POST">
                                            @method('PATCH')
                                            <button class="action-btn danger"  title="Suspend"><i class="bi bi-slash-circle"></i></button>
                                        </x-forms.form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-muted" style="font-size:0.85rem;">Showing 1–5 of 3,210 events</span>
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
