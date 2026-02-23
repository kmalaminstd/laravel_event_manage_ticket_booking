@extends('components.organizer-layout')

@section('content')


<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Edit Event</h5>
            <p>Summer Music Festival 2026</p>
        </div>
    </div>
    <div class="topbar-right">
        <a href="organizer-my-events.html" class="btn btn-sm btn-outline-primary-custom"><i
                class="bi bi-arrow-left me-1"></i> Back</a>
        <button class="btn btn-sm btn-primary-custom"><i class="bi bi-eye me-1"></i> Preview</button>
    </div>
</div>

<div class="dashboard-content">
    <div class="row g-4">
        <div class="col-lg-8">
            <!-- BASIC INFO (Prefilled) -->
            <div class="form-card mb-4">
                <h5 class="mb-3"><i class="bi bi-info-circle me-2" style="color:var(--accent);"></i>Basic Information
                </h5>
                <div class="mb-3">
                    <label class="form-label">Event Title</label>
                    <input type="text" class="form-control" value="Summer Music Festival 2026">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control"
                        rows="5">Join us for the most anticipated music event of the year! The Summer Music Festival 2026 brings together world-class artists, emerging talents, and music lovers for an unforgettable experience in the heart of Central Park.</textarea>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Category</label>
                        <select class="form-select">
                            <option>Concert</option>
                            <option>Workshop</option>
                            <option>Seminar</option>
                            <option>Conference</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tags</label>
                        <input type="text" class="form-control" value="music, live, outdoor, festival">
                    </div>
                </div>
            </div>

            <!-- DATE & TIME (Prefilled) -->
            <div class="form-card mb-4">
                <h5 class="mb-3"><i class="bi bi-calendar3 me-2" style="color:var(--accent);"></i>Date & Time</h5>
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">Start Date & Time</label><input
                            type="datetime-local" class="form-control" value="2026-03-15T18:00"></div>
                    <div class="col-md-6"><label class="form-label">End Date & Time</label><input type="datetime-local"
                            class="form-control" value="2026-03-15T23:00"></div>
                </div>
            </div>

            <!-- LOCATION (Prefilled) -->
            <div class="form-card mb-4">
                <h5 class="mb-3"><i class="bi bi-geo-alt me-2" style="color:var(--accent);"></i>Location</h5>
                <div class="mb-3">
                    <label class="form-label">Event Type</label>
                    <div class="toggle-group" style="max-width:300px;"><button type="button"
                            class="toggle-btn active">Physical</button><button type="button"
                            class="toggle-btn">Online</button></div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6"><label class="form-label">Venue Name</label><input type="text"
                            class="form-control" value="Central Park Great Lawn"></div>
                    <div class="col-md-6"><label class="form-label">Address</label><input type="text"
                            class="form-control" value="Central Park, New York, NY 10024"></div>
                </div>
            </div>

            <!-- BANNER (Prefilled) -->
            <div class="form-card mb-4">
                <h5 class="mb-3"><i class="bi bi-image me-2" style="color:var(--accent);"></i>Event Banner</h5>
                <div class="position-relative mb-3">
                    <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=800" alt="Current banner"
                        style="width:100%;height:200px;object-fit:cover;border-radius:var(--radius-sm);">
                    <button class="btn btn-sm btn-danger position-absolute" style="top:10px;right:10px;"><i
                            class="bi bi-trash"></i></button>
                </div>
                <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-upload me-1"></i> Replace
                    Banner</button>
            </div>

            <!-- TICKET TIERS (Prefilled) -->
            <div class="form-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0"><i class="bi bi-ticket-perforated me-2" style="color:var(--accent);"></i>Ticket
                        Tiers</h5>
                    <button type="button" class="btn btn-sm btn-primary-custom" id="addTierBtn"><i
                            class="bi bi-plus me-1"></i> Add Tier</button>
                </div>
                <div id="tierContainer">
                    <div class="ticket-tier-row">
                        <button type="button" class="remove-tier" onclick="this.closest('.ticket-tier-row').remove()"><i
                                class="bi bi-x"></i></button>
                        <div class="row g-3">
                            <div class="col-md-3"><label class="form-label">Tier Name</label><input type="text"
                                    class="form-control" value="General Admission"></div>
                            <div class="col-md-2"><label class="form-label">Price ($)</label><input type="number"
                                    class="form-control" value="49"></div>
                            <div class="col-md-2"><label class="form-label">Quantity</label><input type="number"
                                    class="form-control" value="500"></div>
                            <div class="col-md-5"><label class="form-label">Description</label><input type="text"
                                    class="form-control" value="Access to all stages, standing area"></div>
                        </div>
                    </div>
                    <div class="ticket-tier-row">
                        <button type="button" class="remove-tier" onclick="this.closest('.ticket-tier-row').remove()"><i
                                class="bi bi-x"></i></button>
                        <div class="row g-3">
                            <div class="col-md-3"><label class="form-label">Tier Name</label><input type="text"
                                    class="form-control" value="Premium"></div>
                            <div class="col-md-2"><label class="form-label">Price ($)</label><input type="number"
                                    class="form-control" value="99"></div>
                            <div class="col-md-2"><label class="form-label">Quantity</label><input type="number"
                                    class="form-control" value="200"></div>
                            <div class="col-md-5"><label class="form-label">Description</label><input type="text"
                                    class="form-control" value="Front section + free drink"></div>
                        </div>
                    </div>
                    <div class="ticket-tier-row">
                        <button type="button" class="remove-tier" onclick="this.closest('.ticket-tier-row').remove()"><i
                                class="bi bi-x"></i></button>
                        <div class="row g-3">
                            <div class="col-md-3"><label class="form-label">Tier Name</label><input type="text"
                                    class="form-control" value="VIP"></div>
                            <div class="col-md-2"><label class="form-label">Price ($)</label><input type="number"
                                    class="form-control" value="199"></div>
                            <div class="col-md-2"><label class="form-label">Quantity</label><input type="number"
                                    class="form-control" value="50"></div>
                            <div class="col-md-5"><label class="form-label">Description</label><input type="text"
                                    class="form-control" value="VIP lounge, backstage, free parking"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDEBAR -->
        <div class="col-lg-4">
            <div class="ticket-card">
                <h5 class="mb-3">Update Event</h5>
                <div class="d-flex flex-column gap-2">
                    <button class="btn btn-primary-custom py-2"><i class="bi bi-check-lg me-2"></i>Update &
                        Publish</button>
                    <button class="btn btn-outline-primary-custom py-2"><i class="bi bi-save me-2"></i>Save as
                        Draft</button>
                    <button class="btn btn-outline-danger py-2"><i class="bi bi-trash me-2"></i>Delete Event</button>
                </div>
            </div>
            <div class="dashboard-card mt-3">
                <h5 class="mb-3">Event Stats</h5>
                <div class="d-flex justify-content-between py-2 border-bottom"><span
                        class="text-muted">Status</span><span class="status-badge active">Active</span></div>
                <div class="d-flex justify-content-between py-2 border-bottom"><span class="text-muted">Tickets
                        Sold</span><strong>320</strong></div>
                <div class="d-flex justify-content-between py-2 border-bottom"><span
                        class="text-muted">Revenue</span><strong style="color:var(--primary);">$15,680</strong></div>
                <div class="d-flex justify-content-between py-2"><span
                        class="text-muted">Views</span><strong>4,520</strong></div>
            </div>
        </div>
    </div>
</div>

@endsection
