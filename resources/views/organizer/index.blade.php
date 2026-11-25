@extends('components.organizer-layout')

@section('content')

<div class="dashboard-topbar">
    <div class="topbar-left">
        <button class="sidebar-toggle"><i class="bi bi-list"></i></button>
        <div class="topbar-title">
            <h5>Organizer Dashboard</h5>
            <p>Welcome back! Here's your overview 📊</p>
        </div>
    </div>
    <div class="topbar-right">
        <button class="topbar-icon"><i class="bi bi-bell"></i><span class="badge-dot"></span></button>
        <a href="/organizer/create-event" class="btn btn-sm btn-primary-custom d-none d-md-inline-flex"><i
                class="bi bi-plus me-1"></i>
                 New Event</a>
    </div>
</div>

<div class="dashboard-content">
    <!-- STAT CARDS -->
    <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card primary">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Total Revenue</div>
                        <h3>$ {{ $totalRevenue }}</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 18% this
                            month</span>
                    </div>
                    <div class="stat-icon primary"><i class="bi bi-currency-dollar"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card success">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Tickets Sold</div>
                        <h3>{{ $totalTickets }}</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 24% this month</span>
                    </div>
                    <div class="stat-icon success"><i class="bi bi-ticket-perforated"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card warning">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Active Events</div>
                        <h3>{{ $totalEvents }}</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 2 new</span>
                    </div>
                    <div class="stat-icon warning"><i class="bi bi-calendar-event"></i></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="stat-card info">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <div class="stat-label">Conversion Rate</div>
                        <h3>68%</h3><span class="stat-change up"><i class="bi bi-arrow-up"></i> 5% improve</span>
                    </div>
                    <div class="stat-icon info"><i class="bi bi-graph-up-arrow"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- CHARTS -->
    <div class="row g-4">
        <div class="col-lg-12">
            <div class="dashboard-card">
                <div class="card-header-custom">
                    <h5>Revenue Overview</h5>
                    <select class="form-select form-select-sm" style="width:auto;border-radius:var(--radius-full);">
                        <option>Last 12 Months</option>
                        <option>Last 6 Months</option>
                    </select>
                </div>
                <div style="height:300px;"><canvas id="orgRevenue" data-label="Revenue"></canvas></div>
            </div>
        </div>
    </div>

    <!-- RECENT ORDERS -->
    <div class="dashboard-card mt-4">
        <div class="card-header-custom">
            <h5>Recent Orders</h5>
            <a href="organizer-orders.html" class="text-decoration-none" style="font-size:0.85rem;color:var(--primary);">View all</a>
        </div>
        <div class="table-responsive">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Buyer</th>
                        <th>Event</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($recentOrders as $order)
                    {{-- {{ dd($order) }}                        --}}
                        <tr>
                            <td><strong>{{ $order->order_code }}</strong></td>
                            <td>{{ $order->user->name }}</td>
                            <td>{{ $order->event->name }}</td>
                            <td>${{ $order->amount }}</td>
                            <td><span class="status-badge completed">{{ $order->status }}</span></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>

@push("js")
    <script>
        // --- Initialize Charts (if Chart.js is loaded) ---
        if (typeof Chart !== 'undefined') {
            Chart.defaults.font.family = "'Inter', sans-serif";
            Chart.defaults.color = '#6c757d';

            // --- Revenue Overview Chart (Admin) ---
            const revenueCtx = document.getElementById('orgRevenue');
            if (revenueCtx) {
            new Chart(revenueCtx, {
                type: 'line',
                data: {
                labels: @json($monthlyRevenue['labels']),
                datasets: [
                    {
                    label: 'Revenue',
                    data: @json($monthlyRevenue['data']),
                    borderColor: '#265367',
                    backgroundColor: 'rgba(38,83,103,0.1)',
                    fill: true,
                    tension: 0.4,
                    borderWidth: 2.5
                    },
                ]
                },
                options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom', labels: { padding: 15, usePointStyle: true } }
                },
                scales: {
                    y: {
                    beginAtZero: true,
                    grid: { color: 'rgba(0,0,0,0.05)' },
                    // ticks: { callback: v => '$' + (v / 1000) + 'k' }
                    },
                    x: { grid: { display: true } }
                }
                }
            });
            }
        }
    </script>
@endpush

@endsection
