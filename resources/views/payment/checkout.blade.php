@extends('components.home-layout')

@section('content')

<section class="section-padding">
    <div class="container" style="max-width:960px;">
        <!-- STEP INDICATOR -->
        <div class="step-indicator">
            <div class="step completed" data-step="1">
                <span class="step-num"><i class="bi bi-check"></i></span>
                <span class="d-none d-sm-inline">Tickets</span>
            </div>
            <div class="step-line completed"></div>
            <div class="step active" data-step="2">
                <span class="step-num">2</span>
                <span class="d-none d-sm-inline">Details</span>
            </div>
            <div class="step-line"></div>
            <div class="step" data-step="3">
                <span class="step-num">3</span>
                <span class="d-none d-sm-inline">Payment</span>
            </div>
            <div class="step-line"></div>
            <div class="step" data-step="4">
                <span class="step-num">4</span>
                <span class="d-none d-sm-inline">Confirm</span>
            </div>
        </div>

        <div class="row g-4">
            <!-- LEFT: FORMS -->
            <div class="col-lg-7">
                <!-- Step 2: Details (Active) -->
                <div class="checkout-step-panel" data-step="2">
                    <!-- Ticket Summary -->
                    <div class="checkout-card">
                        <h5><i class="bi bi-ticket-perforated me-2" style="color:var(--accent);"></i>Selected Tickets
                        </h5>
                        <div class="d-flex justify-content-between align-items-center py-2 border-bottom">
                            <div>
                                <strong>General Admission</strong>
                                <div class="text-muted" style="font-size:0.85rem;">Summer Music Festival 2026</div>
                            </div>
                            <div class="text-end">
                                <div>1 × $49.00</div>
                                <strong>$49.00</strong>
                            </div>
                        </div>
                    </div>

                    <!-- Attendee Information -->
                    <div class="checkout-card">
                        <h5><i class="bi bi-person me-2" style="color:var(--accent);"></i>Attendee Information</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:0.9rem;">First Name</label>
                                <input type="text" class="form-control" placeholder="John"
                                    style="border-radius:var(--radius-sm);">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:0.9rem;">Last Name</label>
                                <input type="text" class="form-control" placeholder="Doe"
                                    style="border-radius:var(--radius-sm);">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:0.9rem;">Email</label>
                                <input type="email" class="form-control" placeholder="john@example.com"
                                    style="border-radius:var(--radius-sm);">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-semibold" style="font-size:0.9rem;">Phone</label>
                                <input type="tel" class="form-control" placeholder="+1 (555) 000-0000"
                                    style="border-radius:var(--radius-sm);">
                            </div>
                        </div>
                    </div>

                    <!-- Payment Method -->
                    <div class="checkout-card">
                        <h5><i class="bi bi-credit-card me-2" style="color:var(--accent);"></i>Payment Method</h5>
                        <div class="payment-methods">
                            <div class="method-option active d-flex align-items-center gap-3">
                                <input type="radio" name="payment" checked class="form-check-input">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-credit-card-2-front"
                                        style="font-size:1.3rem;color:var(--primary);"></i>
                                    <div>
                                        <strong style="font-size:0.9rem;">Credit / Debit Card</strong>
                                        <div class="text-muted" style="font-size:0.75rem;">Visa, Mastercard, Amex</div>
                                    </div>
                                </div>
                            </div>
                            <div class="method-option d-flex align-items-center gap-3">
                                <input type="radio" name="payment" class="form-check-input">
                                <div class="d-flex align-items-center gap-2">
                                    <i class="bi bi-paypal" style="font-size:1.3rem;color:#003087;"></i>
                                    <strong style="font-size:0.9rem;">PayPal</strong>
                                </div>
                            </div>
                        </div>

                        <!-- Stripe Card Mock -->
                        <div class="stripe-card-mock mt-3">
                            <div style="font-size:0.75rem;opacity:0.7;">CARD NUMBER</div>
                            <div class="card-number">4242 •••• •••• 4242</div>
                            <div class="row g-3">
                                <div class="col-6">
                                    <div style="font-size:0.7rem;opacity:0.7;">EXPIRY</div>
                                    <input type="text"
                                        class="form-control form-control-sm bg-transparent border-secondary text-white"
                                        placeholder="MM/YY" style="border-radius:6px;">
                                </div>
                                <div class="col-6">
                                    <div style="font-size:0.7rem;opacity:0.7;">CVC</div>
                                    <input type="text"
                                        class="form-control form-control-sm bg-transparent border-secondary text-white"
                                        placeholder="123" style="border-radius:6px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- RIGHT: ORDER SUMMARY -->
            <div class="col-lg-5">
                <div class="ticket-card">
                    <h4><i class="bi bi-receipt me-2" style="color:var(--accent);"></i>Order Summary</h4>

                    <div class="d-flex gap-3 align-items-center mb-3 pb-3 border-bottom">
                        <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?w=100" alt="Event"
                            style="width:60px;height:60px;border-radius:var(--radius-sm);object-fit:cover;">
                        <div>
                            <strong style="font-size:0.9rem;">Summer Music Festival 2026</strong>
                            <div class="text-muted" style="font-size:0.8rem;">Mar 15, 2026 · Central Park, NYC</div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between py-2" style="font-size:0.9rem;">
                        <span class="text-muted">1 × General Admission</span>
                        <span>$49.00</span>
                    </div>
                    <div class="d-flex justify-content-between py-2" style="font-size:0.9rem;">
                        <span class="text-muted">Service Fee</span>
                        <span>$4.90</span>
                    </div>
                    <div class="d-flex justify-content-between py-2" style="font-size:0.9rem;">
                        <span class="text-muted">Tax</span>
                        <span>$2.70</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <strong style="font-size:1.1rem;">Total</strong>
                        <strong style="font-size:1.35rem;color:var(--primary);">$56.60</strong>
                    </div>

                    <button class="btn btn-primary-custom w-100 py-3" style="font-size:1rem;"
                        onclick="window.location.href='order-confirmation.html'">
                        <i class="bi bi-lock me-2"></i>Pay $56.60
                    </button>

                    <div class="text-center mt-3">
                        <div class="d-flex justify-content-center gap-3"
                            style="font-size:0.8rem;color:var(--text-secondary);">
                            <span><i class="bi bi-shield-check me-1"></i>SSL Secure</span>
                            <span><i class="bi bi-arrow-counterclockwise me-1"></i>Refundable</span>
                            <span><i class="bi bi-lightning me-1"></i>Instant</span>
                        </div>
                    </div>

                    <div class="mt-3 p-2 rounded"
                        style="background:rgba(38,83,103,0.05);font-size:0.8rem;color:var(--text-secondary);">
                        <i class="bi bi-info-circle me-1"></i> By completing this purchase, you agree to our <a href="#"
                            style="color:var(--primary);">Terms of Service</a>.
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
