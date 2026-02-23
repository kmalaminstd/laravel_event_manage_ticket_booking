<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard — EventHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>
</head>
<body>

    <div class="dashboard-wrapper">
        
        <aside class="dashboard-sidebar admin-sidebar">

            <div class="sidebar-brand">Event<span>Hub</span> <small style="font-size:0.5em;opacity:0.6;display:block;">Admin Panel</small></div>
                <ul class="sidebar-menu">
                    <li><a href="/admin" class="active"><i class="bi bi-grid-1x2"></i> Dashboard</a></li>
                    <li><a href="/admin/manage-users"><i class="bi bi-people"></i> Manage Users</a></li>
                    <li><a href="/admin/manage-events"><i class="bi bi-calendar-event"></i> Manage Events</a></li>
                    <li><a href="admin-all-orders.html"><i class="bi bi-receipt"></i> All Orders</a></li>
                    <li><a href="/admin/reports"><i class="bi bi-file-bar-graph"></i> Reports</a></li>
                    <li><a href="/admin/global-refunds"><i class="bi bi-arrow-counterclockwise"></i> Global Refunds</a></li>
                    <li><a href="/admin/categories"><i class="bi bi-tag"></i> Categories</a></li>
                    <li><a href="/admin/settings"><i class="bi bi-gear"></i> Settings</a></li>
                    <li style="margin-top:auto;border-top:1px solid rgba(255,255,255,0.08);padding-top:0.5rem;"><a href="/"><i class="bi bi-house"></i> Back to Site</a></li>
                </ul>
            <div class="sidebar-footer"><div class="user-info"><div class="user-avatar" style="background:var(--gradient-accent);color:#1a1a2e;">AD</div><div><div class="user-name">Admin User</div><div class="user-role">Super Admin</div></div></div></div>

        </aside>
        <div class="sidebar-overlay"></div>

        <main class="dashboard-main">

            

            @yield('content')

        </main>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>
</html>