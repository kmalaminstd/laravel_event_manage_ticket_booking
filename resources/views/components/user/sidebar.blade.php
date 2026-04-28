<aside class="dashboard-sidebar">
    <div class="sidebar-brand">Event<span>Hub</span></div>
    <ul class="sidebar-menu">
        <li><a href="/user" class="{{ request()->is('user') ? 'active' : '' }}"><i class="bi bi-grid-1x2"></i> Dashboard</a></li>
        <li><a href="/user/tickets" class="{{ request()->is('user/tickets') ? 'active' : '' }}"><i class="bi bi-ticket-perforated"></i> My Tickets</a></li>
        <li><a href="/user/refund-request" class="{{ request()->is('user/refund-request') ? "active" : "" }}"><i class="bi bi-arrow-counterclockwise"></i> Refund Requests</a></li>
        <li><a href="/user/settings" class="{{ request()->is('user/settings') ? "active" : "" }}"><i class="bi bi-gear"></i> Settings</a></li>
        <li style="margin-top:auto;border-top:1px solid rgba(255,255,255,0.08);padding-top:0.5rem;">
            <a href="/events"><i class="bi bi-compass"></i> Browse Events</a>
        </li>
        <li><a href="/"><i class="bi bi-house"></i> Back to Home</a></li>
    </ul>
    <div class="sidebar-footer">
        <div class="user-info">
            <div class="user-avatar">JD</div>
            <div>
                <div class="user-name">John Doe</div>
                <div class="user-role">Attendee</div>
            </div>
        </div>
    </div>
</aside>
<div class="sidebar-overlay"></div>
