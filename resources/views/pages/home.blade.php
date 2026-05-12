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
                            <p>{{ $category->posts_count }} Events</p>
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
                @foreach ($featuredEvents as $event)                    
                    <div class="col-md-6 col-lg-4">
                        <x-cards.user-event-card :event="$event" />
                    </div>
                @endforeach                
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


                @forelse ($nextWeekEvents as $event)
                    <x-cards.user-event-week-card :event="$event" />
                @empty
                    <h4>No courses</h4>
                @endforelse
            
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