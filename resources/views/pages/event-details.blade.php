@extends('components.home-layout')

@section('content')


<!-- BREADCRUMB -->
<div class="container mt-3">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb" style="font-size:0.85rem;">
            <li class="breadcrumb-item"><a href="index.html" class="text-decoration-none"
                    style="color:var(--primary);">Home</a></li>
            <li class="breadcrumb-item"><a href="browse-events.html" class="text-decoration-none"
                    style="color:var(--primary);">Events</a></li>
            <li class="breadcrumb-item active">Summer Music Festival 2026</li>
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
                    <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=1200"
                        alt="Summer Music Festival">
                </div>

                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <span class="status-badge active">On Sale</span>
                    <span class="section-badge mb-0">Concert</span>
                </div>

                <h1 style="font-size:2rem;margin-bottom:0.5rem;">Summer Music Festival 2026</h1>

                <div class="d-flex flex-wrap align-items-center gap-3 mb-4"
                    style="color:var(--text-secondary);font-size:0.95rem;">
                    <span><i class="bi bi-person-circle me-1" style="color:var(--primary);"></i> Organized by
                        <strong>SoundMax Pro</strong></span>
                    <span><i class="bi bi-star-fill me-1" style="color:var(--accent);"></i> 4.8 (320 reviews)</span>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-sm-6 col-md-3">
                        <div class="dashboard-card text-center p-3">
                            <i class="bi bi-calendar3 d-block mb-1" style="font-size:1.3rem;color:var(--primary);"></i>
                            <strong style="font-size:0.85rem;">Mar 15, 2026</strong>
                            <div style="font-size:0.75rem;color:var(--text-secondary);">Saturday</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="dashboard-card text-center p-3">
                            <i class="bi bi-clock d-block mb-1" style="font-size:1.3rem;color:var(--primary);"></i>
                            <strong style="font-size:0.85rem;">6:00 PM</strong>
                            <div style="font-size:0.75rem;color:var(--text-secondary);">Duration: 5 hrs</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="dashboard-card text-center p-3">
                            <i class="bi bi-geo-alt d-block mb-1" style="font-size:1.3rem;color:var(--primary);"></i>
                            <strong style="font-size:0.85rem;">Central Park</strong>
                            <div style="font-size:0.75rem;color:var(--text-secondary);">New York, NY</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="dashboard-card text-center p-3">
                            <i class="bi bi-people d-block mb-1" style="font-size:1.3rem;color:var(--primary);"></i>
                            <strong style="font-size:0.85rem;">2,500 Seats</strong>
                            <div style="font-size:0.75rem;color:var(--text-secondary);">180 remaining</div>
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
                            <p>Join us for the most anticipated music event of the year! The Summer Music Festival 2026
                                brings together world-class artists, emerging talents, and music lovers for an
                                unforgettable experience in the heart of Central Park.</p>
                            <p>Experience live performances across multiple stages, featuring genres from rock and pop
                                to electronic and jazz. Enjoy gourmet food vendors, art installations, and interactive
                                experiences throughout the event.</p>
                            <h5 class="mt-4 mb-3">What's Included:</h5>
                            <ul style="color:var(--text-secondary);">
                                <li>Access to all performance stages</li>
                                <li>Complimentary welcome drink</li>
                                <li>Event merchandise discount (20%)</li>
                                <li>Digital event program</li>
                                <li>Free parking (VIP & Premium only)</li>
                            </ul>
                        </div>
                        <div class="tab-pane fade" id="schedule">
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex gap-3 align-items-start">
                                    <div class="text-center" style="min-width:70px;"><strong
                                            style="color:var(--primary);">6:00 PM</strong></div>
                                    <div>
                                        <h6 class="mb-1">Gates Open</h6>
                                        <p class="text-muted mb-0" style="font-size:0.9rem;">Welcome drinks &
                                            registration</p>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex gap-3 align-items-start">
                                    <div class="text-center" style="min-width:70px;"><strong
                                            style="color:var(--primary);">7:00 PM</strong></div>
                                    <div>
                                        <h6 class="mb-1">Opening Act — The Waves</h6>
                                        <p class="text-muted mb-0" style="font-size:0.9rem;">Indie rock set on Main
                                            Stage</p>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex gap-3 align-items-start">
                                    <div class="text-center" style="min-width:70px;"><strong
                                            style="color:var(--primary);">8:30 PM</strong></div>
                                    <div>
                                        <h6 class="mb-1">Headliner — Luna Eclipse</h6>
                                        <p class="text-muted mb-0" style="font-size:0.9rem;">Full concert experience</p>
                                    </div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex gap-3 align-items-start">
                                    <div class="text-center" style="min-width:70px;"><strong
                                            style="color:var(--primary);">10:30 PM</strong></div>
                                    <div>
                                        <h6 class="mb-1">DJ Afterparty</h6>
                                        <p class="text-muted mb-0" style="font-size:0.9rem;">Electronic music till close
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="venue">
                            <h5 class="mb-3">Central Park Great Lawn</h5>
                            <p class="text-muted">Central Park, New York, NY 10024, United States</p>
                            <div
                                style="background:#e9ecef;border-radius:var(--radius-md);height:300px;display:flex;align-items:center;justify-content:center;color:var(--text-secondary);">
                                <div class="text-center">
                                    <i class="bi bi-map" style="font-size:3rem;"></i>
                                    <p class="mt-2 mb-0">Google Maps Embed Placeholder</p>
                                </div>
                            </div>
                            <div class="row g-3 mt-3">
                                <div class="col-sm-4">
                                    <p class="mb-1"><i class="bi bi-car-front me-2"
                                            style="color:var(--primary);"></i><strong>Parking</strong></p>
                                    <p class="text-muted" style="font-size:0.85rem;">Available on-site</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="mb-1"><i class="bi bi-train-front me-2"
                                            style="color:var(--primary);"></i><strong>Transit</strong></p>
                                    <p class="text-muted" style="font-size:0.85rem;">B/C to 72nd St</p>
                                </div>
                                <div class="col-sm-4">
                                    <p class="mb-1"><i class="bi bi-universal-access me-2"
                                            style="color:var(--primary);"></i><strong>Accessibility</strong></p>
                                    <p class="text-muted" style="font-size:0.85rem;">Wheelchair accessible</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="faqs">
                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header"><button class="accordion-button" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#faq1">Can I get a
                                            refund?</button></h2>
                                    <div id="faq1" class="accordion-collapse collapse show"
                                        data-bs-parent="#faqAccordion">
                                        <div class="accordion-body text-muted">Yes, refunds are available up to 48 hours
                                            before the event. A 10% processing fee may apply.</div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0 border-bottom">
                                    <h2 class="accordion-header"><button class="accordion-button collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#faq2">Is there an
                                            age restriction?</button></h2>
                                    <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body text-muted">This event is open to all ages. Children
                                            under 12 must be accompanied by an adult.</div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0">
                                    <h2 class="accordion-header"><button class="accordion-button collapsed"
                                            type="button" data-bs-toggle="collapse" data-bs-target="#faq3">What should I
                                            bring?</button></h2>
                                    <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body text-muted">Bring your e-ticket (QR code), valid ID,
                                            and comfortable clothes. Outside food and drinks are not permitted.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT COLUMN — TICKET CARD -->
            <div class="col-lg-4">
                <div class="ticket-card">
                    <h4><i class="bi bi-ticket-perforated me-2" style="color:var(--accent);"></i>Select Tickets</h4>

                    <div class="ticket-tier selected" data-price="49">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <div class="tier-name">General Admission</div>
                                <small class="text-muted">Access to all stages, standing area</small>
                            </div>
                            <div class="tier-price">$49</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">180 remaining</small>
                            <div class="quantity-selector">
                                <button class="qty-minus"><i class="bi bi-dash"></i></button>
                                <span class="qty-value">1</span>
                                <button class="qty-plus"><i class="bi bi-plus"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="ticket-tier" data-price="99">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <div class="tier-name">Premium</div>
                                <small class="text-muted">Front section + free drink</small>
                            </div>
                            <div class="tier-price">$99</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">85 remaining</small>
                            <div class="quantity-selector">
                                <button class="qty-minus"><i class="bi bi-dash"></i></button>
                                <span class="qty-value">0</span>
                                <button class="qty-plus"><i class="bi bi-plus"></i></button>
                            </div>
                        </div>
                    </div>

                    <div class="ticket-tier" data-price="199">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <div>
                                <div class="tier-name">VIP</div>
                                <small class="text-muted">VIP lounge, backstage, free parking</small>
                            </div>
                            <div class="tier-price">$199</div>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <small class="text-muted">20 remaining</small>
                            <div class="quantity-selector">
                                <button class="qty-minus"><i class="bi bi-dash"></i></button>
                                <span class="qty-value">0</span>
                                <button class="qty-plus"><i class="bi bi-plus"></i></button>
                            </div>
                        </div>
                    </div>

                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <strong>Total</strong>
                        <strong class="total-price" style="font-size:1.35rem;color:var(--primary);">$49.00</strong>
                    </div>
                    <a href="checkout.html" class="btn btn-primary-custom w-100 py-3">
                        <i class="bi bi-lock me-2"></i>Proceed to Checkout
                    </a>
                    <p class="text-center text-muted mt-2" style="font-size:0.8rem;">
                        <i class="bi bi-shield-check me-1"></i> Secure checkout powered by Stripe
                    </p>
                </div>

                <!-- SHARE & SAVE -->
                <div class="dashboard-card mt-3 text-center">
                    <div class="d-flex gap-2 justify-content-center">
                        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-heart me-1"></i>
                            Save</button>
                        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-share me-1"></i>
                            Share</button>
                        <button class="btn btn-sm btn-outline-primary-custom"><i class="bi bi-flag me-1"></i>
                            Report</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
