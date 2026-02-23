/* ===================================================
   EVENT MANAGEMENT — SHARED JAVASCRIPT
   =================================================== */

document.addEventListener('DOMContentLoaded', function () {

  // --- Navbar scroll effect ---
  const navbar = document.querySelector('.main-navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      navbar.classList.toggle('scrolled', window.scrollY > 50);
    });
  }

  // --- Sidebar toggle ---
  const sidebarToggle = document.querySelector('.sidebar-toggle');
  const sidebar = document.querySelector('.dashboard-sidebar');
  const overlay = document.querySelector('.sidebar-overlay');

  if (sidebarToggle && sidebar) {
    sidebarToggle.addEventListener('click', () => {
      sidebar.classList.toggle('open');
      if (overlay) overlay.classList.toggle('show');
    });

    if (overlay) {
      overlay.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
      });
    }
  }

  // --- Quantity selectors ---
  document.querySelectorAll('.quantity-selector').forEach(selector => {
    const minusBtn = selector.querySelector('.qty-minus');
    const plusBtn = selector.querySelector('.qty-plus');
    const display = selector.querySelector('.qty-value');

    if (minusBtn && plusBtn && display) {
      minusBtn.addEventListener('click', () => {
        let val = parseInt(display.textContent);
        if (val > 0) {
          display.textContent = val - 1;
          updateTotal();
        }
      });

      plusBtn.addEventListener('click', () => {
        let val = parseInt(display.textContent);
        display.textContent = val + 1;
        updateTotal();
      });
    }
  });

  // --- Update total price ---
  function updateTotal() {
    let total = 0;
    document.querySelectorAll('.ticket-tier').forEach(tier => {
      const price = parseFloat(tier.dataset.price) || 0;
      const qtyEl = tier.querySelector('.qty-value');
      const qty = qtyEl ? parseInt(qtyEl.textContent) : 0;
      total += price * qty;
    });
    const totalEl = document.querySelector('.total-price');
    if (totalEl) totalEl.textContent = '$' + total.toFixed(2);
  }

  // --- Ticket tier selection ---
  document.querySelectorAll('.ticket-tier').forEach(tier => {
    tier.addEventListener('click', function (e) {
      if (e.target.closest('.quantity-selector')) return;
      document.querySelectorAll('.ticket-tier').forEach(t => t.classList.remove('selected'));
      this.classList.add('selected');
    });
  });

  // --- Toggle group (Free/Paid filter) ---
  document.querySelectorAll('.toggle-group .toggle-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      this.parentElement.querySelectorAll('.toggle-btn').forEach(b => b.classList.remove('active'));
      this.classList.add('active');
    });
  });

  // --- Price range slider ---
  const priceSlider = document.getElementById('priceRange');
  const priceDisplay = document.getElementById('priceValue');
  if (priceSlider && priceDisplay) {
    priceSlider.addEventListener('input', () => {
      priceDisplay.textContent = '$0 - $' + priceSlider.value;
    });
  }

  // --- Step indicator (checkout) ---
  document.querySelectorAll('.step-nav-btn').forEach(btn => {
    btn.addEventListener('click', function () {
      const target = this.dataset.step;
      if (!target) return;

      // Update steps
      document.querySelectorAll('.step-indicator .step').forEach(s => {
        const stepNum = parseInt(s.dataset.step);
        const targetNum = parseInt(target);
        if (stepNum < targetNum) {
          s.classList.add('completed');
          s.classList.remove('active');
        } else if (stepNum === targetNum) {
          s.classList.add('active');
          s.classList.remove('completed');
        } else {
          s.classList.remove('active', 'completed');
        }
      });

      // Update step lines
      document.querySelectorAll('.step-line').forEach((line, i) => {
        line.classList.toggle('completed', i < parseInt(target) - 1);
      });

      // Show/hide panels
      document.querySelectorAll('.checkout-step-panel').forEach(panel => {
        panel.classList.toggle('d-none', panel.dataset.step !== target);
      });
    });
  });

  // --- Dynamic ticket tier add (Create Event) ---
  const addTierBtn = document.getElementById('addTierBtn');
  const tierContainer = document.getElementById('tierContainer');
  let tierCount = document.querySelectorAll('.ticket-tier-row').length;

  if (addTierBtn && tierContainer) {
    addTierBtn.addEventListener('click', () => {
      tierCount++;
      const tierHTML = `
        <div class="ticket-tier-row" id="tier-${tierCount}">
          <button type="button" class="remove-tier" onclick="this.closest('.ticket-tier-row').remove()">
            <i class="bi bi-x"></i>
          </button>
          <div class="row g-3">
            <div class="col-md-3">
              <label class="form-label">Tier Name</label>
              <input type="text" class="form-control" placeholder="e.g. VIP">
            </div>
            <div class="col-md-2">
              <label class="form-label">Price ($)</label>
              <input type="number" class="form-control" placeholder="0.00">
            </div>
            <div class="col-md-2">
              <label class="form-label">Quantity</label>
              <input type="number" class="form-control" placeholder="100">
            </div>
            <div class="col-md-5">
              <label class="form-label">Description</label>
              <input type="text" class="form-control" placeholder="What's included">
            </div>
          </div>
        </div>`;
      tierContainer.insertAdjacentHTML('beforeend', tierHTML);
    });
  }

  // --- Tabs active state ---
  document.querySelectorAll('.settings-tabs .nav-link').forEach(tab => {
    tab.addEventListener('click', function (e) {
      e.preventDefault();
      this.closest('.nav').querySelectorAll('.nav-link').forEach(t => t.classList.remove('active'));
      this.classList.add('active');
      const target = this.getAttribute('href');
      if (target) {
        document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('show', 'active'));
        const pane = document.querySelector(target);
        if (pane) pane.classList.add('show', 'active');
      }
    });
  });

  // --- Initialize Charts (if Chart.js is loaded) ---
  if (typeof Chart !== 'undefined') {
    Chart.defaults.font.family = "'Inter', sans-serif";
    Chart.defaults.color = '#6c757d';

    // --- Spending / Revenue Line Chart ---
    const lineCtx = document.getElementById('lineChart');
    if (lineCtx) {
      new Chart(lineCtx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [{
            label: lineCtx.dataset.label || 'Revenue',
            data: [1200, 1900, 1500, 2400, 2200, 3100, 2800, 3500, 3200, 4100, 3800, 4500],
            borderColor: '#265367',
            backgroundColor: 'rgba(38,83,103,0.1)',
            fill: true,
            tension: 0.4,
            pointBackgroundColor: '#265367',
            pointRadius: 4,
            pointHoverRadius: 6,
            borderWidth: 2.5
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: { legend: { display: false } },
          scales: {
            y: {
              beginAtZero: true,
              grid: { color: 'rgba(0,0,0,0.05)' },
              ticks: { callback: v => '$' + v }
            },
            x: { grid: { display: false } }
          }
        }
      });
    }

    // --- Pie Chart ---
    const pieCtx = document.getElementById('pieChart');
    if (pieCtx) {
      new Chart(pieCtx, {
        type: 'doughnut',
        data: {
          labels: ['General', 'VIP', 'Premium', 'Student'],
          datasets: [{
            data: [45, 25, 20, 10],
            backgroundColor: ['#265367', '#e8a838', '#3a7a94', '#706127'],
            borderWidth: 0,
            hoverOffset: 8
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          cutout: '65%',
          plugins: {
            legend: { position: 'bottom', labels: { padding: 15, usePointStyle: true } }
          }
        }
      });
    }

    // --- Bar Chart ---
    const barCtx = document.getElementById('barChart');
    if (barCtx) {
      new Chart(barCtx, {
        type: 'bar',
        data: {
          labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
          datasets: [{
            label: 'Active Users',
            data: [320, 450, 380, 520, 490, 680, 720],
            backgroundColor: 'rgba(38,83,103,0.7)',
            borderRadius: 6,
            borderSkipped: false
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: { legend: { display: false } },
          scales: {
            y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)' } },
            x: { grid: { display: false } }
          }
        }
      });
    }

    // --- Sales Over Time Chart ---
    const salesCtx = document.getElementById('salesChart');
    if (salesCtx) {
      new Chart(salesCtx, {
        type: 'line',
        data: {
          labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4', 'Week 5', 'Week 6'],
          datasets: [{
            label: 'Sales',
            data: [85, 120, 145, 200, 180, 250],
            borderColor: '#265367',
            backgroundColor: 'rgba(38,83,103,0.1)',
            fill: true,
            tension: 0.4,
            borderWidth: 2.5
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: { legend: { display: false } },
          scales: {
            y: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)' } },
            x: { grid: { display: false } }
          }
        }
      });
    }

    // --- Tier Performance Chart ---
    const tierCtx = document.getElementById('tierChart');
    if (tierCtx) {
      new Chart(tierCtx, {
        type: 'bar',
        data: {
          labels: ['General', 'VIP', 'Premium', 'Early Bird', 'Student'],
          datasets: [{
            label: 'Tickets Sold',
            data: [340, 180, 120, 250, 90],
            backgroundColor: ['#265367', '#e8a838', '#3a7a94', '#706127', '#9a8a3c'],
            borderRadius: 6,
            borderSkipped: false
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          indexAxis: 'y',
          plugins: { legend: { display: false } },
          scales: {
            x: { beginAtZero: true, grid: { color: 'rgba(0,0,0,0.05)' } },
            y: { grid: { display: false } }
          }
        }
      });
    }

    // --- Refund Rate Chart ---
    const refundCtx = document.getElementById('refundChart');
    if (refundCtx) {
      new Chart(refundCtx, {
        type: 'doughnut',
        data: {
          labels: ['Completed', 'Refunded', 'Pending'],
          datasets: [{
            data: [82, 12, 6],
            backgroundColor: ['#28a745', '#dc3545', '#ffc107'],
            borderWidth: 0,
            hoverOffset: 8
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          cutout: '65%',
          plugins: {
            legend: { position: 'bottom', labels: { padding: 15, usePointStyle: true } }
          }
        }
      });
    }

    // --- Traffic Source Chart ---
    const trafficCtx = document.getElementById('trafficChart');
    if (trafficCtx) {
      new Chart(trafficCtx, {
        type: 'doughnut',
        data: {
          labels: ['Direct', 'Social Media', 'Search', 'Referral', 'Email'],
          datasets: [{
            data: [35, 28, 22, 10, 5],
            backgroundColor: ['#265367', '#e8a838', '#3a7a94', '#706127', '#9a8a3c'],
            borderWidth: 0,
            hoverOffset: 8
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          cutout: '65%',
          plugins: {
            legend: { position: 'bottom', labels: { padding: 15, usePointStyle: true } }
          }
        }
      });
    }

    // --- Revenue Overview Chart (Admin) ---
    const revenueCtx = document.getElementById('revenueChart');
    if (revenueCtx) {
      new Chart(revenueCtx, {
        type: 'line',
        data: {
          labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
          datasets: [
            {
              label: 'Revenue',
              data: [5200, 7800, 6500, 9400, 8200, 11100, 10800, 13500, 12200, 15100, 13800, 16500],
              borderColor: '#265367',
              backgroundColor: 'rgba(38,83,103,0.1)',
              fill: true,
              tension: 0.4,
              borderWidth: 2.5
            },
            {
              label: 'Expenses',
              data: [3200, 4800, 3500, 5400, 4200, 6100, 5800, 7500, 6200, 8100, 7800, 9500],
              borderColor: '#e8a838',
              backgroundColor: 'rgba(232,168,56,0.1)',
              fill: true,
              tension: 0.4,
              borderWidth: 2.5
            }
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
              ticks: { callback: v => '$' + (v / 1000) + 'k' }
            },
            x: { grid: { display: false } }
          }
        }
      });
    }
  }

  // --- QR Code Generation (mock) ---
  const qrElements = document.querySelectorAll('.qr-code-container');
  qrElements.forEach(el => {
    if (typeof QRCode !== 'undefined') {
      new QRCode(el, {
        text: el.dataset.value || 'EVT-2026-00123',
        width: 128,
        height: 128,
        colorDark: '#265367',
        colorLight: '#ffffff'
      });
    }
  });

  if(document.querySelector('#register_form_elm')){
    const form = document.querySelector("#register_form_elm")

    const toggleButtons = form.querySelectorAll('.toggle-btn')
    toggleButtons.forEach(button => {
      button.addEventListener('click', (e)=> {
        document.querySelector('#role_input').value = e.target.value
      })
    })
  }

});
