@extends('components.admin-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Settings</h5>
            <p>Platform configuration & preferences</p>
        </div>
    </div>
</div>

<div class="dashboard-content">
    <div class="settings-tabs">
        <ul class="nav nav-pills mb-4">
            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#general">General</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#payment">Payment</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#email">Email</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#security">Security</a></li>
        </ul>

        <div class="tab-content">
            <!-- GENERAL -->
            <div class="tab-pane fade show active" id="general">
                <div class="form-card" style="max-width:700px;">
                    <h5 class="mb-4">General Settings</h5>
                    <div class="row g-3">
                        <div class="col-md-6"><label class="form-label">Site Name</label><input type="text"
                                class="form-control" value="EventHub"></div>
                        <div class="col-md-6"><label class="form-label">Contact Email</label><input type="email"
                                class="form-control" value="admin@eventhub.com"></div>
                        <div class="col-md-6"><label class="form-label">Default Currency</label><select
                                class="form-select">
                                <option>USD ($)</option>
                                <option>EUR (€)</option>
                                <option>GBP (£)</option>
                            </select></div>
                        <div class="col-md-6"><label class="form-label">Timezone</label><select class="form-select">
                                <option>UTC (UTC+0)</option>
                                <option>EST (UTC-5)</option>
                                <option>PST (UTC-8)</option>
                            </select></div>
                        <div class="col-12"><label class="form-label">Site Description</label><textarea
                                class="form-control"
                                rows="3">Discover and book tickets for amazing events near you.</textarea></div>
                    </div>
                    <button class="btn btn-primary-custom mt-4">Save Changes</button>
                </div>
            </div>

            <!-- PAYMENT -->
            <div class="tab-pane fade" id="payment">
                <div class="form-card" style="max-width:600px;">
                    <h5 class="mb-4">Payment Configuration</h5>
                    <div class="mb-3"><label class="form-label">Payment Gateway</label><select class="form-select">
                            <option>Stripe</option>
                            <option>PayPal</option>
                            <option>Both</option>
                        </select></div>
                    <div class="mb-3"><label class="form-label">Platform Fee (%)</label><input type="number"
                            class="form-control" value="10"></div>
                    <div class="mb-3"><label class="form-label">Stripe API Key</label><input type="text"
                            class="form-control" value="sk_test_••••••••••••"></div>
                    <div class="mb-3"><label class="form-label">PayPal Client ID</label><input type="text"
                            class="form-control" value="AX••••••••••••"></div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>Auto-approve Refunds Under $50</h6>
                            <p>Automatically process refunds below the threshold</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox"></div>
                    </div>
                    <button class="btn btn-primary-custom mt-3">Update Payment Settings</button>
                </div>
            </div>

            <!-- EMAIL -->
            <div class="tab-pane fade" id="email">
                <div class="form-card" style="max-width:600px;">
                    <h5 class="mb-4">Email Settings</h5>
                    <div class="mb-3"><label class="form-label">SMTP Host</label><input type="text" class="form-control"
                            value="smtp.mailtrap.io"></div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6"><label class="form-label">SMTP Port</label><input type="number"
                                class="form-control" value="587"></div>
                        <div class="col-md-6"><label class="form-label">Encryption</label><select class="form-select">
                                <option>TLS</option>
                                <option>SSL</option>
                                <option>None</option>
                            </select></div>
                    </div>
                    <div class="mb-3"><label class="form-label">SMTP Username</label><input type="text"
                            class="form-control" value="admin@eventhub.com"></div>
                    <div class="mb-3"><label class="form-label">SMTP Password</label><input type="password"
                            class="form-control" value="••••••••"></div>
                    <div class="mb-3"><label class="form-label">From Address</label><input type="email"
                            class="form-control" value="noreply@eventhub.com"></div>
                    <button class="btn btn-primary-custom">Save Email Settings</button>
                </div>
            </div>

            <!-- SECURITY -->
            <div class="tab-pane fade" id="security">
                <div class="form-card" style="max-width:600px;">
                    <h5 class="mb-4">Security Settings</h5>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>Two-Factor Authentication</h6>
                            <p>Require 2FA for admin accounts</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>Force Password Change</h6>
                            <p>Require password change every 90 days</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>Login Rate Limiting</h6>
                            <p>Limit login attempts to 5 per 15 minutes</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>IP Whitelisting</h6>
                            <p>Restrict admin access to specific IPs</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox"></div>
                    </div>
                    <div class="mb-3 mt-3"><label class="form-label">Session Timeout (minutes)</label><input
                            type="number" class="form-control" value="30" style="max-width:200px;"></div>
                    <button class="btn btn-primary-custom">Save Security Settings</button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
