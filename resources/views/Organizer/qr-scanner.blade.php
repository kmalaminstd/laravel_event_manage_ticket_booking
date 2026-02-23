@extends('components.organizer-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>QR Scanner</h5>
            <p>Scan tickets for check-in</p>
        </div>
    </div>
    <div class="topbar-right">
        <select class="form-select form-select-sm" style="width:auto;border-radius:var(--radius-full);">
            <option>Summer Music Festival</option>
            <option>Tech Innovation Summit</option>
        </select>
    </div>
</div>

<div class="dashboard-content">
    <div class="row g-4">
        <!-- SCANNER -->
        <div class="col-lg-7">
            <div class="dashboard-card text-center">
                <h5 class="mb-3">Camera Scanner</h5>
                <div
                    style="width:100%;max-width:400px;height:350px;background:#1a1a2e;border-radius:var(--radius-md);margin:0 auto;display:flex;align-items:center;justify-content:center;position:relative;overflow:hidden;">
                    <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;">
                        <div
                            style="width:200px;height:200px;border:3px solid rgba(255,255,255,0.3);border-radius:12px;position:relative;">
                            <div
                                style="position:absolute;top:-2px;left:-2px;width:30px;height:30px;border-top:4px solid var(--accent);border-left:4px solid var(--accent);border-radius:6px 0 0 0;">
                            </div>
                            <div
                                style="position:absolute;top:-2px;right:-2px;width:30px;height:30px;border-top:4px solid var(--accent);border-right:4px solid var(--accent);border-radius:0 6px 0 0;">
                            </div>
                            <div
                                style="position:absolute;bottom:-2px;left:-2px;width:30px;height:30px;border-bottom:4px solid var(--accent);border-left:4px solid var(--accent);border-radius:0 0 0 6px;">
                            </div>
                            <div
                                style="position:absolute;bottom:-2px;right:-2px;width:30px;height:30px;border-bottom:4px solid var(--accent);border-right:4px solid var(--accent);border-radius:0 0 6px 0;">
                            </div>
                        </div>
                    </div>
                    <div style="color:rgba(255,255,255,0.5);z-index:1;">
                        <i class="bi bi-camera-video" style="font-size:3rem;display:block;"></i>
                        <p class="mt-2 mb-0" style="font-size:0.9rem;">Click to activate camera</p>
                    </div>
                </div>
                <div class="d-flex gap-2 justify-content-center mt-3">
                    <button class="btn btn-primary-custom"><i class="bi bi-camera-video me-2"></i>Start Scanner</button>
                    <button class="btn btn-accent"><i class="bi bi-input-cursor-text me-2"></i>Enter Code</button>
                </div>
            </div>

            <!-- MANUAL ENTRY -->
            <div class="dashboard-card mt-3">
                <h5 class="mb-3">Manual Entry</h5>
                <div class="input-group">
                    <span class="input-group-text bg-transparent"><i class="bi bi-upc-scan"></i></span>
                    <input type="text" class="form-control"
                        placeholder="Enter ticket code (e.g., EVT-2026-00847-GA-001)">
                    <button class="btn btn-primary-custom">Verify</button>
                </div>
            </div>
        </div>

        <!-- SCAN RESULT & RECENT -->
        <div class="col-lg-5">
            <!-- Scan Result Mock -->
            <div class="dashboard-card border-start border-4 border-success mb-3">
                <div class="d-flex align-items-center gap-2 mb-3"><i class="bi bi-check-circle-fill text-success"
                        style="font-size:1.5rem;"></i>
                    <h5 class="mb-0">Valid Ticket</h5>
                </div>
                <div class="p-3 rounded" style="background:var(--light-bg);">
                    <div class="d-flex justify-content-between py-1"><span class="text-muted">Name</span><strong>Sarah
                            Johnson</strong></div>
                    <div class="d-flex justify-content-between py-1"><span class="text-muted">Ticket</span><span>General
                            Admission</span></div>
                    <div class="d-flex justify-content-between py-1"><span
                            class="text-muted">Order</span><span>#ORD-4821</span></div>
                    <div class="d-flex justify-content-between py-1"><span class="text-muted">Status</span><span
                            class="status-badge active">Valid</span></div>
                </div>
                <button class="btn btn-primary-custom w-100 mt-3"><i class="bi bi-check-lg me-2"></i>Confirm
                    Check-In</button>
            </div>

            <!-- Recent Scans -->
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Recent Scans</h5><span class="text-muted" style="font-size:0.8rem;">Last 5</span>
                </div>
                <div class="d-flex flex-column gap-2">
                    <div class="d-flex justify-content-between align-items-center p-2 rounded"
                        style="background:var(--light-bg);">
                        <div><strong style="font-size:0.85rem;">Sarah Johnson</strong>
                            <div class="text-muted" style="font-size:0.75rem;">General · 2:45 PM</div>
                        </div><i class="bi bi-check-circle-fill text-success"></i>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-2 rounded"
                        style="background:var(--light-bg);">
                        <div><strong style="font-size:0.85rem;">Mike Chen</strong>
                            <div class="text-muted" style="font-size:0.75rem;">VIP · 2:42 PM</div>
                        </div><i class="bi bi-check-circle-fill text-success"></i>
                    </div>
                    <div class="d-flex justify-content-between align-items-center p-2 rounded"
                        style="background:rgba(220,53,69,0.05);">
                        <div><strong style="font-size:0.85rem;">Unknown Ticket</strong>
                            <div class="text-muted" style="font-size:0.75rem;">Invalid · 2:38 PM</div>
                        </div><i class="bi bi-x-circle-fill text-danger"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
