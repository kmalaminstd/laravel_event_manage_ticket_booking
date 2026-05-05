@extends('components.user-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Ticket Details</h5>
            <p>Order {{ $order->order_code }}</p>
        </div>
    </div>
    <div class="topbar-right">
        <a href="/user/tickets" class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-arrow-left me-1"></i>
            Back</a>
    </div>
</div>

<div class="dashboard-content">
    <div class="row g-4">
        <!-- EVENT INFO -->
        <div class="col-lg-7">
            <div class="dashboard-card">
                <div class="d-flex gap-3 align-items-start mb-4">
                    <img src="{{ asset('/storage/'. $order->event->media->src) }}" alt="Event" style="width:100px;height:100px;border-radius:var(--radius-md);object-fit:cover;">
                    <div>
                        <span class="status-badge active mb-2">Active</span>
                        <h4 class="mb-1">{{ $order->event->name }}</h4>
                        <p class="text-muted mb-0" style="font-size:0.9rem;">Organized by {{ $order->event->user->name }}</p>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-sm-6">
                        <div class="p-3 rounded" style="background:var(--light-bg);">
                            <div class="text-muted" style="font-size:0.8rem;"><i class="bi bi-calendar3 me-1"></i> Date & Time</div>
                            <strong>{{ $order->event->start_date->format('d M, Y') }}</strong>
                            @if ($order->event->end_date)
                                <strong>
                                    {{ "to ". $order->event->end_date }}
                                </strong>                              
                            @endif
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="p-3 rounded" style="background:var(--light-bg);">
                            <div class="text-muted" style="font-size:0.8rem;"><i class="bi bi-geo-alt me-1"></i>
                                venu</div>
                            <strong>{{ $order->event->venue }}</strong>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="p-3 rounded" style="background:var(--light-bg);">
                            <div class="text-muted" style="font-size:0.8rem;"><i class="bi bi-ticket-perforated me-1"></i> Ticket Type</div>
                            <strong>{{ $order->ticket->name }}</strong>
                        </div>
                    </div>
                    
                </div>
            </div>

            <!-- ORDER DETAILS -->
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Order Details</h5>
                </div>
                <div class="d-flex justify-content-between py-2"><span class="text-muted">Order
                        ID</span>
                        <strong>{{ $order->order_code }}</strong></div>
                <div class="d-flex justify-content-between py-2"><span class="text-muted">Purchase Date</span><span>{{ $order->created_at->format('d M, Y') }}</span></div>
                <div class="d-flex justify-content-between py-2"><span class="text-muted">Ticket
                        Price</span>
                        <span>$ {{ $order->ticket->price }}</span></div>
                <div class="d-flex justify-content-between py-2"><span class="text-muted">Quantity</span><span> {{ $order->quantity }} </span></div>
                
                <hr>
                <div class="d-flex justify-content-between py-2"><strong>Total Paid</strong><strong style="color:var(--primary);font-size:1.15rem;">$ {{ $order->ticket->price * $order->quantity }}</strong></div>
            </div>
        </div>

        <!-- QR CODE & ACTIONS -->
        <div class="col-lg-5">
            <div class="dashboard-card text-center">
                <h5 class="mb-3">Your QR Ticket</h5>
                <div class="mx-auto">
                    
                </div>
                <p class="mt-3 text-muted" style="font-size:0.85rem;">Show this QR code at the venue entrance for
                    check-in.</p>
                <div class="d-flex flex-column gap-2 mt-3">
                    <a href="/user/ticket/{{ $order->ticket->id }}/{{ $order->id }}/download" class="btn btn-primary-custom"><i class="bi bi-download me-2"></i>Download Ticket</a>
                    <button class="btn btn-accent"><i class="bi bi-printer me-2"></i>Print Ticket</button>
                </div>
            </div>

            <div class="dashboard-card mt-3">
                <h5 class="mb-3">Need Help?</h5>
                <a href="user-refund-request.html" class="btn btn-outline-primary-custom w-100 mb-2">
                    <i class="bi bi-arrow-counterclockwise me-2"></i>Request Refund
                </a>
                <button class="btn btn-outline-primary-custom w-100">
                    <i class="bi bi-headset me-2"></i>Contact Support
                </button>
                <p class="text-muted mt-2" style="font-size:0.8rem;">
                    <i class="bi bi-info-circle me-1"></i> Refunds are available up to 48 hours before the event.
                </p>
            </div>
        </div>
    </div>
</div>

@endsection
