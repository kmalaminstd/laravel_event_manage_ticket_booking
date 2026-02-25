@extends('components.organizer-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>My Events</h5>
            <p>Manage your event portfolio</p>
        </div>
    </div>
    <div class="topbar-right">
        <a href="organizer-create-event.html" class="btn btn-sm btn-primary-custom"><i class="bi bi-plus me-1"></i> New
            Event</a>
    </div>
</div>

<div class="dashboard-content">
    <!-- FILTER -->
    <div class="dashboard-card mb-4">
        <div class="d-flex flex-wrap gap-2 justify-content-between align-items-center">
            <div class="d-flex gap-2">
                <button class="btn btn-sm btn-primary-custom">All (8)</button>
                <button class="btn btn-sm btn-outline-primary-custom">Active (5)</button>
                <button class="btn btn-sm btn-outline-primary-custom">Draft (2)</button>
                <button class="btn btn-sm btn-outline-primary-custom">Past (1)</button>
            </div>
            <div class="input-group" style="max-width:260px;">
                <span class="input-group-text bg-transparent"><i class="bi bi-search"></i></span>
                <input type="text" class="form-control" placeholder="Search events...">
            </div>
        </div>
    </div>

    <!-- EVENT CARDS GRID -->
    <div class="row g-4">
        @foreach ($events as $event)
            <div class="col-md-6 col-xl-4">
                <x-cards.organizer-event-card :event="$event" />
            </div>
        @endforeach

        <div class="col-md-6 col-xl-4">
            <div class="org-event-card">
                <div class="card-banner"><img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600"
                        alt="Event"></div>
                <div class="card-content">
                    <span class="status-badge active event-status">Active</span>
                    <h5>Tech Innovation Summit 2026</h5>
                    <div class="event-stats">
                        <span><i class="bi bi-ticket-perforated"></i> 580 sold</span>
                        <span><i class="bi bi-currency-dollar"></i> $74,820</span>
                    </div>
                    <div class="d-flex gap-2 mt-3">
                        <a href="organizer-edit-event.html" class="btn btn-sm btn-outline-primary-custom flex-fill"><i
                                class="bi bi-pencil me-1"></i> Edit</a>
                        <a href="organizer-attendees.html" class="btn btn-sm btn-primary-custom flex-fill"><i
                                class="bi bi-people me-1"></i> Attendees</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="org-event-card">
                <div class="card-banner"><img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=600"
                        alt="Event"></div>
                <div class="card-content">
                    <span class="status-badge active event-status">Active</span>
                    <h5>Creative Design Masterclass</h5>
                    <div class="event-stats">
                        <span><i class="bi bi-ticket-perforated"></i> 45 sold</span>
                        <span><i class="bi bi-currency-dollar"></i> $1,575</span>
                    </div>
                    <div class="d-flex gap-2 mt-3">
                        <a href="organizer-edit-event.html" class="btn btn-sm btn-outline-primary-custom flex-fill"><i
                                class="bi bi-pencil me-1"></i> Edit</a>
                        <a href="organizer-attendees.html" class="btn btn-sm btn-primary-custom flex-fill"><i
                                class="bi bi-people me-1"></i> Attendees</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="org-event-card">
                <div class="card-banner"><img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=600"
                        alt="Event"></div>
                <div class="card-content">
                    <span class="status-badge draft event-status">Draft</span>
                    <h5>AI & Future of Work Forum</h5>
                    <div class="event-stats">
                        <span><i class="bi bi-ticket-perforated"></i> 0 sold</span>
                        <span><i class="bi bi-currency-dollar"></i> $0</span>
                    </div>
                    <div class="d-flex gap-2 mt-3">
                        <a href="organizer-edit-event.html" class="btn btn-sm btn-outline-primary-custom flex-fill"><i
                                class="bi bi-pencil me-1"></i> Edit</a>
                        <button class="btn btn-sm btn-accent flex-fill"><i class="bi bi-send me-1"></i> Publish</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="org-event-card">
                <div class="card-banner"><img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=600" alt="Event"></div>
                <div class="card-content">
                    <span class="status-badge active event-status">Active</span>
                    <h5>International Food & Culture Fest</h5>
                    <div class="event-stats">
                        <span><i class="bi bi-ticket-perforated"></i> 210 sold</span>
                        <span><i class="bi bi-currency-dollar"></i> $15,750</span>
                    </div>
                    <div class="d-flex gap-2 mt-3">
                        <a href="organizer-edit-event.html" class="btn btn-sm btn-outline-primary-custom flex-fill"><i class="bi bi-pencil me-1"></i> Edit</a>
                        <a href="organizer-attendees.html" class="btn btn-sm btn-primary-custom flex-fill"><i  class="bi bi-people me-1"></i> Attendees</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-4">
            <div class="org-event-card">
                <div class="card-banner"><img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?w=600"
                        alt="Event"></div>
                <div class="card-content">
                    <span class="status-badge completed event-status">Completed</span>
                    <h5>Jazz Night Live</h5>
                    <div class="event-stats">
                        <span><i class="bi bi-ticket-perforated"></i> 180 sold</span>
                        <span><i class="bi bi-currency-dollar"></i> $5,400</span>
                    </div>
                    <div class="d-flex gap-2 mt-3">
                        <a href="organizer-analytics.html" class="btn btn-sm btn-outline-primary-custom flex-fill"><i class="bi bi-bar-chart me-1"></i> Analytics </a>

                        <a href="organizer-attendees.html" class="btn btn-sm btn-primary-custom flex-fill"><i
                                class="bi bi-people me-1"></i> Attendees</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
