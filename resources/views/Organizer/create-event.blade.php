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

<x-forms.form id="create_new_event_form" method="POST" action="/organizer/event/create" enctype="multipart/form-data">
    <div class="dashboard-content">
        <div class="row g-4">
            <div class="col-lg-8">
                <!-- BASIC INFO -->
                <div class="form-card mb-4">
                    <h5 class="mb-3"><i class="bi bi-info-circle me-2" style="color:var(--accent);"></i>Basic Information
                    </h5>
                    <div class="mb-3">
                        <label class="form-label">Event Title</label>
                        <input type="text" name="name" class="form-control" placeholder="e.g. Summer Music Festival 2026">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="5" placeholder="Describe your event in detail..."></textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select">
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
                            <input name="start_date" type="datetime-local" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">End Date & Time</label>
                            <input name="end_date" type="datetime-local" class="form-control">
                        </div>
                    </div>
                </div>
    
                <!-- LOCATION -->
                <div class="form-card mb-4">
                    <h5 class="mb-3"><i class="bi bi-geo-alt me-2" style="color:var(--accent);"></i>Location</h5>
                    <div class="mb-3">
                        <label class="form-label">Event Type</label>
                        <div class="toggle-group" style="max-width:300px;">
                            <input name="event_type" class="nev_event_type" value="physical" hidden>
                            <button type="button" value="physical" class="toggle-btn active nev_event_type_btn">Physical</button>
                            <button type="button" value="online" class="toggle-btn nev_event_type_btn">Online</button>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Venue Name</label>
                            <input type="text" name="venue" class="form-control" placeholder="e.g. Central Park Great Lawn">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Full address">
                        </div>
                    </div>
                </div>
    
                <!-- BANNER -->
                <div class="form-card mb-4">
                    <h5 class="mb-3"><i class="bi bi-image me-2" style="color:var(--accent);"></i>Event Banner</h5>
                    <div class="border-2 border-dashed rounded p-5 text-center"
                        style="border:2px dashed var(--border-color);cursor:pointer;">
                        <input id="media" name="media" type="file" accept="image/*" hidden>
                        <label for="media">
                            <i class="bi bi-cloud-arrow-up" style="font-size:2.5rem;color:var(--text-light);"></i>
                            <p class="text-muted mt-2 mb-0">Drag & drop your banner image here or <span style="color:var(--primary);font-weight:600;">browse</span></p>
                            <small class="text-muted">Recommended: 1200×600px, JPG or PNG, max 5MB</small>
                        </label>
                    </div>
                </div>

                <!-- EVENT SCHEDULE -->
                <div class="form-card mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0"><i class="bi bi-clock-fill me-2" style="color:var(--accent);"></i>Event Schedule</h5>
                        <button type="button" class="btn btn-sm btn-primary-custom" id="addScheduleTierBtn"><i class="bi bi-plus me-1"></i> Add Schedule</button>
                    </div>
                    <div id="scheduleTierContainer">
                        <div class="event-schedule-tier-row" id="tier-1">
                            <button type="button" class="remove-tier" onclick="this.closest('.event-schedule-tier-row').remove()"><i class="bi bi-x"></i></button>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Title</label>
                                    <input type="text" name="schedule[1][title]" class="form-control" value="Gates Open">
                                    </div>
                                <div class="col-md-3">
                                    <label class="form-label">Time</label>
                                    <input type="time" name="schedule[1][time]" class="form-control">
                                </div>
                                
                                <div class="col-md-6">
                                    <label class="form-label">Description</label>
                                    <input type="text" class="form-control" name="schedule[1][description]" value="Welcome drinks & registration">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- TICKET TIERS -->
                <div class="form-card mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0"><i class="bi bi-ticket-perforated me-2" style="color:var(--accent);"></i>Ticket Tiers</h5>
                        <button type="button" class="btn btn-sm btn-primary-custom" id="addTierBtn"><i class="bi bi-plus me-1"></i> Add Tier</button>
                    </div>
                    <div id="tierContainer">

                        <div class="ticket-tier-row" id="tier-1">
                            <button type="button" class="remove-tier" onclick="this.closest('.ticket-tier-row').remove()"><i class="bi bi-x"></i></button>
                            <div class="row g-3">
                                <div class="col-md-3">
                                    <label class="form-label">Tier Name</label>
                                    <input type="text" name="ticket[1][name]" class="form-control" value="VIP">
                                    </div>
                                <div class="col-md-2">
                                    <label class="form-label">Price ($)</label>
                                    <input type="number" name="ticket[1][price]" class="form-control" value="199">
                                </div>
                                <div class="col-md-2">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" name="ticket[1][quantity]" class="form-control" value="50">
                                </div>
                                <div class="col-md-5">
                                    <label class="form-label">Description</label>
                                    <input type="text" name="ticket[1][description]" class="form-control" value="VIP lounge, backstage access, free parking">
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <!-- FAQ TIERS -->
                <div class="form-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0"><i class="bi bi-ticket-perforated me-2" style="color:var(--accent);"></i>FAQ</h5>
                        <button type="button" class="btn btn-sm btn-primary-custom" id="addFAQTierBtn"><i class="bi bi-plus me-1"></i> Add FAQ</button>
                    </div>
                    <div id="faqTierContainer">
                        <div class="faq-tier-row" id="tier-1">
                            <button type="button" class="remove-tier" onclick="this.closest('.faq-tier-row').remove()"><i class="bi bi-x"></i></button>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label">Question:</label>
                                    <input type="text" name="faq[1][question]" class="form-control">
                                    </div>
                                <div class="col-12">
                                    <label class="form-label">Answer</label>
                                    <input type="text" name="faq[1][answer]" class="form-control">
                                </div>
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
                        <button class="btn btn-primary-custom py-2" name="act_btn" value="publish"><i class="bi bi-send me-2"></i>Publish Event</button>
                        <button class="btn btn-outline-primary-custom py-2" name="act_btn"  value="draft"><i class="bi bi-save me-2"></i>Save as
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
</x-forms.form>


@endsection
