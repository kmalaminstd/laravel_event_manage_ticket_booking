@extends('components.user-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Settings</h5>
            <p>Manage your account preferences</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="topbar-icon"><i class="bi bi-bell"></i></button>
    </div>
</div>

<div class="dashboard-content">
    <div class="settings-tabs">
        <ul class="nav nav-pills mb-4">
            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#profile">Profile</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#password">Change Password</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#notifications">Notifications</a></li>
        </ul>

        <div class="tab-content">
            <!-- PROFILE TAB -->
            <div class="tab-pane fade show active" id="profile">
                <div class="form-card" style="max-width:700px;">
                    <div class="d-flex align-items-center gap-3 mb-4 pb-4 border-bottom">
                        <div
                            style="width:80px;height:80px;border-radius:50%;background:var(--gradient-primary);display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.75rem;font-weight:700;">
                            JD</div>
                        <div>
                            <h5 class="mb-1">John Doe</h5>
                            <p class="text-muted mb-0" style="font-size:0.85rem;">john.doe@example.com</p>
                            <button class="btn btn-sm btn-outline-primary-custom mt-2">Change Photo</button>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" value="John">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" value="Doe">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" value="john.doe@example.com">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" value="+1 (555) 123-4567">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Bio</label>
                            <textarea class="form-control"
                                rows="3">Music enthusiast and conference lover. Always exploring new events.</textarea>
                        </div>
                    </div>
                    <button class="btn btn-primary-custom mt-4">Save Changes</button>
                </div>
            </div>

            <!-- PASSWORD TAB -->
            <div class="tab-pane fade" id="password">
                <div class="form-card" style="max-width:500px;">
                    <h5 class="mb-4">Change Password</h5>
                    <div class="mb-3">
                        <label class="form-label">Current Password</label>
                        <input type="password" class="form-control" placeholder="••••••••">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" placeholder="••••••••">
                        <div class="form-text">Must be at least 8 characters with a mix of letters and numbers.</div>
                    </div>
                    <div class="mb-4">
                        <label class="form-label">Confirm New Password</label>
                        <input type="password" class="form-control" placeholder="••••••••">
                    </div>
                    <button class="btn btn-primary-custom">Update Password</button>
                </div>
            </div>

            <!-- NOTIFICATIONS TAB -->
            <div class="tab-pane fade" id="notifications">
                <div class="form-card" style="max-width:600px;">
                    <h5 class="mb-4">Notification Preferences</h5>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>Email Notifications</h6>
                            <p>Receive email updates about your bookings</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>Event Reminders</h6>
                            <p>Get reminded 24 hours before your events</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>Promotional Emails</h6>
                            <p>Receive deals and new event recommendations</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox"></div>
                    </div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>Refund Updates</h6>
                            <p>Get notified about refund status changes</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <button class="btn btn-primary-custom mt-3">Save Preferences</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
