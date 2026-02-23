@extends('components.home-layout')

@section('content')

<div class="auth-wrapper">
    <!-- LEFT: BRANDING -->
    <div class="auth-branding">
        <a href="index.html" class="footer-brand mb-4" style="font-size:2rem;">Event<span>Hub</span></a>
        <h2>Reset Password</h2>
        <p>Don't worry, it happens to the best of us. Enter your email and we'll send you a link to reset your password.
        </p>
        <div style="position:relative;z-index:2;margin-top:3rem;">
            <div
                style="width:80px;height:80px;border-radius:50%;background:rgba(255,255,255,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto;font-size:2.5rem;color:#fff;">
                <i class="bi bi-key"></i>
            </div>
        </div>
    </div>

    <!-- RIGHT: FORM -->
    <div class="auth-form-side">
        <div class="auth-form-card">
            <a href="index.html" class="d-lg-none footer-brand d-block mb-4"
                style="font-size:1.75rem;">Event<span>Hub</span></a>
            <div class="text-center mb-4">
                <div
                    style="width:70px;height:70px;border-radius:50%;background:rgba(38,83,103,0.1);display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;font-size:2rem;color:var(--primary);">
                    <i class="bi bi-envelope-paper"></i>
                </div>
                <h3>Forgot Password?</h3>
                <p class="text-muted">Enter your email address and we'll send you instructions to reset your password.
                </p>
            </div>

            <form>
                <div class="mb-4">
                    <label class="form-label">Email Address</label>
                    <div class="input-group">
                        <span class="input-group-text bg-transparent"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" placeholder="you@example.com">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary-custom w-100 py-3 mb-3" style="font-size:1rem;">
                    <i class="bi bi-send me-2"></i>Send Reset Link
                </button>
            </form>

            <p class="text-center mt-3" style="font-size:0.9rem;">
                <a href="login.html" style="color:var(--primary);font-weight:500;"><i class="bi bi-arrow-left me-1"></i>
                    Back to Login</a>
            </p>
        </div>
    </div>
</div>

@endsection
