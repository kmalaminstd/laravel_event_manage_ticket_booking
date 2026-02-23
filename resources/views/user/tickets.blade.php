@extends('components.user-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>My Tickets</h5>
            <p>Manage your event tickets</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="topbar-icon"><i class="bi bi-bell"></i><span class="badge-dot"></span></button>
        <button class="topbar-icon"><i class="bi bi-person"></i></button>
    </div>
</div>

<div class="dashboard-content">
    <!-- FILTER BAR -->
    <div class="dashboard-card mb-4">
        <div class="d-flex flex-wrap gap-3 justify-content-between align-items-center">
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-primary-custom">All</button>
                <button class="btn btn-sm btn-outline-primary-custom">Upcoming</button>
                <button class="btn btn-sm btn-outline-primary-custom">Past</button>
                <button class="btn btn-sm btn-outline-primary-custom">Cancelled</button>
            </div>
            <div class="input-group" style="max-width:260px;">
                <span class="input-group-text bg-transparent"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" placeholder="Search tickets..."
                    style="border-radius:0 var(--radius-full) var(--radius-full) 0;">
            </div>
        </div>
    </div>

    <!-- TICKETS TABLE -->
    <div class="dashboard-card">
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Event</th>
                        <th>Date</th>
                        <th>Ticket Type</th>
                        <th>Status</th>
                        <th>QR</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=100"
                                    style="width:40px;height:40px;border-radius:var(--radius-sm);object-fit:cover;"
                                    alt="">
                                <div><strong style="font-size:0.9rem;">Summer Music Festival</strong>
                                    <div class="text-muted" style="font-size:0.75rem;">Central Park, NYC</div>
                                </div>
                            </div>
                        </td>
                        <td>Mar 15, 2026</td>
                        <td><span class="section-badge mb-0" style="font-size:0.7rem;">General</span></td>
                        <td><span class="status-badge active">Active</span></td>
                        <td><button class="action-btn" title="View QR"><i class="bi bi-qr-code"></i></button></td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="user-ticket-details.html" class="action-btn" title="View"><i
                                        class="bi bi-eye"></i></a>
                                <button class="action-btn" title="Download"><i class="bi bi-download"></i></button>
                                <button class="action-btn danger" title="Request Refund"><i
                                        class="bi bi-arrow-counterclockwise"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=100"
                                    style="width:40px;height:40px;border-radius:var(--radius-sm);object-fit:cover;"
                                    alt="">
                                <div><strong style="font-size:0.9rem;">Tech Innovation Summit</strong>
                                    <div class="text-muted" style="font-size:0.75rem;">Convention Center, SF</div>
                                </div>
                            </div>
                        </td>
                        <td>Apr 10, 2026</td>
                        <td><span class="section-badge mb-0"
                                style="font-size:0.7rem;background:rgba(232,168,56,0.15);color:var(--accent);">VIP</span>
                        </td>
                        <td><span class="status-badge active">Active</span></td>
                        <td><button class="action-btn" title="View QR"><i class="bi bi-qr-code"></i></button></td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="user-ticket-details.html" class="action-btn" title="View"><i
                                        class="bi bi-eye"></i></a>
                                <button class="action-btn" title="Download"><i class="bi bi-download"></i></button>
                                <button class="action-btn danger" title="Request Refund"><i
                                        class="bi bi-arrow-counterclockwise"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=100"
                                    style="width:40px;height:40px;border-radius:var(--radius-sm);object-fit:cover;"
                                    alt="">
                                <div><strong style="font-size:0.9rem;">Design Masterclass</strong>
                                    <div class="text-muted" style="font-size:0.75rem;">Art Studio, London</div>
                                </div>
                            </div>
                        </td>
                        <td>Mar 22, 2026</td>
                        <td><span class="section-badge mb-0" style="font-size:0.7rem;">Premium</span></td>
                        <td><span class="status-badge active">Active</span></td>
                        <td><button class="action-btn" title="View QR"><i class="bi bi-qr-code"></i></button></td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="user-ticket-details.html" class="action-btn" title="View"><i
                                        class="bi bi-eye"></i></a>
                                <button class="action-btn" title="Download"><i class="bi bi-download"></i></button>
                                <button class="action-btn danger" title="Request Refund"><i
                                        class="bi bi-arrow-counterclockwise"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?w=100"
                                    style="width:40px;height:40px;border-radius:var(--radius-sm);object-fit:cover;"
                                    alt="">
                                <div><strong style="font-size:0.9rem;">Jazz Night Live</strong>
                                    <div class="text-muted" style="font-size:0.75rem;">Blue Note, NYC</div>
                                </div>
                            </div>
                        </td>
                        <td>Feb 22, 2026</td>
                        <td><span class="section-badge mb-0" style="font-size:0.7rem;">General</span></td>
                        <td><span class="status-badge completed">Attended</span></td>
                        <td><button class="action-btn" title="View QR"><i class="bi bi-qr-code"></i></button></td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="user-ticket-details.html" class="action-btn" title="View"><i
                                        class="bi bi-eye"></i></a>
                                <button class="action-btn" title="Download"><i class="bi bi-download"></i></button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=100"
                                    style="width:40px;height:40px;border-radius:var(--radius-sm);object-fit:cover;"
                                    alt="">
                                <div><strong style="font-size:0.9rem;">Digital Marketing 101</strong>
                                    <div class="text-muted" style="font-size:0.75rem;">Hub, Toronto</div>
                                </div>
                            </div>
                        </td>
                        <td>Jan 15, 2026</td>
                        <td><span class="section-badge mb-0" style="font-size:0.7rem;">General</span></td>
                        <td><span class="status-badge refunded">Refunded</span></td>
                        <td><button class="action-btn" title="View QR" disabled style="opacity:0.3;"><i
                                    class="bi bi-qr-code"></i></button></td>
                        <td>
                            <div class="d-flex gap-1">
                                <a href="user-ticket-details.html" class="action-btn" title="View"><i
                                        class="bi bi-eye"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
