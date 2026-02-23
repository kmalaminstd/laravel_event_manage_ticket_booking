@extends('components.user-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Refund Request</h5>
            <p>Submit a refund for your tickets</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="topbar-icon"><i class="bi bi-bell"></i><span class="badge-dot"></span></button>
    </div>
</div>

<div class="dashboard-content">
    <div class="row g-4">
        <div class="col-lg-7">
            <div class="form-card">
                <h5 class="mb-4"><i class="bi bi-arrow-counterclockwise me-2" style="color:var(--accent);"></i>New
                    Refund Request</h5>
                <form>
                    <div class="mb-3">
                        <label class="form-label">Select Ticket</label>
                        <select class="form-select">
                            <option>Choose a ticket...</option>
                            <option>Summer Music Festival — General Admission — $49.00</option>
                            <option>Tech Innovation Summit — VIP — $129.00</option>
                            <option>Design Masterclass — Premium — $35.00</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Reason for Refund</label>
                        <select class="form-select">
                            <option>Select a reason...</option>
                            <option>Cannot attend the event</option>
                            <option>Duplicate purchase</option>
                            <option>Event was cancelled</option>
                            <option>Health/emergency reasons</option>
                            <option>Unsatisfied with the event</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Additional Details</label>
                        <textarea class="form-control" rows="5"
                            placeholder="Please provide more details about your refund request..."></textarea>
                    </div>
                    <div class="p-3 rounded mb-4"
                        style="background:rgba(232,168,56,0.1);border-left:4px solid var(--accent);">
                        <strong style="font-size:0.9rem;"><i class="bi bi-exclamation-triangle me-2"></i>Refund
                            Policy</strong>
                        <ul class="mb-0 mt-2" style="font-size:0.85rem;color:var(--text-secondary);">
                            <li>Refunds are processed within 5–7 business days</li>
                            <li>A 10% processing fee may apply</li>
                            <li>Requests must be made 48 hours before the event</li>
                            <li>Non-refundable tickets are exempt from this policy</li>
                        </ul>
                    </div>
                    <button type="submit" class="btn btn-primary-custom py-2">
                        <i class="bi bi-send me-2"></i>Submit Refund Request
                    </button>
                </form>
            </div>
        </div>

        <!-- REFUND HISTORY -->
        <div class="col-lg-5">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Refund History</h5>
                </div>
                <div class="d-flex flex-column gap-3">
                    <div class="p-3 rounded border">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <strong style="font-size:0.9rem;">Digital Marketing 101</strong>
                            <span class="status-badge refunded">Refunded</span>
                        </div>
                        <div class="text-muted" style="font-size:0.8rem;">Requested: Jan 10, 2026</div>
                        <div class="text-muted" style="font-size:0.8rem;">Amount: <strong
                                style="color:var(--success);">$20.00</strong></div>
                        <div class="text-muted" style="font-size:0.8rem;">Reason: Cannot attend</div>
                    </div>
                    <div class="p-3 rounded border">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <strong style="font-size:0.9rem;">Photography Workshop</strong>
                            <span class="status-badge pending">Pending</span>
                        </div>
                        <div class="text-muted" style="font-size:0.8rem;">Requested: Feb 15, 2026</div>
                        <div class="text-muted" style="font-size:0.8rem;">Amount: <strong>$55.00</strong></div>
                        <div class="text-muted" style="font-size:0.8rem;">Reason: Health reasons</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
