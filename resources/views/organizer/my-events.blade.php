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

        
    </div>
</div>

@endsection
