@extends('components.home-layout')

@section('content')


<section class="confirmation-wrapper section-padding">
    <div class="container">
      <div class="confirmation-card mx-auto">
        <!-- Success Animation -->
        <div class="success-icon">
          <i class="bi bi-check-lg"></i>
        </div>
        <h2 class="mb-2" style="color:var(--danger);">Booking Cancelled!</h2>
        <p class="text-muted mb-4">Your tickets have been booked successfully. A confirmation email has been sent to your inbox.</p>

      </div>
    </div>
</section>




@endsection