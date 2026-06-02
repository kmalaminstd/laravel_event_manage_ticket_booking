@extends('components.organizer-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Attendees</h5>
            <p>Track event check-ins</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-download me-1"></i> Export</button>
        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-envelope me-1"></i> Email All</button>
    </div>
</div>

<div class="dashboard-content">
    <!-- STAT CARDS -->
    <div class="row g-4 mb-4">
        <div class="col-sm-4">
            <div class="stat-card primary">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Total Attendees</div>
                        <h3>320</h3>
                    </div>
                    <div class="stat-icon primary"><i class="bi bi-people"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="stat-card success">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Checked In</div>
                        <h3>0</h3>
                    </div>
                    <div class="stat-icon success"><i class="bi bi-check-circle"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="stat-card warning">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Not Checked In</div>
                        <h3>320</h3>
                    </div>
                    <div class="stat-icon warning"><i class="bi bi-clock-history"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- FILTER -->
    <div class="dashboard-card mb-4">
        <div class="d-flex flex-wrap gap-3 justify-content-between align-items-center">
            <select class="form-select form-select-sm" style="width:auto;border-radius:var(--radius-full);">
                <option>Summer Music Festival</option>
                <option>Tech Innovation Summit</option>
                <option>Design Masterclass</option>
            </select>
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-primary-custom">All</button>
                <button class="btn btn-sm btn-outline-primary-custom">Checked In</button>
                <button class="btn btn-sm btn-outline-primary-custom">Not Checked In</button>
            </div>
            <div class="input-group" style="max-width:250px;">
                <span class="input-group-text bg-transparent"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" placeholder="Search by name/email...">
            </div>
        </div>
    </div>

    <!-- ATTENDEE TABLE -->
    <div class="dashboard-card">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Ticket Type</th>
                        <th>Order #</th>
                        <th>Check-In</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar" style="width:30px;height:30px;font-size:0.7rem;">SJ</div>
                                <strong>Sarah Johnson</strong>
                            </div>
                        </td>
                        <td>sarah@mail.com</td>
                        <td>General</td>
                        <td>#ORD-4821</td>
                        <td><span class="status-badge pending">Not Yet</span></td>
                        <td><button class="btn btn-sm btn-primary-custom"><i class="bi bi-check me-1"></i>Check
                                In</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar" style="width:30px;height:30px;font-size:0.7rem;">MC</div>
                                <strong>Mike Chen</strong>
                            </div>
                        </td>
                        <td>mike@mail.com</td>
                        <td>VIP</td>
                        <td>#ORD-4820</td>
                        <td><span class="status-badge pending">Not Yet</span></td>
                        <td><button class="btn btn-sm btn-primary-custom"><i class="bi bi-check me-1"></i>Check
                                In</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar" style="width:30px;height:30px;font-size:0.7rem;">JW</div>
                                <strong>James Wilson</strong>
                            </div>
                        </td>
                        <td>james@mail.com</td>
                        <td>Premium</td>
                        <td>#ORD-4818</td>
                        <td><span class="status-badge pending">Not Yet</span></td>
                        <td><button class="btn btn-sm btn-primary-custom"><i class="bi bi-check me-1"></i>Check
                                In</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar" style="width:30px;height:30px;font-size:0.7rem;">LP</div>
                                <strong>Lisa Park</strong>
                            </div>
                        </td>
                        <td>lisa@mail.com</td>
                        <td>General</td>
                        <td>#ORD-4815</td>
                        <td><span class="status-badge pending">Not Yet</span></td>
                        <td><button class="btn btn-sm btn-primary-custom"><i class="bi bi-check me-1"></i>Check
                                In</button></td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="user-avatar" style="width:30px;height:30px;font-size:0.7rem;">AB</div>
                                <strong>Anna Brown</strong>
                            </div>
                        </td>
                        <td>anna@mail.com</td>
                        <td>General</td>
                        <td>#ORD-4817</td>
                        <td><span class="status-badge pending">Not Yet</span></td>
                        <td><button class="btn btn-sm btn-primary-custom"><i class="bi bi-check me-1"></i>Check
                                In</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
