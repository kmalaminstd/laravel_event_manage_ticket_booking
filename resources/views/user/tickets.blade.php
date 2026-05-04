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

                    @forelse ($orders as $order)
                        <tr>
                            <td>
                                <div class="d-flex align-items-center gap-2">
                                    <img src="{{ asset('/storage/'. $order->event->media->src) }}" style="width:40px;height:40px;border-radius:var(--radius-sm);object-fit:cover;" alt="">
                                    <div><strong style="font-size:0.9rem;">{{ $order->event->name }}</strong>
                                        <div class="text-muted" style="font-size:0.75rem;">{{ $order->event->address }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $order->event->start_date->format('d M, Y') }}</td>
                            <td><span class="section-badge mb-0" style="font-size:0.7rem;">{{ $order->ticket->name }}</span></td>
                            <td><span class="status-badge active">{{ $order->status }}</span></td>
                            <td><button class="action-btn" title="View QR"><i class="bi bi-qr-code"></i></button></td>
                            <td>
                                <div class="d-flex gap-1">
                                    <a href="/user/ticket/{{ $order->id }}" class="action-btn" title="View"><i class="bi bi-eye"></i></a>
                                    <button class="action-btn" title="Download"><i class="bi bi-download"></i></button>
                                    <button class="action-btn danger" title="Request Refund"><i class="bi bi-arrow-counterclockwise"></i></button>
                                </div>
                            </td>
                        </tr>                        
                    @empty
                        <h3>No tickets found</h3>
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
