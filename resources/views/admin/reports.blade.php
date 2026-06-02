@extends('components.admin-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Reports & Analytics</h5>
            <p>Platform-wide performance insights</p>
        </div>
    </div>
    <div class="topbar-right">
        <select class="form-select form-select-sm" style="width:auto;border-radius:var(--radius-full);">
            <option>Last 30 Days</option>
            <option>Last 90 Days</option>
            <option>Last 12 Months</option>
            <option>All Time</option>
        </select>
        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-download me-1"></i> PDF</button>
    </div>
</div>

<div class="dashboard-content">
    <!-- STATS -->
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
                        <div class="stat-label">Platform Fees</div>
                        <h3>$24,580</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 22%</span>
                    </div>
                    <div class="stat-icon success"><i class="bi bi-piggy-bank"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card warning">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Total Refunds</div>
                        <h3>$4,500</h3><span class="stat-change down"><i class="bi bi-arrow-down"></i> 3%</span>
                    </div>
                    <div class="stat-icon warning"><i class="bi bi-arrow-counterclockwise"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card info">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">New Users</div>
                        <h3>2,340</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 15%</span>
                    </div>
                    <div class="stat-icon info"><i class="bi bi-person-plus"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- CHARTS -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Revenue & Fees Trend</h5>
                </div>
                <div style="height:300px;"><canvas id="lineChart" data-label="Revenue"></canvas></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Events by Category</h5>
                </div>
                <div style="height:300px;"><canvas id="pieChart"></canvas></div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>User Growth</h5>
                </div>
                <div style="height:280px;"><canvas id="barChart"></canvas></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Top Organizers</h5>
                </div>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="user-avatar" style="width:35px;height:35px;font-size:0.7rem;">SM</div>
                            <div><strong style="font-size:0.9rem;">SoundMax Pro</strong>
                                <div class="text-muted" style="font-size:0.75rem;">8 events · 1,842 tickets</div>
                            </div>
                        </div>
                        <strong style="color:var(--primary);">$112,275</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="user-avatar" style="width:35px;height:35px;font-size:0.7rem;">HF</div>
                            <div><strong style="font-size:0.9rem;">HealthFirst Inc</strong>
                                <div class="text-muted" style="font-size:0.75rem;">3 events · 420 tickets</div>
                            </div>
                        </div>
                        <strong style="color:var(--primary);">$31,500</strong>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center gap-2">
                            <div class="user-avatar" style="width:35px;height:35px;font-size:0.7rem;">TP</div>
                            <div><strong style="font-size:0.9rem;">TechPulse Media</strong>
                                <div class="text-muted" style="font-size:0.75rem;">5 events · 980 tickets</div>
                            </div>
                        </div>
                        <strong style="color:var(--primary);">$78,400</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
