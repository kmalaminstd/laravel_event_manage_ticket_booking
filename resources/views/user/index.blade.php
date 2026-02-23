@extends('components.user-layout')

@section('content')


<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Dashboard</h5>
            <p>Welcome back, John! 👋</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="topbar-icon"><i class="bi bi-bell"></i><span class="badge-dot"></span></button>
        <button class="topbar-icon"><i class="bi bi-person"></i></button>
    </div>
</div>

<div class="dashboard-content">
    <!-- STAT CARDS -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card primary">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Tickets Purchased</div>
                        <h3>24</h3>
                        <span class="stat-change up"><i class="bi bi-arrow-up"></i> 12% this month</span>
                    </div>
                    <div class="stat-icon primary"><i class="bi bi-ticket-perforated"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card success">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Upcoming Events</div>
                        <h3>5</h3>
                        <span class="stat-change up"><i class="bi bi-arrow-up"></i> 2 new</span>
                    </div>
                    <div class="stat-icon success"><i class="bi bi-calendar-event"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card warning">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Total Spent</div>
                        <h3>$1,850</h3>
                        <span class="stat-change down"><i class="bi bi-arrow-down"></i> 5% vs last</span>
                    </div>
                    <div class="stat-icon warning"><i class="bi bi-cash-stack"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card info">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Refund Status</div>
                        <h3>1</h3>
                        <span class="stat-change" style="color:var(--info);">Pending</span>
                    </div>
                    <div class="stat-icon info"><i class="bi bi-arrow-counterclockwise"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- CHART + UPCOMING -->
    <div class="row g-4">
        <div class="col-lg-8">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Monthly Spending</h5>
                    <select class="form-select form-select-sm" style="width:auto;border-radius:var(--radius-full);">
                        <option>2026</option>
                        <option>2025</option>
                    </select>
                </div>
                <div style="height:300px;">
                    <canvas id="lineChart" data-label="Spending"></canvas>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Upcoming Events</h5>
                    <a href="user-tickets.html" class="text-decoration-none"
                        style="font-size:0.85rem;color:var(--primary);">View all</a>
                </div>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex gap-3 align-items-center p-2 rounded" style="background:var(--light-bg);">
                        <div
                            style="width:45px;height:45px;border-radius:var(--radius-sm);background:var(--gradient-primary);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">
                            15<br><small style="font-size:0.55rem;">MAR</small></div>
                        <div>
                            <strong style="font-size:0.85rem;">Summer Music Festival</strong>
                            <div class="text-muted" style="font-size:0.75rem;">6:00 PM · NYC</div>
                        </div>
                    </div>
                    <div class="d-flex gap-3 align-items-center p-2 rounded" style="background:var(--light-bg);">
                        <div
                            style="width:45px;height:45px;border-radius:var(--radius-sm);background:var(--gradient-accent);display:flex;align-items:center;justify-content:center;color:#1a1a2e;font-weight:700;">
                            22<br><small style="font-size:0.55rem;">MAR</small></div>
                        <div>
                            <strong style="font-size:0.85rem;">Design Masterclass</strong>
                            <div class="text-muted" style="font-size:0.75rem;">2:00 PM · London</div>
                        </div>
                    </div>
                    <div class="d-flex gap-3 align-items-center p-2 rounded" style="background:var(--light-bg);">
                        <div
                            style="width:45px;height:45px;border-radius:var(--radius-sm);background:linear-gradient(135deg,#28a745,#20c997);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">
                            10<br><small style="font-size:0.55rem;">APR</small></div>
                        <div>
                            <strong style="font-size:0.85rem;">Tech Innovation Summit</strong>
                            <div class="text-muted" style="font-size:0.75rem;">9:00 AM · SF</div>
                        </div>
                    </div>
                    <div class="d-flex gap-3 align-items-center p-2 rounded" style="background:var(--light-bg);">
                        <div
                            style="width:45px;height:45px;border-radius:var(--radius-sm);background:linear-gradient(135deg,#706127,#9a8a3c);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">
                            05<br><small style="font-size:0.55rem;">APR</small></div>
                        <div>
                            <strong style="font-size:0.85rem;">AI & Future of Work</strong>
                            <div class="text-muted" style="font-size:0.75rem;">10:00 AM · Berlin</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
