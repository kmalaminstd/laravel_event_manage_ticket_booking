@props(["event"])

@php
     
// dd($event->media->src)
@endphp

<div class="event-card">
    <div class="card-img-wrap">
        <img src="{{ asset("storage/" . $event->media->src) }}" alt="Event">
            <span class="badge-price">{{ $event->ticket_max_price > $event->ticket_min_price ? "From" : "" }} ${{ $event->ticket_min_price }}

            @if ($event->ticket_max_price > $event->ticket_min_price)
                {{ "to - $" . $event->ticket_max_price }}
            @endif
        </span>
        @if ($event->featured)
            <span class="badge-featured">⭐ Featured</span>
        @endif
    </div>
    <div class="card-body">
        <div class="event-category">{{ $event->category->name }}</div>
        <h5 class="event-title">{{ $event->name }}</h5>
        <div class="event-meta"><span><i class="bi bi-calendar3"></i> {{ $event->start_date->format('D, d M, Y') }}</span><span><i class="bi bi-geo-alt"></i> {{ $event->venue }}</span></div>
    </div>
    <div class="card-footer">
        <div class="organizer">
            <div style="width:28px;height:28px;border-radius:50%;background:var(--gradient-primary);display:flex;align-items:center;justify-content:center;color:#fff;font-size:0.7rem;font-weight:700;">
                SM</div><span>{{ $event->user->name }}</span>
        </div>
        @if ($event->ticket_close > now()->toDateString())
            <a href="/event/{{$event->id}}/{{ $event->slug }}" class="btn btn-sm btn-outline-primary-custom">View</a>
        @endif
        
    </div>
</div>
