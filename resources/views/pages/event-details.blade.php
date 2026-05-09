@extends('components.home-layout')

@section('content')


<!-- BREADCRUMB -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size:0.85rem;">
            <li class="breadcrumb-item">
                <a href="index.html" class="text-decoration-none" style="color:var(--primary);">Home</a>
            </li>
            <li class="breadcrumb-item">
                <a href="browse-events.html" class="text-decoration-none" style="color:var(--primary);">Events</a>
            </li>
            <li class="breadcrumb-item active">{{ $event->name }}</li>
        </ol>
    </nav>
</div>

<!-- EVENT DETAILS -->
<section class="section-padding pt-2">
    <div class="container">
        <div class="row g-4">
            <!-- LEFT COLUMN -->
            <div class="col-lg-8">
                <div class="event-detail-banner">
                    <img src="{{ $event->media ? asset('/storage/' . $event->media->src) : asset('/images/default-event.webp') }}"
                        alt="Summer Music Festival">
                </div>

                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <span class="status-badge active">On Sale</span>
                    <span class="section-badge mb-0">{{ $event->category->name }}</span>
                </div>

                <h1 style="font-size:2rem;margin-bottom:0.5rem;">{{ $event->name }}</h1>

                <div class="d-flex flex-wrap align-items-center gap-3 mb-4"
                    style="color:var(--text-secondary);font-size:0.95rem;">
                    <span><i class="bi bi-person-circle me-1" style="color:var(--primary);"></i> Organized by
                        <strong>{{ $event->user->name }}</strong></span>
                    <span><i class="bi bi-star-fill me-1" style="color:var(--accent);"></i> 4.8 (320 reviews)</span>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-3">
                        <div class="dashboard-card text-center p-3">
                            <i class="bi bi-calendar3 d-block mb-1" style="font-size:1.3rem;color:var(--primary);"></i>
                            <strong style="font-size:0.85rem;">{{ $event->start_date->format('M d, Y') }}</strong>
                            <div style="font-size:0.75rem;color:var(--text-secondary);">{{ $event->start_date->format('l') }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="dashboard-card text-center p-3">
                            <i class="bi bi-clock d-block mb-1" style="font-size:1.3rem;color:var(--primary);"></i>
                            <strong style="font-size:0.85rem;">{{ $event->schedule->first()->time->format('h:i A') }}</strong>
                            <div style="font-size:0.75rem;color:var(--text-secondary);">Duration: 5 hrs</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="dashboard-card text-center p-3">
                            <i class="bi bi-geo-alt d-block mb-1" style="font-size:1.3rem;color:var(--primary);"></i>
                            <strong style="font-size:0.85rem;">{{ $event->venue }}</strong>
                            <div style="font-size:0.75rem;color:var(--text-secondary);">{{ $event->address }}</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="dashboard-card text-center p-3">
                            <i class="bi bi-people d-block mb-1" style="font-size:1.3rem;color:var(--primary);"></i>
                            <strong style="font-size:0.85rem;">{{ $event->ticket->sum('quantity') }} Seats</strong>
                            <div style="font-size:0.75rem;color:var(--text-secondary);">{{$event->ticket->sum('quantity') - ( $event->order->sum('quantity')) }} remaining</div>
                        </div>
                    </div>
                </div>

                <!-- DESCRIPTION TABS -->
                <div class="description-tabs">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#about">About</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#schedule">Schedule</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#venue">Venue</a></li>
                        <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#faqs">FAQs</a></li>
                    </ul>
                    <div class="tab-content pt-3">
                        <div class="tab-pane fade show active" id="about">
                            {{ $event->description }}
                        </div>
                        <div class="tab-pane fade" id="schedule">
                            <div class="d-flex flex-column gap-3">
                                @foreach ($schedules as $schedule)                         
                                    <div class="d-flex gap-3 align-items-start">
                                        <div class="text-center" style="min-width:70px;"><strong style="color:var(--primary);">{{ $schedule->time->format('h:i A') }}</strong></div>
                                        <div>
                                            <h6 class="mb-1">{{ $schedule->title }}</h6>
                                            <p class="text-muted mb-0" style="font-size:0.9rem;"> {{ $schedule->description }} </p>
                                        </div>
                                    </div>
                                    <hr class="my-1">
                                @endforeach
                                
                            </div>
                        </div>
                        <div class="tab-pane fade" id="venue">
                            <h5 class="mb-3">{{ $event->venue }}</h5>
                            <p class="text-muted">{{ $event->address }}</p>                           
                        </div>
                        <div class="tab-pane fade" id="faqs">
                            <div class="accordion" id="faqAccordion">
                                @foreach ($faqs as $index => $faq)                       
                                    <div class="accordion-item border-0 border-bottom">
                                        <h2 class="accordion-header"><button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faq{{ $index }}">{{ $faq->question }}</button></h2>
                                        <div id="faq{{ $index }}" class="accordion-collapse collapse show"
                                            data-bs-parent="#faqAccordion">
                                            <div class="accordion-body text-muted">{{ $faq->answer }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN — TICKET CARD -->
            <div class="col-lg-4">

                @if ($event->ticket_close->isPast())
                    <div class="ticket-card">
                        <h4><i class="bi bi-ticket-perforated me-2" style="color:var(--accent);"></i>Ticket of this event has closed!</h4>
                        <p>See Our Other event. <a href="{{ url('events') }}" class="link text-primary">Click here</a>.</p>
                    </div>
                @else
                    <x-forms.form method="POST" action="/user/checkout/{{ $event->id }}">
                        <div class="ticket-card">
                            <h4><i class="bi bi-ticket-perforated me-2" style="color:var(--accent);"></i>Select Tickets</h4>

                            <input value="{{ $event->id }}" name="event-id" name="ticket-id" hidden>

                            @php
                                $i = 0;
                            @endphp
                            
                            @foreach ($tickets as $index => $ticket)
                                <input value="{{ $ticket->id }}" name="ticket[{{ $index }}][id]" hidden>


                                <div class="ticket-tier" data-price="{{ $ticket->price }}">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <div>
                                            <div class="tier-name">{{ $ticket->name }}</div>
                                            <small class="text-muted">{{ $ticket->description }}</small>
                                        </div>
                                        <div class="tier-price">${{ $ticket->price }}</div>
                                    </div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <small class="text-muted">{{ ($ticket->quantity - $ticket->order->sum('quantity')) }} remaining</small>
                                        <div class="quantity-selector">
                                            <button type="button" class="qty-minus"><i class="bi bi-dash"></i></button>
                                            <input class="qty-value" value="0" name="ticket[{{ $index }}][quantity]" type="number" style="width: 50px;text-align: center; border: none; background: transparent; outline: none;">
                                            <button type="button" class="qty-plus"><i class="bi bi-plus"></i></button>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <small class="text-muted">{{ $ticket->quantity }} Total Tickets</small>           
                                    </div>
                                </div>
                            @endforeach
        
                            <hr>
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <strong>Total</strong>
                                <strong class="total-price" style="font-size:1.35rem;color:var(--primary);">$ 0</strong>
                            </div>
                            <button type="submit" class="btn btn-primary-custom w-100 py-3">
                                <i class="bi bi-lock me-2"></i>Proceed to Checkout
                            </button>
                            <p class="text-center text-muted mt-2" style="font-size:0.8rem;">
                                <i class="bi bi-shield-check me-1"></i> Secure checkout powered by Stripe
                            </p>
                        </div>
                    </x-forms.form>
                @endif


            </div>
        </div>
                    @php
                        $shareUrl = request()->fullUrl();
                        $shareTitle = $event->name;
                        // dd($shareTitle);
                    @endphp
                <!-- SHARE & SAVE -->
                <div class="dashboard-card mt-3 text-center">
                    <div class="d-flex gap-2 justify-content-center">
                        <x-Forms.form method="POST" action="/user/{{ $event->id }}/save-event">
                            @if ($isSaveEvent)
                                <button type="submit" class="btn btn-sm btn-outline-primary-custom text-white" style="background-color: var(--primary)"><i class="bi bi-heart me-1"></i> Saved</button>
                            @else
                                <button type="submit" class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-heart me-1"></i> Save</button>
                            @endif
                        </x-Forms.form>
                            <button class="btn btn-sm btn-outline-primary-custom dropdown-toggle" type="button"  data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-share me-1"></i> Share
                        </button>
                        <ul class="dropdown-menu shadow rounded-3 p-2">
                            <li>
                                <a class="dropdown-item" href="https://www.facebook.com/sharer/sharer.php?u={{ $shareUrl }}" target="_blank">
                                Facebook
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="https://twitter.com/intent/tweet?url={{ $shareUrl }}&text={{ $shareTitle }}"
                                target="_blank">
                                X
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="https://www.linkedin.com/sharing/share-offsite/?url={{ $shareUrl }}"
                                target="_blank">
                                LinkedIn
                                </a>
                            </li>

                            <li>
                                <a class="dropdown-item" href="https://api.whatsapp.com/send?text={{ $shareTitle }}%20{{ $shareUrl }}"
                                target="_blank">
                                WhatsApp
                                </a>
                            </li>
                        </ul>
                        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-flag me-1"></i> Report</button>
                    </div>
                </div>
    </div>
</section>

@endsection
