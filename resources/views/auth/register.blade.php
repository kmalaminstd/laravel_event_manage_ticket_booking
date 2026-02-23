<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register — EventHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

  <div class="auth-wrapper">
    <!-- LEFT: BRANDING -->
    <div class="auth-branding">
      <a href="index.html" class="footer-brand mb-4" style="font-size:2rem;">Event<span>Hub</span></a>
      <h2>Join EventHub</h2>
      <p>Create your account and start discovering events or managing your own in minutes.</p>
      <div class="mt-5 text-center" style="position:relative;z-index:2;">
        <div class="d-flex gap-4 justify-content-center">
          <div class="text-white text-center">
            <div style="width:50px;height:50px;border-radius:12px;background:rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 0.5rem;font-size:1.3rem;"><i class="bi bi-ticket-perforated"></i></div>
            <small>Book Tickets</small>
          </div>
          <div class="text-white text-center">
            <div style="width:50px;height:50px;border-radius:12px;background:rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 0.5rem;font-size:1.3rem;"><i class="bi bi-calendar-event"></i></div>
            <small>Create Events</small>
          </div>
          <div class="text-white text-center">
            <div style="width:50px;height:50px;border-radius:12px;background:rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 0.5rem;font-size:1.3rem;"><i class="bi bi-graph-up"></i></div>
            <small>Track Revenue</small>
          </div>
        </div>
      </div>
    </div>

    <!-- RIGHT: FORM -->
    <div class="auth-form-side">
      <div class="auth-form-card">
        <a href="index.html" class="d-lg-none footer-brand d-block mb-4" style="font-size:1.75rem;">Event<span>Hub</span></a>
        <h3>Create Account</h3>
        <p class="text-muted mb-4">Fill in your details to get started</p>

        <form method="POST" id="register_form_elm" action="/auth/store">
          @csrf

          @if($errors->any)
            <div>
                <ul class="list-disc list-inside space-y-1">
                    @foreach ($errors->all() as $error)
                        <li clas="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
          @endif

          <div class="mb-3">
            <label class="form-label">Full Name</label>
            <div class="input-group">
              <span class="input-group-text bg-transparent"><i class="bi bi-person"></i></span>
              <input type="text" name="name" class="form-control" placeholder="John Doe">
            </div>
            @error("name")
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="mb-3">
            <label class="form-label">Email Address</label>
            <div class="input-group">
              <span class="input-group-text bg-transparent"><i class="bi bi-envelope"></i></span>
              <input type="email" name="email" class="form-control" placeholder="you@example.com">
            </div>
            @error("email")
              <span class="text-danger">{{ $message }}</span>
            @enderror
          </div>
          <div class="row g-3 mb-3">
            <div class="col-md-6">
              <label class="form-label">Password</label>
              <div class="input-group">
                <span class="input-group-text bg-transparent"><i class="bi bi-lock"></i></span>
                <input type="password" name="password" class="form-control" placeholder="••••••••">
              </div>
              @error("password")
                <span class="text-danger">{{ $message }}</span>
              @enderror
            </div>
            <div class="col-md-6">
              <label class="form-label">Confirm Password</label>
              <div class="input-group">
                <span class="input-group-text bg-transparent"><i class="bi bi-lock-fill"></i></span>
                <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••">
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">I want to</label>
            <input type="hidden" name="role" id="role_input" value="user">
            <div class="toggle-group">
              <button type="button" onclick="" value="user" class="toggle-btn active">Attend Events</button>
              <button type="button" name="role" value="organizer" class="toggle-btn">Organize Events</button>
            </div>
          </div>
          <div class="form-check mb-4">
            <input class="form-check-input" type="checkbox" name="termsCondition" id="agreeTerms">
            <label class="form-check-label" for="agreeTerms" style="font-size:0.85rem;">
              I agree to the <a href="#" style="color:var(--primary);">Terms of Service</a> and <a href="#" style="color:var(--primary);">Privacy Policy</a>
            </label>
          </div>
          <button type="submit" class="btn btn-primary-custom w-100 py-3 mb-3" style="font-size:1rem;">
            <i class="bi bi-person-plus me-2"></i>Create Account
          </button>
        </form>

        <div class="auth-divider">or continue with</div>

        <div class="d-flex gap-2 mb-4">
          <a href="{{ url('/login/google') }}" class="auth-social-btn"><i class="bi bi-google" style="color:#ea4335;"></i> Google</a>
          {{-- <button class="auth-social-btn"><i class="bi bi-facebook" style="color:#1877f2;"></i> Facebook</button> --}}
        </div>

        <p class="text-center text-muted" style="font-size:0.9rem;">
          Already have an account? <a href="login.html" style="color:var(--primary);font-weight:600;">Sign In</a>
        </p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>
