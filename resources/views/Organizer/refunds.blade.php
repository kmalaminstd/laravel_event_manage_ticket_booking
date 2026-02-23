@extends('components.organizer-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Refund Management</h5>
            <p>Review and process refund requests</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="topbar-icon"><i class="bi bi-bell"></i><span class="badge-dot"></span></button>
    </div>
</div>

<div class="dashboard-content">
    <!-- STAT CARDS -->
    <div class="row g-4 mb-4">
        <div class="col-sm-4">
            <div class="stat-card warning">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Pending Refunds</div>
                        <h3>3</h3>
                    </div>
                    <div class="stat-icon warning"><i class="bi bi-hourglass-split"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="stat-card success">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Approved</div>
                        <h3>12</h3>
                    </div>
                    <div class="stat-icon success"><i class="bi bi-check-circle"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="stat-card danger">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Rejected</div>
                        <h3>2</h3>
                    </div>
                    <div class="stat-icon danger"><i class="bi bi-x-circle"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- REFUND TABLE -->
    <div class="dashboard-card">
        <div class="card-header-custom">
            <h5>Refund Requests</h5>
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
                        <th>Request ID</th>
                        <th>Buyer</th>
                        <th>Event</th>
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
                        <td>$30.00</td>
                        <td>Cannot attend</td>
                        <td>Feb 15</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>
                            <div class="d-flex gap-1"><button class="action-btn success" title="Approve"><i
                                        class="bi bi-check-lg"></i></button><button class="action-btn danger"
                                    title="Reject"><i class="bi bi-x-lg"></i></button></div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#REF-300</strong></td>
                        <td>Nina Patel</td>
                        <td>Summer Music Festival</td>
                        <td>$49.00</td>
                        <td>Health reasons</td>
                        <td>Feb 14</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>
                            <div class="d-flex gap-1"><button class="action-btn success" title="Approve"><i
                                        class="bi bi-check-lg"></i></button><button class="action-btn danger"
                                    title="Reject"><i class="bi bi-x-lg"></i></button></div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#REF-299</strong></td>
                        <td>Alex Rivera</td>
                        <td>Design Masterclass</td>
                        <td>$35.00</td>
                        <td>Duplicate purchase</td>
                        <td>Feb 13</td>
                        <td><span class="status-badge pending">Pending</span></td>
                        <td>
                            <div class="d-flex gap-1"><button class="action-btn success" title="Approve"><i
                                        class="bi bi-check-lg"></i></button><button class="action-btn danger"
                                    title="Reject"><i class="bi bi-x-lg"></i></button></div>
                        </td>
                    </tr>
                    <tr>
                        <td><strong>#REF-298</strong></td>
                        <td>Sarah Johnson</td>
                        <td>Tech Summit</td>
                        <td>$129.00</td>
                        <td>Cannot attend</td>
                        <td>Feb 10</td>
                        <td><span class="status-badge completed">Approved</span></td>
                        <td><span class="text-muted" style="font-size:0.8rem;">Processed</span></td>
                    </tr>
                    <tr>
                        <td><strong>#REF-297</strong></td>
                        <td>Mike Chen</td>
                        <td>Jazz Night Live</td>
                        <td>$30.00</td>
                        <td>Changed mind</td>
                        <td>Feb 08</td>
                        <td><span class="status-badge refunded">Rejected</span></td>
                        <td><span class="text-muted" style="font-size:0.8rem;">Non-refundable</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
