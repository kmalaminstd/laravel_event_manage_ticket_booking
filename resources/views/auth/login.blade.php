<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login — EventHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>

  <div class="auth-wrapper">
    <!-- LEFT: BRANDING -->
    <div class="auth-branding">
      <a href="index.html" class="footer-brand mb-4" style="font-size:2rem;">Event<span>Hub</span></a>
      <h2>Welcome Back!</h2>
      <p>Log in to access your tickets, manage events, and discover amazing experiences near you.</p>
      <div class="hero-stats mt-5" style="gap:2rem;">
        <div class="stat-item text-center">
          <h3>10K+</h3>
          <p>Events</p>
        </div>
        <div class="stat-item text-center">
          <h3>50K+</h3>
          <p>Users</p>
        </div>
        <div class="stat-item text-center">
          <h3>99%</h3>
          <p>Happy</p>
        </div>
      </div>
    </div>

    <!-- RIGHT: FORM -->
    <div class="auth-form-side">
      <div class="auth-form-card">
        <a href="index.html" class="d-lg-none footer-brand d-block mb-4" style="font-size:1.75rem;">Event<span>Hub</span></a>
        <h3>Sign In</h3>
        <p class="text-muted mb-4">Enter your credentials to continue</p>

        <form method="POST" action="/auth/user-login">
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
                <label class="form-label">Email Address</label>
                <div class="input-group">
                <span class="input-group-text bg-transparent"><i class="bi bi-envelope"></i></span>
                <input name="email" type="email" class="form-control" placeholder="you@example.com">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                <span class="input-group-text bg-transparent"><i class="bi bi-lock"></i></span>
                <input name ="password" type="password" class="form-control" placeholder="••••••••">
                <button class="btn btn-outline-secondary border-start-0 border" type="button"><i class="bi bi-eye"></i></button>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                <input class="form-check-input" name="remember" type="checkbox" id="rememberMe">
                <label class="form-check-label" for="rememberMe" style="font-size:0.9rem;">Remember me</label>
                </div>
                <a href="forgot-password.html" style="font-size:0.9rem;color:var(--primary);font-weight:500;">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-primary-custom w-100 py-3 mb-3" style="font-size:1rem;">
                <i class="bi bi-box-arrow-in-right me-2"></i>Sign In
            </button>
        </form>

        <div class="auth-divider">or continue with</div>

        <div class="d-flex gap-2 mb-4">
          <a href="{{ url('/login/google') }}" class="auth-social-btn"><i class="bi bi-google" style="color:#ea4335;"></i> Google</a>
          {{-- <button class="auth-social-btn"><i class="bi bi-facebook" style="color:#1877f2;"></i> Facebook</button> --}}
        </div>

        <p class="text-center text-muted" style="font-size:0.9rem;">
          Don't have an account? <a href="/auth/register" style="color:var(--primary);font-weight:600;">Sign Up</a>
        </p>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
