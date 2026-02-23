@extends('components.organizer-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Orders</h5>
            <p>Track all ticket purchases</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-download me-1"></i> Export CSV</button>
    </div>
</div>

<div class="dashboard-content">
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
                <select class="form-select form-select-sm" style="width:auto;border-radius:var(--radius-full);">
                    <option>All Events</option>
                    <option>Summer Music Festival</option>
                    <option>Tech Innovation Summit</option>
                </select>
                <div class="input-group" style="max-width:220px;">
                    <span class="input-group-text bg-transparent"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" placeholder="Search orders...">
                </div>
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
                        <th>Email</th>
                        <th>Event</th>
                        <th>Qty</th>
                        <th>Amount</th>
                        <th>Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>#ORD-4821</strong></td>
                        <td>Sarah Johnson</td>
                        <td>sarah@mail.com</td>
                        <td>Summer Music Festival</td>
                        <td>2</td>
                        <td>$98.00</td>
                        <td>Feb 18</td>
                        <td><span class="status-badge completed">Paid</span></td>
                    </tr>
                    <tr>
                        <td><strong>#ORD-4820</strong></td>
                        <td>Mike Chen</td>
                        <td>mike@mail.com</td>
                        <td>Tech Innovation Summit</td>
                        <td>1</td>
                        <td>$129.00</td>
                        <td>Feb 17</td>
                        <td><span class="status-badge completed">Paid</span></td>
                    </tr>
                    <tr>
                        <td><strong>#ORD-4819</strong></td>
                        <td>Emily Lee</td>
                        <td>emily@mail.com</td>
                        <td>Design Masterclass</td>
                        <td>1</td>
                        <td>$35.00</td>
                        <td>Feb 17</td>
                        <td><span class="status-badge pending">Pending</span></td>
                    </tr>
                    <tr>
                        <td><strong>#ORD-4818</strong></td>
                        <td>James Wilson</td>
                        <td>james@mail.com</td>
                        <td>Summer Music Festival</td>
                        <td>4</td>
                        <td>$396.00</td>
                        <td>Feb 16</td>
                        <td><span class="status-badge completed">Paid</span></td>
                    </tr>
                    <tr>
                        <td><strong>#ORD-4817</strong></td>
                        <td>Anna Brown</td>
                        <td>anna@mail.com</td>
                        <td>Food & Culture Fest</td>
                        <td>2</td>
                        <td>$150.00</td>
                        <td>Feb 16</td>
                        <td><span class="status-badge completed">Paid</span></td>
                    </tr>
                    <tr>
                        <td><strong>#ORD-4816</strong></td>
                        <td>Tom Davis</td>
                        <td>tom@mail.com</td>
                        <td>Jazz Night Live</td>
                        <td>1</td>
                        <td>$30.00</td>
                        <td>Feb 15</td>
                        <td><span class="status-badge refunded">Refunded</span></td>
                    </tr>
                    <tr>
                        <td><strong>#ORD-4815</strong></td>
                        <td>Lisa Park</td>
                        <td>lisa@mail.com</td>
                        <td>Summer Music Festival</td>
                        <td>3</td>
                        <td>$297.00</td>
                        <td>Feb 14</td>
                        <td><span class="status-badge completed">Paid</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <span class="text-muted" style="font-size:0.85rem;">Showing 1–7 of 142 orders</span>
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
