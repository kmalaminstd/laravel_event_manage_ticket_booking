@extends('components.organizer-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Analytics</h5>
            <p>Deep dive into your performance</p>
        </div>
    </div>
    <div class="topbar-right">
        <select class="form-select form-select-sm" style="width:auto;border-radius:var(--radius-full);">
            <option>All Events</option>
            <option>Summer Music Festival</option>
            <option>Tech Innovation Summit</option>
        </select>
        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-download me-1"></i> Report</button>
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
                        <h3>$24,580</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 18%</span>
                    </div>
                    <div class="stat-icon primary"><i class="bi bi-currency-dollar"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card success">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Tickets Sold</div>
                        <h3>1,842</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 24%</span>
                    </div>
                    <div class="stat-icon success"><i class="bi bi-ticket-perforated"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card warning">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Page Views</div>
                        <h3>12,450</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 32%</span>
                    </div>
                    <div class="stat-icon warning"><i class="bi bi-eye"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card info">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Avg. Rating</div>
                        <h3>4.8</h3><span class="stat-change up"><i class="bi bi-star-fill"></i> Excellent</span>
                    </div>
                    <div class="stat-icon info"><i class="bi bi-star"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- CHARTS -->
    <div class="row g-4 mb-4">
        <div class="col-lg-8">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Revenue Trend</h5>
                </div>
                <div style="height:300px;"><canvas id="lineChart" data-label="Revenue"></canvas></div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Ticket Distribution</h5>
                </div>
                <div style="height:300px;"><canvas id="pieChart"></canvas></div>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-6">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Sales by Event</h5>
                </div>
                <div style="height:280px;"><canvas id="barChart"></canvas></div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Top Performing Events</h5>
                </div>
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div><strong style="font-size:0.9rem;">Summer Music Festival</strong>
                            <div class="text-muted" style="font-size:0.75rem;">320 tickets</div>
                        </div>
                        <div class="text-end"><strong style="color:var(--primary);">$15,680</strong>
                            <div style="font-size:0.75rem;color:var(--success);"><i class="bi bi-arrow-up"></i> 22%
                            </div>
                        </div>
                    </div>
                    <div class="progress" style="height:6px;">
                        <div class="progress-bar"
                            style="width:85%;background:var(--gradient-primary);border-radius:var(--radius-full);">
                        </div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div><strong style="font-size:0.9rem;">Tech Innovation Summit</strong>
                            <div class="text-muted" style="font-size:0.75rem;">580 tickets</div>
                        </div>
                        <div class="text-end"><strong style="color:var(--primary);">$74,820</strong>
                            <div style="font-size:0.75rem;color:var(--success);"><i class="bi bi-arrow-up"></i> 31%
                            </div>
                        </div>
                    </div>
                    <div class="progress" style="height:6px;">
                        <div class="progress-bar"
                            style="width:95%;background:var(--gradient-accent);border-radius:var(--radius-full);"></div>
                    </div>
                    <div class="d-flex justify-content-between align-items-center">
                        <div><strong style="font-size:0.9rem;">Design Masterclass</strong>
                            <div class="text-muted" style="font-size:0.75rem;">45 tickets</div>
                        </div>
                        <div class="text-end"><strong style="color:var(--primary);">$1,575</strong>
                            <div style="font-size:0.75rem;color:var(--danger);"><i class="bi bi-arrow-down"></i> 5%
                            </div>
                        </div>
                    </div>
                    <div class="progress" style="height:6px;">
                        <div class="progress-bar"
                            style="width:30%;background:linear-gradient(135deg,#28a745,#20c997);border-radius:var(--radius-full);">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
