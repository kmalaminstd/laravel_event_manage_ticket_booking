@props(["event"])

<div class="org-event-card">
    <div class="card-banner"><img src="{{ asset('/storage/' . $event->media->src) }}" alt="Event">
    </div>
    <div class="card-content">
        <div class="d-flex flex-wrap justify-content-between">
            @if ($event->published)
                <span class="status-badge active event-status">Active</span>
            @else
                <span class="status-badge draft event-status">Draft</span>
            @endif

            @if($event->admin_approved)
                <span class="status-badge active event-status">Approved</span>
            @else
                <span class="status-badge draft event-status">Pending</span>
            @endif
        </div>
        <h5>Summer Music Festival 2026</h5>
        <div class="event-stats">
            <span><i class="bi bi-ticket-perforated"></i> 320 sold</span>
            <span><i class="bi bi-currency-dollar"></i> $15,680</span>
        </div>
        <div class="d-flex gap-2 mt-3">

            @if (!$event->published || !$event->admin_approved)
                <a href="/organizer/event/{{ $event->id }}/edit/" class="btn btn-sm btn-outline-primary-custom flex-fill"><i class="bi bi-pencil me-1"></i> Edit</a>
            @endif

            {{-- {{ dd($status) }} --}}

            @if (!$event->published && !$event->admin_approved)
                <x-forms.form>
                    <button type="submit" class="btn btn-sm btn-accent flex-fill"><i class="bi bi-send me-1"></i> Publish</button>
                </x-forms.form>
            @endif


            @if ($event->published && $event->admin_approved)

                <a href="organizer-analytics.html" class="btn btn-sm btn-outline-primary-custom flex-fill"><i class="bi bi-bar-chart me-1"></i> Analytics </a>

                <a href="/organizer/attendees" class="btn btn-sm btn-primary-custom flex-fill"><i  class="bi bi-people me-1"></i> Attendees</a>
            @endif
        </div>
    </div>
</div>
