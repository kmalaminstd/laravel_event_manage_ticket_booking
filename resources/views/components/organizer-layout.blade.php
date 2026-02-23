<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Organizer Dashboard — EventHub</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0"></script>
</head>
<body>

  <div class="dashboard-wrapper">
    <!-- SIDEBAR -->
    <aside class="dashboard-sidebar">
      <div class="sidebar-brand">Event<span>Hub</span></div>
      <ul class="sidebar-menu">
        <li><a href="/organizer" class="active"><i class="bi bi-grid-1x2"></i> Dashboard</a></li>
        <li><a href="/organizer/create-event"><i class="bi bi-plus-circle"></i> Create Event</a></li>
        <li><a href="/organizer/my-events"><i class="bi bi-calendar-event"></i> My Events</a></li>
        <li><a href="/organizer/orders"><i class="bi bi-receipt"></i> Orders</a></li>
        <li><a href="/organizer/attendees"><i class="bi bi-people"></i> Attendees</a></li>
        <li><a href="/organizer/qr-scanner"><i class="bi bi-qr-code-scan"></i> QR Scanner</a></li>
        <li><a href="/organizer/analytics"><i class="bi bi-bar-chart-line"></i> Analytics</a></li>
        <li><a href="/organizer/refunds"><i class="bi bi-arrow-counterclockwise"></i> Refunds</a></li>
        <li><a href="/organizer/settings"><i class="bi bi-gear"></i> Settings</a></li>
        <li style="margin-top:auto;border-top:1px solid rgba(255,255,255,0.08);padding-top:0.5rem;"><a href="/"><i class="bi bi-house"></i> Back to Home</a></li>
      </ul>
      <div class="sidebar-footer"><div class="user-info"><div class="user-avatar">SM</div><div><div class="user-name">SoundMax Pro</div><div class="user-role">Organizer</div></div></div></div>
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
