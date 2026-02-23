@extends('components.home-layout')

@section('content')

  <!-- MAIN CONTENT -->
  <section class="section-padding">
    <div class="container">
      <div class="row g-4">
        <!-- FILTER SIDEBAR -->
        <div class="col-lg-3">

          <x-home.event-filter />
          
        </div>

        <!-- EVENT GRID -->
        <div class="col-lg-9">
          <div class="sort-bar">
            <span class="results-count"><strong>248</strong> events found</span>
            <div class="d-flex align-items-center gap-2">
              <label class="text-muted" style="font-size:0.85rem;white-space:nowrap;">Sort by:</label>
              <select class="form-select form-select-sm" style="width:auto;border-radius:var(--radius-full);">
                <option>Newest</option>
                <option>Price: Low to High</option>
                <option>Price: High to Low</option>
                <option>Most Popular</option>
              </select>
              <div class="d-none d-md-flex gap-1">
                <button class="btn btn-sm btn-outline-secondary rounded" title="Grid View"><i class="bi bi-grid-3x3-gap-fill"></i></button>
                <button class="btn btn-sm btn-outline-secondary rounded" title="List View"><i class="bi bi-list-ul"></i></button>
              </div>
            </div>
          </div>

          <div class="row g-4">
            <div class="col-md-6 col-xl-4">
              <div class="event-card">
                <div class="card-img-wrap"><img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=600" alt="Event"><span class="badge-price">$49</span></div>
                <div class="card-body">
                  <div class="event-category">Concert</div>
                  <h5 class="event-title">Summer Music Festival 2026</h5>
                  <div class="event-meta"><span><i class="bi bi-calendar3"></i> Mar 15, 2026</span><span><i class="bi bi-geo-alt"></i> Central Park, NYC</span></div>
                </div>
                <div class="card-footer"><div class="organizer"><div style="width:28px;height:28px;border-radius:50%;background:var(--gradient-primary);display:flex;align-items:center;justify-content:center;color:#fff;font-size:0.7rem;font-weight:700;">SM</div><span>SoundMax</span></div><a href="event-details.html" class="btn btn-sm btn-outline-primary-custom">View</a></div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4">
              <div class="event-card">
                <div class="card-img-wrap"><img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600" alt="Event"><span class="badge-price">$129</span></div>
                <div class="card-body">
                  <div class="event-category">Conference</div>
                  <h5 class="event-title">Tech Innovation Summit 2026</h5>
                  <div class="event-meta"><span><i class="bi bi-calendar3"></i> Apr 10, 2026</span><span><i class="bi bi-geo-alt"></i> Convention Center, SF</span></div>
                </div>
                <div class="card-footer"><div class="organizer"><div style="width:28px;height:28px;border-radius:50%;background:var(--gradient-accent);display:flex;align-items:center;justify-content:center;color:#1a1a2e;font-size:0.7rem;font-weight:700;">TI</div><span>TechInnovate</span></div><a href="event-details.html" class="btn btn-sm btn-outline-primary-custom">View</a></div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4">
              <div class="event-card">
                <div class="card-img-wrap"><img src="https://images.unsplash.com/photo-1475721027785-f74eccf877e2?w=600" alt="Event"><span class="badge-price">$35</span></div>
                <div class="card-body">
                  <div class="event-category">Workshop</div>
                  <h5 class="event-title">Creative Design Masterclass</h5>
                  <div class="event-meta"><span><i class="bi bi-calendar3"></i> Mar 22, 2026</span><span><i class="bi bi-geo-alt"></i> Art Studio, London</span></div>
                </div>
                <div class="card-footer"><div class="organizer"><div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#28a745,#20c997);display:flex;align-items:center;justify-content:center;color:#fff;font-size:0.7rem;font-weight:700;">CD</div><span>CreativeHub</span></div><a href="event-details.html" class="btn btn-sm btn-outline-primary-custom">View</a></div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4">
              <div class="event-card">
                <div class="card-img-wrap"><img src="https://images.unsplash.com/photo-1505373877841-8d25f7d46678?w=600" alt="Event"><span class="badge-price">Free</span></div>
                <div class="card-body">
                  <div class="event-category">Seminar</div>
                  <h5 class="event-title">AI & Future of Work Forum</h5>
                  <div class="event-meta"><span><i class="bi bi-calendar3"></i> Apr 5, 2026</span><span><i class="bi bi-geo-alt"></i> Digital Hall, Berlin</span></div>
                </div>
                <div class="card-footer"><div class="organizer"><div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#706127,#9a8a3c);display:flex;align-items:center;justify-content:center;color:#fff;font-size:0.7rem;font-weight:700;">FW</div><span>FutureWork</span></div><a href="event-details.html" class="btn btn-sm btn-outline-primary-custom">View</a></div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4">
              <div class="event-card">
                <div class="card-img-wrap"><img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=600" alt="Event"><span class="badge-price">$75</span></div>
                <div class="card-body">
                  <div class="event-category">Festival</div>
                  <h5 class="event-title">International Food & Culture Fest</h5>
                  <div class="event-meta"><span><i class="bi bi-calendar3"></i> May 1, 2026</span><span><i class="bi bi-geo-alt"></i> Harbor Park, Sydney</span></div>
                </div>
                <div class="card-footer"><div class="organizer"><div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#dc3545,#e85d04);display:flex;align-items:center;justify-content:center;color:#fff;font-size:0.7rem;font-weight:700;">FC</div><span>FestCulture</span></div><a href="event-details.html" class="btn btn-sm btn-outline-primary-custom">View</a></div>
              </div>
            </div>
            <div class="col-md-6 col-xl-4">
              <div class="event-card">
                <div class="card-img-wrap"><img src="https://images.unsplash.com/photo-1528605248644-14dd04022da1?w=600" alt="Event"><span class="badge-price">$25</span></div>
                <div class="card-body">
                  <div class="event-category">Workshop</div>
                  <h5 class="event-title">Startup Networking Meetup</h5>
                  <div class="event-meta"><span><i class="bi bi-calendar3"></i> Mar 28, 2026</span><span><i class="bi bi-geo-alt"></i> Co-Work Space, Dubai</span></div>
                </div>
                <div class="card-footer"><div class="organizer"><div style="width:28px;height:28px;border-radius:50%;background:linear-gradient(135deg,#17a2b8,#20c997);display:flex;align-items:center;justify-content:center;color:#fff;font-size:0.7rem;font-weight:700;">SN</div><span>StartNet</span></div><a href="event-details.html" class="btn btn-sm btn-outline-primary-custom">View</a></div>
              </div>
            </div>
          </div>

          <!-- Pagination -->
          <nav class="mt-4 d-flex justify-content-center">
            <ul class="pagination pagination-custom">
              <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-left"></i></a></li>
              <li class="page-item active"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item"><a class="page-link" href="#">...</a></li>
              <li class="page-item"><a class="page-link" href="#">12</a></li>
              <li class="page-item"><a class="page-link" href="#"><i class="bi bi-chevron-right"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </section>

@endsection