@extends('components.admin-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Global Refunds</h5>
            <p>Platform-wide refund management</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-download me-1"></i> Export</button>
    </div>
</div>

<div class="dashboard-content">
    <!-- STAT CARDS -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card warning">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Pending</div>
                        <h3>18</h3>
                    </div>
                    <div class="stat-icon warning"><i class="bi bi-hourglass-split"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card success">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Approved</div>
                        <h3>120</h3>
                    </div>
                    <div class="stat-icon success"><i class="bi bi-check-circle"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card danger">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Rejected</div>
                        <h3>12</h3>
                    </div>
                    <div class="stat-icon danger"><i class="bi bi-x-circle"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card primary">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Total Refunded</div>
                        <h3>$4,500</h3>
                    </div>
                    <div class="stat-icon primary"><i class="bi bi-currency-dollar"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- TABLE -->
    <div class="dashboard-card">
        <div class="card-header-custom">
            <h5>All Refund Requests</h5>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-primary-custom">All</button>
                <button class="btn btn-sm btn-outline-primary-custom">Pending</button>
                <button class="btn btn-sm btn-outline-primary-custom">Approved</button>
                <button class="btn btn-sm btn-outline-primary-custom">Rejected</button>
            </div>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Buyer</th>
                        <th>Event</th>
                        <th>Organizer</th>
                        <th>Amount</th>
                        <th>Reason</th>
                        <th>Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>#REF-301</strong></td>
                        <td>Tom Davis</td>
                        <td>Jazz Night Live</td>
                        <td>SoundMax Pro</td>
                        <td>$30.00</td>
                        <td>Cannot attend</td>
                        <td>Feb 15</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>
                            <div class="d-flex gap-1"><button class="action-btn success"><i
                                        class="bi bi-check-lg"></i></button><button class="action-btn danger"><i
                                        class="bi bi-x-lg"></i></button></div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#REF-300</strong></td>
                        <td>Nina Patel</td>
                        <td>Summer Music Fest</td>
                        <td>SoundMax Pro</td>
                        <td>$49.00</td>
                        <td>Health reasons</td>
                        <td>Feb 14</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>
                            <div class="d-flex gap-1"><button class="action-btn success"><i
                                        class="bi bi-check-lg"></i></button><button class="action-btn danger"><i
                                        class="bi bi-x-lg"></i></button></div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#REF-299</strong></td>
                        <td>Alex Rivera</td>
                        <td>Design Masterclass</td>
                        <td>SoundMax Pro</td>
                        <td>$35.00</td>
                        <td>Duplicate</td>
                        <td>Feb 13</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>
                            <div class="d-flex gap-1"><button class="action-btn success"><i
                                        class="bi bi-check-lg"></i></button><button class="action-btn danger"><i
                                        class="bi bi-x-lg"></i></button></div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#REF-298</strong></td>
                        <td>Sarah Johnson</td>
                        <td>Tech Summit</td>
                        <td>SoundMax Pro</td>
                        <td>$129.00</td>
                        <td>Cannot attend</td>
                        <td>Feb 10</td>
                        <td><span class="status-badge completed">Approved</span></td>
                        <td><span class="text-muted" style="font-size:0.8rem;">Processed</span></td>
                    </tr>
                    <tr>
                        <td><strong>#REF-295</strong></td>
                        <td>Raj Gupta</td>
                        <td>Yoga Retreat</td>
                        <td>HealthFirst Inc</td>
                        <td>$75.00</td>
                        <td>Changed mind</td>
                        <td>Feb 08</td>
                        <td><span class="status-badge refunded">Rejected</span></td>
                        <td><span class="text-muted" style="font-size:0.8rem;">Non-refundable</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-muted" style="font-size:0.85rem;">Showing 1–5 of 150</span>
            <nav>
                <ul class="pagination pagination-sm mb-0">
                    <li class="page-item disabled"><a class="page-link" href="#">«</a></li>
                    <li class="page-item active"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>


@endsection
