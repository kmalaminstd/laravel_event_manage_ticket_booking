@extends('components.admin-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>All Orders</h5>
            <p>Platform-wide order management</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-download me-1"></i> Export CSV</button>
    </div>
</div>

<div class="dashboard-content">
    <!-- STAT CARDS -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card primary">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Total Orders</div>
                        <h3>8,920</h3>
                    </div>
                    <div class="stat-icon primary"><i class="bi bi-receipt"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card success">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Paid</div>
                        <h3>8,450</h3>
                    </div>
                    <div class="stat-icon success"><i class="bi bi-check-circle"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card warning">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Pending</div>
                        <h3>320</h3>
                    </div>
                    <div class="stat-icon warning"><i class="bi bi-hourglass-split"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card danger">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Refunded</div>
                        <h3>150</h3>
                    </div>
                    <div class="stat-icon danger"><i class="bi bi-arrow-counterclockwise"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- FILTER -->
    <div class="dashboard-card mb-4">
        <div class="d-flex flex-wrap gap-3 justify-content-between align-items-center">
            <div class="d-flex gap-2 flex-wrap">
                <button class="btn btn-sm btn-primary-custom">All</button>
                <button class="btn btn-sm btn-outline-primary-custom">Paid</button>
                <button class="btn btn-sm btn-outline-primary-custom">Pending</button>
                <button class="btn btn-sm btn-outline-primary-custom">Refunded</button>
            </div>
            <div class="d-flex gap-2">
                <input type="date" class="form-control form-control-sm"
                    style="width:auto;border-radius:var(--radius-full);">
                <input type="date" class="form-control form-control-sm"
                    style="width:auto;border-radius:var(--radius-full);">
                <div class="input-group" style="max-width:220px;"><span class="input-group-text bg-transparent"><i
                            class="bi bi-search"></i></span><input type="text" class="form-control"
                        placeholder="Order ID..."></div>
            </div>
        </div>
    </div>

    <!-- ORDERS TABLE -->
    <div class="dashboard-card">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Buyer</th>
                        <th>Event</th>
                        <th>Organizer</th>
                        <th>Amount</th>
                        <th>Platform Fee</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>#ORD-4821</strong></td>
                        <td>Sarah Johnson</td>
                        <td>Summer Music Festival</td>
                        <td>SoundMax Pro</td>
                        <td>$98.00</td>
                        <td>$9.80</td>
                        <td>Feb 18</td>
                        <td><span class="status-badge completed">Paid</span></td>
                    </tr>
                    <tr>
                        <td><strong>#ORD-4820</strong></td>
                        <td>Mike Chen</td>
                        <td>Tech Innovation Summit</td>
                        <td>SoundMax Pro</td>
                        <td>$129.00</td>
                        <td>$12.90</td>
                        <td>Feb 17</td>
                        <td><span class="status-badge completed">Paid</span></td>
                    </tr>
                    <tr>
                        <td><strong>#ORD-4819</strong></td>
                        <td>Emily Lee</td>
                        <td>Design Masterclass</td>
                        <td>SoundMax Pro</td>
                        <td>$35.00</td>
                        <td>$3.50</td>
                        <td>Feb 17</td>
                        <td><span class="status-badge pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td><strong>#ORD-4818</strong></td>
                        <td>James Wilson</td>
                        <td>Summer Music Festival</td>
                        <td>SoundMax Pro</td>
                        <td>$396.00</td>
                        <td>$39.60</td>
                        <td>Feb 16</td>
                        <td><span class="status-badge completed">Paid</span></td>
                    </tr>
                    <tr>
                        <td><strong>#ORD-4816</strong></td>
                        <td>Tom Davis</td>
                        <td>Jazz Night Live</td>
                        <td>SoundMax Pro</td>
                        <td>$30.00</td>
                        <td>$3.00</td>
                        <td>Feb 15</td>
                        <td><span class="status-badge refunded">Refunded</span></td>
                    </tr>
                    <tr>
                        <td><strong>#ORD-4812</strong></td>
                        <td>Priya Singh</td>
                        <td>Yoga & Wellness</td>
                        <td>HealthFirst Inc</td>
                        <td>$75.00</td>
                        <td>$7.50</td>
                        <td>Feb 14</td>
                        <td><span class="status-badge completed">Paid</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-muted" style="font-size:0.85rem;">Showing 1–6 of 8,920 orders</span>
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
