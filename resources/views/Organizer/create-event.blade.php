@extends('components.organizer-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Create Event</h5>
            <p>Fill in the details to publish your event</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-eye me-1"></i> Preview</button>
    </div>
</div>

<div class="dashboard-content">
    <div class="row g-4">
        <div class="col-lg-8">
            <!-- BASIC INFO -->
            <div class="form-card mb-4">
                <h5 class="mb-3"><i class="bi bi-info-circle me-2" style="color:var(--accent);"></i>Basic Information
                </h5>
                <div class="mb-3">
                    <label class="form-label">Event Title</label>
                    <input type="text" class="form-control" placeholder="e.g. Summer Music Festival 2026">
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" rows="5" placeholder="Describe your event in detail..."></textarea>
                </div>
                <div class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Category</label>
                        <select class="form-select">
                            <option>Select category...</option>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- DATE & TIME -->
            <div class="form-card mb-4">
                <h5 class="mb-3"><i class="bi bi-calendar3 me-2" style="color:var(--accent);"></i>Date & Time</h5>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Start Date & Time</label>
                        <input type="datetime-local" class="form-control">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">End Date & Time</label>
                        <input type="datetime-local" class="form-control">
                    </div>
                </div>
            </div>

            <!-- LOCATION -->
            <div class="form-card mb-4">
                <h5 class="mb-3"><i class="bi bi-geo-alt me-2" style="color:var(--accent);"></i>Location</h5>
                <div class="mb-3">
                    <label class="form-label">Event Type</label>
                    <div class="toggle-group" style="max-width:300px;">
                        <button type="button" class="toggle-btn active">Physical</button>
                        <button type="button" class="toggle-btn">Online</button>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Venue Name</label>
                        <input type="text" class="form-control" placeholder="e.g. Central Park Great Lawn">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Address</label>
                        <input type="text" class="form-control" placeholder="Full address">
                    </div>
                </div>
            </div>

            <!-- BANNER -->
            <div class="form-card mb-4">
                <h5 class="mb-3"><i class="bi bi-image me-2" style="color:var(--accent);"></i>Event Banner</h5>
                <div class="border-2 border-dashed rounded p-5 text-center"
                    style="border:2px dashed var(--border-color);cursor:pointer;">
                    <i class="bi bi-cloud-arrow-up" style="font-size:2.5rem;color:var(--text-light);"></i>
                    <p class="text-muted mt-2 mb-0">Drag & drop your banner image here or <span
                            style="color:var(--primary);font-weight:600;">browse</span></p>
                    <small class="text-muted">Recommended: 1200×600px, JPG or PNG, max 5MB</small>
                </div>
            </div>

            <!-- TICKET TIERS -->
            <div class="form-card">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="mb-0"><i class="bi bi-ticket-perforated me-2" style="color:var(--accent);"></i>Ticket
                        Tiers</h5>
                    <button type="button" class="btn btn-sm btn-primary-custom" id="addTierBtn"><i
                            class="bi bi-plus me-1"></i> Add Tier</button>
                </div>
                <div id="tierContainer">
                    <div class="ticket-tier-row" id="tier-1">
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
                    <div class="ticket-tier-row" id="tier-2">
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
                                    class="form-control" value="VIP lounge, backstage access, free parking"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SIDEBAR ACTIONS -->
        <div class="col-lg-4">
            <div class="ticket-card">
                <h5 class="mb-3">Publish</h5>
                <div class="d-flex flex-column gap-2">
                    <button class="btn btn-primary-custom py-2"><i class="bi bi-send me-2"></i>Publish Event</button>
                    <button class="btn btn-outline-primary-custom py-2"><i class="bi bi-save me-2"></i>Save as
                        Draft</button>
                </div>
                <hr>
                <div class="text-muted" style="font-size:0.85rem;">
                    <p class="mb-2"><i class="bi bi-info-circle me-1"></i> Your event will be reviewed before going
                        live.</p>
                    <p class="mb-0"><i class="bi bi-clock me-1"></i> Review takes 24–48 hours.</p>
                </div>
            </div>

            <div class="dashboard-card mt-3">
                <h5 class="mb-3">Tips</h5>
                <div class="d-flex flex-column gap-2" style="font-size:0.85rem;">
                    <div class="d-flex gap-2"><i class="bi bi-check-circle text-success"></i><span>Add a compelling
                            banner image</span></div>
                    <div class="d-flex gap-2"><i class="bi bi-check-circle text-success"></i><span>Write a detailed
                            description</span></div>
                    <div class="d-flex gap-2"><i class="bi bi-check-circle text-success"></i><span>Set competitive
                            ticket prices</span></div>
                    <div class="d-flex gap-2"><i class="bi bi-check-circle text-success"></i><span>Add relevant tags for
                            visibility</span></div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
