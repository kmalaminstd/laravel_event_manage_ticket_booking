@extends('components.home-layout')

@section('content')


<section class="confirmation-wrapper section-padding">
    <div class="container">
      <div class="confirmation-card mx-auto">
        <!-- Success Animation -->
        <div class="success-icon">
          <i class="bi bi-check-lg"></i>
        </div>
        <h2 class="mb-2" style="color:var(--success);">Booking Confirmed!</h2>
        <p class="text-muted mb-4">Your tickets have been booked successfully. A confirmation email has been sent to your inbox.</p>

        <!-- Order ID -->
        <div class="d-inline-block px-4 py-2 rounded-pill mb-4" style="background:rgba(38,83,103,0.08);font-weight:700;color:var(--primary);">
          Order ID: #EVT-2026-00847
        </div>

        <!-- Event Info -->
        <div class="text-start p-3 rounded mb-4" style="background:var(--light-bg);border-radius:var(--radius-sm);">
          <div class="d-flex gap-3 align-items-center">
            <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=100" alt="Event" style="width:60px;height:60px;border-radius:var(--radius-sm);object-fit:cover;">
            <div>
              <strong>Summer Music Festival 2026</strong>
              <div class="text-muted" style="font-size:0.85rem;">Mar 15, 2026 · 6:00 PM · Central Park, NYC</div>
              <div style="font-size:0.85rem;">1× General Admission · <strong style="color:var(--primary);">$56.60</strong></div>
            </div>
          </div>
        </div>

        <!-- QR Code -->
        <div class="qr-preview">
          <div class="qr-code-container" data-value="EVT-2026-00847-GA-001"></div>
        </div>

        <!-- Actions -->
        <div class="d-flex flex-column gap-2 mt-4">
          <button class="btn btn-primary-custom py-2">
            <i class="bi bi-download me-2"></i>Download PDF Ticket
          </button>
          <div class="d-flex gap-2 justify-content-center">
            <button class="btn btn-outline-primary-custom flex-fill">
              <i class="bi bi-google me-1"></i> Google Calendar
            </button>
            <button class="btn btn-outline-primary-custom flex-fill">
              <i class="bi bi-apple me-1"></i> Apple Calendar
            </button>
          </div>
          <a href="user-tickets.html" class="btn btn-accent py-2 mt-2">
            <i class="bi bi-ticket-perforated me-2"></i>View My Tickets
          </a>
        </div>
      </div>
    </div>
</section>




@endsection