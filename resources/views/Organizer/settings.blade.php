@extends('components.organizer-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Settings</h5>
            <p>Manage your organizer profile</p>
        </div>
    </div>
</div>

<div class="dashboard-content">
    <div class="settings-tabs">
        <ul class="nav nav-pills mb-4">
            <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#orgProfile">Organization</a>
            </li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#orgPayout">Payout</a></li>
            <li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#orgNotif">Notifications</a></li>
        </ul>

        <div class="tab-content">
            <!-- ORGANIZATION TAB -->
            <div class="tab-pane fade show active" id="orgProfile">
                <div class="form-card" style="max-width:700px;">
                    {{-- {{ dd($user) }} --}}
                    <x-forms.form method="POST" action="organizer" action="/organizer/org-info/{{ $user->id }}/update" enctype="multipart/form-data">
                        @method("PATCH")
                        <div class="d-flex align-items-center gap-3 mb-4 pb-4 border-bottom overflow-hidden">
                            <div style="width:80px;height:80px;border-radius:var(--radius-md);background:var(--gradient-primary);display:flex;align-items:center;justify-content:center;color:#fff;font-size:1.75rem;font-weight:700;">
                                @if ($user->media_id && Storage::disk('public')->exists($user->media->src))
                                    <img src="{{ asset('/storage/' . $user->media->src) }}" style="height: 100%; width: 100%; object-fit: cover;"/>
                                @else
                                    IMG
                                @endif
                            </div>
                            <div>
                                <h5 class="mb-1">{{ $user->name }}</h5>
                                <p class="text-muted mb-0" style="font-size:0.85rem;">Verified Organizer · Since 2024</p>
                                <input type="file" accept="image/*" name="media" id="media" hidden />
                                <label class="btn btn-sm btn-outline-primary-custom mt-2" for="media">Change Logo</label>
                            </div>
                        </div>
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label">Organization Name</label><input type="text" class="form-control" name="name" value="{{ $user->name }}"></div>
                            <div class="col-md-6"><label class="form-label">Contact Email</label><input type="email" class="form-control" value="{{ $user->email }}"></div>
                            <div class="col-md-6"><label class="form-label">Phone</label><input type="tel" class="form-control" name="phone" value="{{ $user->phone }}"></div>
                            <div class="col-md-6"><label class="form-label">Website</label><input type="url" name="website" class="form-control" value="{{ $user->website }}"></div>
                            <div class="col-12"><label class="form-label">About</label><textarea class="form-control" name="about" rows="3">{{ $user->about }}</textarea>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary-custom mt-4">Save Changes</button>
                    </x-forms.form>
                </div>
            </div>

            <!-- PAYOUT TAB -->
            <div class="tab-pane fade" id="orgPayout">
                <div class="form-card" style="max-width:600px;">
                    <h5 class="mb-4">Payout Settings</h5>
                    <div class="p-3 rounded mb-4" style="background:rgba(38,83,103,0.06);">
                        <div class="d-flex justify-content-between mb-2"><span class="text-muted">Available
                                Balance</span><strong
                                style="font-size:1.25rem;color:var(--primary);">$18,240.00</strong></div>
                        <div class="d-flex justify-content-between"><span class="text-muted">Next Payout</span><span>Feb
                                25, 2026</span></div>
                    </div>
                    <div class="mb-3"><label class="form-label">Payout Method</label>
                        <select class="form-select">
                            <option>Bank Transfer (ACH)</option>
                            <option>PayPal</option>
                            <option>Stripe Connect</option>
                        </select>
                    </div>
                    <div class="mb-3"><label class="form-label">Bank Name</label><input type="text" class="form-control"
                            value="Chase Bank"></div>
                    <div class="row g-3 mb-3">
                        <div class="col-md-6"><label class="form-label">Account Number</label><input type="text"
                                class="form-control" value="••••••••4521"></div>
                        <div class="col-md-6"><label class="form-label">Routing Number</label><input type="text"
                                class="form-control" value="••••••189"></div>
                    </div>
                    <button class="btn btn-primary-custom">Update Payout Info</button>
                </div>
            </div>

            <!-- NOTIFICATIONS TAB -->
            <div class="tab-pane fade" id="orgNotif">
                <div class="form-card" style="max-width:600px;">
                    <h5 class="mb-4">Notification Preferences</h5>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>New Order Alerts</h6>
                            <p>Get notified for every ticket purchase</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>Refund Requests</h6>
                            <p>Alerts for incoming refund requests</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>Weekly Summary</h6>
                            <p>Weekly performance report via email</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox" checked>
                        </div>
                    </div>
                    <div class="setting-item">
                        <div class="setting-info">
                            <h6>Marketing Tips</h6>
                            <p>Tips to improve your event reach</p>
                        </div>
                        <div class="form-check form-switch"><input class="form-check-input" type="checkbox"></div>
                    </div>
                    <button class="btn btn-primary-custom mt-3">Save Preferences</button>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
