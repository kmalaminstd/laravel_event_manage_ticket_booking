@extends('components.organizer-layout')

@section('content')


<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Edit Event</h5>
            <p>{{ $event->name }}</p>
        </div>
    </div>
    <div class="topbar-right">
        <a href="/organizer/my-events" class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-arrow-left me-1"></i> Back </a>
        {{-- <button class="btn btn-sm btn-primary-custom"><i class="bi bi-eye me-1"></i> Preview</button> --}}
    </div>
</div>

<div class="dashboard-content">
    <div class="row g-4">
        <div class="col-lg-8">
            <x-forms.form method="POST" enctype="multipart/form-data" action="/organizer/event/{{ $event->id }}/update">
                @method("PATCH")
                <!-- BASIC INFO (Prefilled) -->
                <div class="form-card mb-4">
                    <h5 class="mb-3"><i class="bi bi-info-circle me-2" style="color:var(--accent);"></i>Basic Information
                    </h5>
                    <div class="mb-3">
                        <label class="form-label">Event Title</label>
                        <input type="text" name="name" class="form-control" value="{{ $event->name }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="description"
                            rows="5">{{ $event->description }}</textarea>
                    </div>
                    <div class="row g-3">
                        <div class="col-12">
                            <label class="form-label">Category</label>
                            <select class="form-select" name="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}" {{ $category->id === $event->category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
    
                <!-- DATE & TIME (Prefilled) -->
                <div class="form-card mb-4">
                    <h5 class="mb-3"><i class="bi bi-calendar3 me-2" style="color:var(--accent);"></i>Date & Time</h5>
                    <div class="row g-3">
                        <div class="col-md-6"><label class="form-label">Start Date & Time</label><input value="{{ $event->start_date }}"  type="date" class="form-control" name="start_date"></div>
                        <div class="col-md-6"><label class="form-label">End Date & Time</label><input type="date" name="end_date" class="form-control" value="{{ $event->end_date }}"></div>
                    </div>
                </div>
    
                <!-- LOCATION -->
                <div class="form-card mb-4">
                        <h5 class="mb-3"><i class="bi bi-geo-alt me-2" style="color:var(--accent);"></i>Location</h5>
                        <div class="mb-3">
                            <label class="form-label">Event Type</label>
                            <div class="toggle-group" style="max-width:300px;">
                                <input name="event_type" class="nev_event_type" value="{{ $event->event_type }}" hidden>
                                <button type="button" value="physical" class="toggle-btn {{ $event->event_type === "physical" ? 'active' : "" }} nev_event_type_btn">Physical</button>
                                <button type="button" value="online" class="toggle-btn {{ $event->event_type === "online" ? 'active' : "" }} nev_event_type_btn">Online</button>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Venue Name</label>
                                <input type="text" name="venue" value="{{ $event->venue }}" class="form-control" placeholder="e.g. Central Park Great Lawn">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Address</label>
                                <input type="text" name="address" value="{{ $event->address }}" class="form-control" placeholder="Full address">
                            </div>
                        </div>
                </div>
    
                <!-- BANNER (Prefilled) -->
                <div class="form-card mb-4">
                    <h5 class="mb-3"><i class="bi bi-image me-2" style="color:var(--accent);"></i>Event Banner</h5>
                    <div class="position-relative mb-3">
                        <img src="{{ asset('/storage/' . $event->media->src) }}" alt="Current banner" style="width:100%;height:200px;object-fit:cover;border-radius:var(--radius-sm);">
                        <button class="btn btn-sm btn-danger position-absolute" style="top:10px;right:10px;"><i class="bi bi-trash"></i></button>
                    </div>
                    <input name="media" id="media" type="file" accept="image/*" hidden />
                    <label for="media" class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-upload me-1"></i> Replace  Banner</label>
                </div>

                <!-- EVENT SCHEDULE -->
                <div class="form-card mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0"><i class="bi bi-clock-fill me-2" style="color:var(--accent);"></i>Event Schedule</h5>
                        <button type="button" class="btn btn-sm btn-primary-custom" id="addScheduleTierBtn"><i class="bi bi-plus me-1"></i> Add Schedule</button>
                    </div>
                    <div id="scheduleTierContainer">
                        @foreach ($event->schedule as $index => $schedule)
                            
                            <div class="event-schedule-tier-row" id="tier-{{ $index }}">
                                <button type="button" class="remove-tier" onclick="this.closest('.event-schedule-tier-row').remove()"><i class="bi bi-x"></i></button>
                                <div class="row g-3">
                                    <input name="schedule[{{ $index }}][id]" value="{{ $schedule->id }}" hidden />
                                    <div class="col-md-3">
                                        <label class="form-label">Title</label>
                                        <input type="text" name="schedule[{{ $index }}][title]" class="form-control" value="{{ $schedule->title }}">
                                        </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Time</label>
                                        <input type="time" value="{{ $schedule->time }}" name="schedule[{{ $index }}][time]" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <label class="form-label">Description</label>
                                        <input type="text" class="form-control" name="schedule[{{ $index }}][description]" value="{{ $schedule->description }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
    
                <!-- TICKET TIERS (Prefilled) -->
                <div class="form-card mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0"><i class="bi bi-ticket-perforated me-2" style="color:var(--accent);"></i>Ticket
                            Tiers</h5>
                        <button type="button" class="btn btn-sm btn-primary-custom" id="addTierBtn"><i
                                class="bi bi-plus me-1"></i> Add Tier</button>
                    </div>
                    <div id="tierContainer">
                    
                        @foreach ($event->ticket as $index => $ticket)
                            
                            <div class="ticket-tier-row" id="tier-{{ $index }}">
                                <button type="button" class="remove-tier" onclick="this.closest('.ticket-tier-row').remove()"><i class="bi bi-x"></i></button>
                                <div class="row g-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Tier Name</label>
                                        <input type="text" name="ticket[{{ $index }}][name]" class="form-control" value="{{ $ticket->name }}">
                                        </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Price ($)</label>
                                        <input type="number" name="ticket[{{ $index }}][price]" class="form-control" value="{{ $ticket->price }}">
                                    </div>
                                    <div class="col-md-2">
                                        <label class="form-label">Quantity</label>
                                        <input type="number" name="ticket[{{ $index }}][quantity]" class="form-control" value="{{ $ticket->quantity }}">
                                    </div>
                                    <div class="col-md-5">
                                        <label class="form-label">Description</label>
                                        <input type="text" name="ticket[{{ $index }}][description]" class="form-control" value="{{ $ticket->description }}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- FAQ TIERS -->
                <div class="form-card mb-4">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0"><i class="bi bi-ticket-perforated me-2" style="color:var(--accent);"></i>FAQ</h5>
                        <button type="button" class="btn btn-sm btn-primary-custom" id="addFAQTierBtn"><i class="bi bi-plus me-1"></i> Add FAQ</button>
                    </div>
                    <div id="faqTierContainer">
                        @foreach ($event->faq as $index => $faq)
                            <div class="faq-tier-row" id="tier-{{ $index }}">
                                <button type="button" class="remove-tier" onclick="this.closest('.faq-tier-row').remove()"><i class="bi bi-x"></i></button>
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label class="form-label">Question:</label>
                                        <input type="text" name="faq[{{ $index }}][question]" class="form-control" value="{{ $faq->question }}">
                                        </div>
                                    <div class="col-12">
                                        <label class="form-label">Answer</label>
                                        <input type="text" name="faq[{{ $index }}][answer]" class="form-control" value="{{$faq->answer}}">
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-card">
                    <div class="ticket-card">
                        <h5 class="mb-3">Update Event</h5>
                        <div class="d-flex flex-column gap-2">

                        <button type="submit" name="act_btn" value="publish" class="btn btn-primary-custom py-2"><i class="bi bi-check-lg me-2"></i>Update & Publish</button>

                        <button type="submit" name="act_btn" value="draft" class="btn btn-outline-primary-custom py-2"><i class="bi bi-save me-2"></i>Save as Draft
                            </button>
                        </div>
                    </div>
                </div>
            </x-forms.form>
        </div>
            <!-- SIDEBAR -->
            <div class="col-lg-4">
                
                <div class="dashboard-card mt-3 sticky-top" style="top: 40px;">
                    <h5 class="mb-3">Event Stats</h5>
                    <div class="d-flex justify-content-between py-2 border-bottom"><span  class="text-muted">Status</span><span class="status-badge active">Active</span></div>
                    <div class="d-flex justify-content-between py-2 border-bottom"><span class="text-muted">Tickets Sold</span><strong>320</strong></div>
                    <div class="d-flex justify-content-between py-2 border-bottom"><span class="text-muted">Revenue</span><strong style="color:var(--primary);">$15,680</strong></div>
                    <div class="d-flex justify-content-between py-2"><span class="text-muted">Views</span><strong>4,520</strong></div>
                    <x-forms.form method="POST" action="/organizer/event/{{ $event->id }}/delete">
                            @method("DELETE")
                            <button type="submit" class="btn btn-outline-danger py-2"><i class="bi bi-trash me-2"></i>Delete Event</button>
                    </x-forms.form>
                </div>
            </div>
        </div>
    </div>


@endsection
