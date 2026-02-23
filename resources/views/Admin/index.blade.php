@extends('components.admin-layout')

@section('content')


<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Admin Dashboard</h5>
            <p>Platform overview & system health</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="topbar-icon"><i class="bi bi-bell"></i><span class="badge-dot"></span></button>
    </div>
</div>

<div class="dashboard-content">
    <!-- STAT CARDS -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card primary">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Total Revenue</div>
                        <h3>$245,800</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 22%</span>
                    </div>
                    <div class="stat-icon primary"><i class="bi bi-currency-dollar"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card success">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Total Users</div>
                        <h3>12,480</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 8%</span>
                    </div>
                    <div class="stat-icon success"><i class="bi bi-people"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card warning">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Total Events</div>
                        <h3>3,210</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 15%</span>
                    </div>
                    <div class="stat-icon warning"><i class="bi bi-calendar-event"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card info">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Active Organizers</div>
                        <h3>856</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 12%</span>
                    </div>
                    <div class="stat-icon info"><i class="bi bi-person-badge"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- CHARTS -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Platform Revenue</h5>
                    <select class="form-select form-select-sm" style="width:auto;border-radius:var(--radius-full);">
                        <option>2026</option>
                        <option>2025</option>
                    </select>
                </div>
                <div style="height:300px;"><canvas id="lineChart" data-label="Revenue"></canvas></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>User Distribution</h5>
                </div>
                <div style="height:300px;"><canvas id="pieChart"></canvas></div>
            </div>
        </div>
    </div>

    <!-- RECENT ACTIVITY -->
    <div class="row g-4">
        <div class="col-lg-6">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Recent Registrations</h5><a href="admin-manage-users.html" class="text-decoration-none"
                        style="font-size:0.85rem;color:var(--primary);">View all</a>
                </div>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between align-items-center p-2 rounded"
                        style="background:var(--light-bg);">
                        <div class="d-flex align-items-center gap-2">
                            <div class="user-avatar" style="width:35px;height:35px;font-size:0.7rem;">SJ</div>
                            <div><strong style="font-size:0.85rem;">Sarah Johnson</strong>
                                <div class="text-muted" style="font-size:0.75rem;">Attendee · 2 hours ago</div>
                            </div>
                        </div>
                        <span class="status-badge active">Active</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-2 rounded"
                        style="background:var(--light-bg);">
                        <div class="d-flex align-items-center gap-2">
                            <div class="user-avatar" style="width:35px;height:35px;font-size:0.7rem;">MC</div>
                            <div><strong style="font-size:0.85rem;">Mike Chen</strong>
                                <div class="text-muted" style="font-size:0.75rem;">Organizer · 5 hours ago</div>
                            </div>
                        </div>
                        <span class="status-badge pending">Pending</span>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-2 rounded"
                        style="background:var(--light-bg);">
                        <div class="d-flex align-items-center gap-2">
                            <div class="user-avatar" style="width:35px;height:35px;font-size:0.7rem;">EL</div>
                            <div><strong style="font-size:0.85rem;">Emily Lee</strong>
                                <div class="text-muted" style="font-size:0.75rem;">Attendee · 1 day ago</div>
                            </div>
                        </div>
                        <span class="status-badge active">Active</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Pending Approvals</h5><a href="admin-manage-events.html" class="text-decoration-none"
                        style="font-size:0.85rem;color:var(--primary);">View all</a>
                </div>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between align-items-center p-2 rounded"
                        style="background:var(--light-bg);">
                        <div><strong style="font-size:0.85rem;">AI & Future of Work Forum</strong>
                            <div class="text-muted" style="font-size:0.75rem;">by SoundMax Pro · Submitted 2 days ago
                            </div>
                        </div>
                        <div class="d-flex gap-1"><button class="action-btn success"><i
                                    class="bi bi-check-lg"></i></button><button class="action-btn danger"><i
                                    class="bi bi-x-lg"></i></button></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-2 rounded"
                        style="background:var(--light-bg);">
                        <div><strong style="font-size:0.85rem;">Yoga & Wellness Retreat</strong>
                            <div class="text-muted" style="font-size:0.75rem;">by HealthFirst Inc · Submitted 3 days ago
                            </div>
                        </div>
                        <div class="d-flex gap-1"><button class="action-btn success"><i
                                    class="bi bi-check-lg"></i></button><button class="action-btn danger"><i
                                    class="bi bi-x-lg"></i></button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
