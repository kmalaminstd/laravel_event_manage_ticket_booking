@props(["event"])

<div class="event-card">
    <div class="card-img-wrap"><img src="{{ asset("storage/" . $event->media->src) }}" alt="Event"><span class="badge-price">From ${{ $event->ticket_min_price }}</span></div>
    <div class="card-body">
        <div class="event-category">{{ $event->category->name }}</div>
        <h5 class="event-title"><a href="/event/{{ $event->id }}/{{ $event->slug }}">{{ $event->name }}</a></h5>
        <div class="event-meta"><span><i class="bi bi-calendar3"></i> {{ $event->start_date->format('d M, Y') }}</span><span><i class="bi bi-geo-alt"></i> {{ $event->address }}</span></div>
    </div>
</div>
