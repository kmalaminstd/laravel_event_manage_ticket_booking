@extends('components.home-layout')

@section('content')

    <!-- ===== HERO SECTION ===== -->
    <section class="hero-section">
        <div class="container">
        <div class="row">
            <div class="col-lg-8">
            <span class="section-badge">🎉 #1 Event Platform</span>
            <h1>Discover <span>Events</span><br>Near You</h1>
            <p>Find and book tickets for concerts, workshops, seminars, conferences and more — all in one place.</p>
            <div class="hero-search">
                <input type="text" placeholder="Search events...">
                <input type="text" placeholder="Location">
                <input type="date" class="d-none d-md-block">
                <button class="btn-search">Explore Now</button>
            </div>
            <div class="hero-stats">
                <div class="stat-item">
                <h3>10K+</h3>
                <p>Events Hosted</p>
                </div>
                <div class="stat-item">
                <h3>50K+</h3>
                <p>Tickets Sold</p>
                </div>
                <div class="stat-item">
                <h3>5K+</h3>
                <p>Organizers</p>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- ===== CATEGORIES ===== -->
    <section class="section-padding">
        <div class="container">

            <div class="section-header">
                <span class="section-badge">Categories</span>
                <h2>Browse by Category</h2>
                <p>Find events that match your interests from our diverse range of categories</p>
            </div>

            <div class="row g-4">

                @foreach ($categories as $category)
                    <div class="col-6 col-md-4 col-lg-2">
                        <div class="category-card">
                            <div class="icon-wrap" style="background: rgba(232,168,56,0.12); color: #265367;">
                            <i class="{{ $category->icon_class }}"></i>
                            </div>
                            <h5>{{ $category->name }}</h5>
                            <p>120 Events</p>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>

    <!-- ===== FEATURED EVENTS ===== -->
    <section class="section-padding" style="background: var(--light-bg);">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">Featured</span>
                <h2>Featured Events</h2>
                <p>Hand-picked events you don't want to miss</p>
            </div>
            <div class="row g-4">
                <!-- Event 1 -->
                <div class="col-md-6 col-lg-4">
                    <div class="event-card">
                        <div class="card-img-wrap">
                        <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=600" alt="Concert">
                        <span class="badge-featured">⭐ Featured</span>
                        <span class="badge-price">$49</span>
                        </div>
                        <div class="card-body">
                        <div class="event-category">Concert</div>
                        <h5 class="event-title">Summer Music Festival 2026</h5>
                        <div class="event-meta">
                            <span><i class="bi bi-calendar3"></i> Mar 15, 2026</span>
                            <span><i class="bi bi-geo-alt"></i> Central Park, New York</span>
                        </div>
                        </div>
                        <div class="card-footer">
                        <div class="organizer">
                            <div style="width:28px;height:28px;border-radius:50%;background:var(--gradient-primary);display:flex;align-items:center;justify-content:center;color:#fff;font-size:0.7rem;font-weight:700;">SM</div>
                            <span>SoundMax Pro</span>
                        </div>
                        <a href="event-details.html" class="btn btn-sm btn-outline-primary-custom">View</a>
                        </div>
                    </div>
                </div>
                <!-- Event 2 -->
                <div class="col-md-6 col-lg-4">
                <div class="event-card">
                    <div class="card-img-wrap">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600" alt="Conference">
                    <span class="badge-featured">⭐ Featured</span>
                    <span class="badge-price">$129</span>
                    </div>
                    <div class="card-body">
                    <div class="event-category">Conference</div>
                    <h5 class="event-title">Tech Innovation Summit 2026</h5>
                    <div class="event-meta">
                        <span><i class="bi bi-calendar3"></i> Apr 10, 2026</span>
                        <span><i class="bi bi-geo-alt"></i> Convention Center, SF</span>
                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="organizer">
                        <div style="width:28px;height:28px;border-radius:50%;background:var(--gradient-accent);display:flex;align-items:center;justify-content:center;color:#1a1a2e;font-size:0.7rem;font-weight:700;">TI</div>
                        <span>TechInnovate</span>
                    </div>
                    <a href="event-details.html" class="btn btn-sm btn-outline-primary-custom">View</a>
                    </div>
                </div>
                </div>
                <!-- Event 3 -->
                <div class="col-md-6 col-lg-4">
                <div class="event-card">
                    <div class="card-img-wrap">
                    <img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=600" alt="Workshop">
                    <span class="badge-featured">⭐ Featured</span>
                    <span class="badge-price">$35</span>
                    </div>
                    <div class="card-body">
                    <div class="event-category">Workshop</div>
                    <h5 class="event-title">Creative Design Masterclass</h5>
                    <div class="event-meta">
                        <span><i class="bi bi-calendar3"></i> Mar 22, 2026</span>
                        <span><i class="bi bi-geo-alt"></i> Art Studio, London</span>
                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="organizer">
                        <div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#28a745,#20c997);display:flex;align-items:center;justify-content:center;color:#fff;font-size:0.7rem;font-weight:700;">CD</div>
                        <span>CreativeHub</span>
                    </div>
                    <a href="event-details.html" class="btn btn-sm btn-outline-primary-custom">View</a>
                    </div>
                </div>
                </div>
                <!-- Event 4 -->
                <div class="col-md-6 col-lg-4">
                <div class="event-card">
                    <div class="card-img-wrap">
                    <img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=600" alt="Seminar">
                    <span class="badge-featured">⭐ Featured</span>
                    <span class="badge-price">Free</span>
                    </div>
                    <div class="card-body">
                    <div class="event-category">Seminar</div>
                    <h5 class="event-title">AI & Future of Work Forum</h5>
                    <div class="event-meta">
                        <span><i class="bi bi-calendar3"></i> Apr 5, 2026</span>
                        <span><i class="bi bi-geo-alt"></i> Digital Hall, Berlin</span>
                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="organizer">
                        <div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#706127,#9a8a3c);display:flex;align-items:center;justify-content:center;color:#fff;font-size:0.7rem;font-weight:700;">FW</div>
                        <span>FutureWork</span>
                    </div>
                    <a href="event-details.html" class="btn btn-sm btn-outline-primary-custom">View</a>
                    </div>
                </div>
                </div>
                <!-- Event 5 -->
                <div class="col-md-6 col-lg-4">
                <div class="event-card">
                    <div class="card-img-wrap">
                    <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=600" alt="Festival">
                    <span class="badge-featured">⭐ Featured</span>
                    <span class="badge-price">$75</span>
                    </div>
                    <div class="card-body">
                    <div class="event-category">Festival</div>
                    <h5 class="event-title">International Food & Culture Fest</h5>
                    <div class="event-meta">
                        <span><i class="bi bi-calendar3"></i> May 1, 2026</span>
                        <span><i class="bi bi-geo-alt"></i> Harbor Park, Sydney</span>
                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="organizer">
                        <div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#dc3545,#e85d04);display:flex;align-items:center;justify-content:center;color:#fff;font-size:0.7rem;font-weight:700;">FC</div>
                        <span>FestCulture</span>
                    </div>
                    <a href="event-details.html" class="btn btn-sm btn-outline-primary-custom">View</a>
                    </div>
                </div>
                </div>
                <!-- Event 6 -->
                <div class="col-md-6 col-lg-4">
                <div class="event-card">
                    <div class="card-img-wrap">
                    <img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=600" alt="Networking">
                    <span class="badge-featured">⭐ Featured</span>
                    <span class="badge-price">$25</span>
                    </div>
                    <div class="card-body">
                    <div class="event-category">Workshop</div>
                    <h5 class="event-title">Startup Networking Meetup</h5>
                    <div class="event-meta">
                        <span><i class="bi bi-calendar3"></i> Mar 28, 2026</span>
                        <span><i class="bi bi-geo-alt"></i> Co-Work Space, Dubai</span>
                    </div>
                    </div>
                    <div class="card-footer">
                    <div class="organizer">
                        <div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#17a2b8,#20c997);display:flex;align-items:center;justify-content:center;color:#fff;font-size:0.7rem;font-weight:700;">SN</div>
                        <span>StartNet</span>
                    </div>
                    <a href="event-details.html" class="btn btn-sm btn-outline-primary-custom">View</a>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ===== UPCOMING THIS WEEK ===== -->
    <section class="section-padding">
        <div class="container">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
            <span class="section-badge">This Week</span>
            <h2 class="mb-0" style="font-size:1.75rem;">Upcoming This Week</h2>
            </div>
            <a href="browse-events.html" class="btn btn-outline-primary-custom d-none d-md-inline-flex">View All <i class="bi bi-arrow-right ms-1"></i></a>
        </div>
        <div class="horizontal-scroll-wrapper">
            <div class="horizontal-scroll">
            <div class="event-card">
                <div class="card-img-wrap"><img src="https://images.unsplash.com/photo-1501281668745-f7f57925c3b4?w=600" alt="Event"><span class="badge-price">$30</span></div>
                <div class="card-body">
                <div class="event-category">Concert</div>
                <h5 class="event-title">Jazz Night Live</h5>
                <div class="event-meta"><span><i class="bi bi-calendar3"></i> Feb 22, 2026</span><span><i class="bi bi-geo-alt"></i> Blue Note, NYC</span></div>
                </div>
            </div>
            <div class="event-card">
                <div class="card-img-wrap"><img src="https://images.unsplash.com/photo-1559223607-a43c990c692c?w=600" alt="Event"><span class="badge-price">Free</span></div>
                <div class="card-body">
                <div class="event-category">Seminar</div>
                <h5 class="event-title">Web3 Deep Dive</h5>
                <div class="event-meta"><span><i class="bi bi-calendar3"></i> Feb 23, 2026</span><span><i class="bi bi-geo-alt"></i> Online</span></div>
                </div>
            </div>
            <div class="event-card">
                <div class="card-img-wrap"><img src="https://images.unsplash.com/photo-1517457373958-b7bdd4587205?w=600" alt="Event"><span class="badge-price">$55</span></div>
                <div class="card-body">
                <div class="event-category">Workshop</div>
                <h5 class="event-title">Photography Essentials</h5>
                <div class="event-meta"><span><i class="bi bi-calendar3"></i> Feb 24, 2026</span><span><i class="bi bi-geo-alt"></i> Studio 54, LA</span></div>
                </div>
            </div>
            <div class="event-card">
                <div class="card-img-wrap"><img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=600" alt="Event"><span class="badge-price">$40</span></div>
                <div class="card-body">
                <div class="event-category">Festival</div>
                <h5 class="event-title">Street Art Exhibition</h5>
                <div class="event-meta"><span><i class="bi bi-calendar3"></i> Feb 25, 2026</span><span><i class="bi bi-geo-alt"></i> Shoreditch, London</span></div>
                </div>
            </div>
            <div class="event-card">
                <div class="card-img-wrap"><img src="https://images.unsplash.com/photo-1523580494863-6f3031224c94?w=600" alt="Event"><span class="badge-price">$20</span></div>
                <div class="card-body">
                <div class="event-category">Seminar</div>
                <h5 class="event-title">Digital Marketing 101</h5>
                <div class="event-meta"><span><i class="bi bi-calendar3"></i> Feb 26, 2026</span><span><i class="bi bi-geo-alt"></i> Hub, Toronto</span></div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- ===== HOW IT WORKS ===== -->
    <section class="section-padding how-it-works">
        <div class="container">
        <div class="section-header">
            <span class="section-badge" style="background: rgba(232,168,56,0.15); color: var(--accent);">How It Works</span>
            <h2 style="color:#fff;">Book Your Next Event in 3 Steps</h2>
            <p style="color: rgba(255,255,255,0.6);">From discovery to attendance, we make it seamless</p>
        </div>
        <div class="row align-items-center">
            <div class="col-md-3">
            <div class="step-card">
                <div class="step-number">1</div>
                <h4>Discover</h4>
                <p>Browse through thousands of events or search by category, location, and date.</p>
            </div>
            </div>
            <div class="col-md-1 d-none d-md-block">
            <div class="step-connector"><i class="bi bi-arrow-right"></i></div>
            </div>
            <div class="col-md-3">
            <div class="step-card">
                <div class="step-number">2</div>
                <h4>Book</h4>
                <p>Select your tickets, fill in your details, and pay securely in seconds.</p>
            </div>
            </div>
            <div class="col-md-1 d-none d-md-block">
            <div class="step-connector"><i class="bi bi-arrow-right"></i></div>
            </div>
            <div class="col-md-3">
            <div class="step-card">
                <div class="step-number">3</div>
                <h4>Attend</h4>
                <p>Receive your e-ticket with QR code and enjoy the event hassle-free.</p>
            </div>
            </div>
        </div>
        </div>
    </section>

    <!-- ===== TESTIMONIALS ===== -->
    <section class="section-padding">
        <div class="container">
        <div class="section-header">
            <span class="section-badge">Testimonials</span>
            <h2>What Our Users Say</h2>
            <p>Join thousands of happy event-goers and organizers</p>
        </div>
        <div class="row g-4">
            <div class="col-md-4">
            <div class="testimonial-card">
                <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                <p>"EventHub made finding and booking concerts so easy. The QR check-in was seamless. Absolutely love this platform!"</p>
                <div class="author">
                <div style="width:45px;height:45px;border-radius:50%;background:var(--gradient-primary);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">SJ</div>
                <div>
                    <h6>Sarah Johnson</h6>
                    <small>Music Enthusiast</small>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="testimonial-card">
                <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i></div>
                <p>"As an organizer, the dashboard gives me everything I need. Revenue tracking, attendee management, QR scanning — all in one."</p>
                <div class="author">
                <div style="width:45px;height:45px;border-radius:50%;background:var(--gradient-accent);display:flex;align-items:center;justify-content:center;color:#1a1a2e;font-weight:700;">MR</div>
                <div>
                    <h6>Michael Roberts</h6>
                    <small>Event Organizer</small>
                </div>
                </div>
            </div>
            </div>
            <div class="col-md-4">
            <div class="testimonial-card">
                <div class="stars"><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-half"></i></div>
                <p>"The checkout process is incredibly smooth. I booked tickets for a conference in under a minute. Highly recommended!"</p>
                <div class="author">
                <div style="width:45px;height:45px;border-radius:50%;background:linear-gradient(135deg,#28a745,#20c997);display:flex;align-items:center;justify-content:center;color:#fff;font-weight:700;">EL</div>
                <div>
                    <h6>Emily Lee</h6>
                    <small>Tech Professional</small>
                </div>
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>

@endsection