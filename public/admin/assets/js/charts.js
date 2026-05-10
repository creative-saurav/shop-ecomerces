// Chart.js — Admin Starter Kit Charts
// ============================================================

// Shared defaults
Chart.defaults.color = '#64748b';
Chart.defaults.font.family = 'Inter, sans-serif';
Chart.defaults.font.size = 12;

const gridStyle = {
  color: 'rgba(99,102,241,0.07)',
  drawBorder: false,
};

// ── Revenue Chart (Line) ─────────────────────────────────────
const revenueCtx = document.getElementById('revenueChart');
if (revenueCtx) {
  new Chart(revenueCtx, {
    type: 'line',
    data: {
      labels: ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'],
      datasets: [
        {
          label: 'Revenue',
          data: [38000,42000,35000,55000,48000,63000,57000,71000,65000,82000,74000,91000],
          borderColor: '#6366f1',
          backgroundColor: (ctx) => {
            const g = ctx.chart.ctx.createLinearGradient(0,0,0,300);
            g.addColorStop(0,'rgba(99,102,241,0.25)');
            g.addColorStop(1,'rgba(99,102,241,0)');
            return g;
          },
          fill: true,
          tension: 0.4,
          borderWidth: 2.5,
          pointRadius: 4,
          pointBackgroundColor: '#6366f1',
          pointBorderColor: '#0f172a',
          pointBorderWidth: 2,
          pointHoverRadius: 6,
        },
        {
          label: 'Expenses',
          data: [22000,25000,20000,30000,28000,35000,32000,40000,36000,45000,38000,50000],
          borderColor: '#f43f5e',
          backgroundColor: (ctx) => {
            const g = ctx.chart.ctx.createLinearGradient(0,0,0,300);
            g.addColorStop(0,'rgba(244,63,94,0.15)');
            g.addColorStop(1,'rgba(244,63,94,0)');
            return g;
          },
          fill: true,
          tension: 0.4,
          borderWidth: 2,
          borderDash: [5,3],
          pointRadius: 3,
          pointBackgroundColor: '#f43f5e',
          pointBorderColor: '#0f172a',
          pointBorderWidth: 2,
          pointHoverRadius: 5,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      interaction: { mode: 'index', intersect: false },
      plugins: {
        legend: {
          display: true,
          position: 'top',
          align: 'end',
          labels: {
            boxWidth: 10,
            boxHeight: 10,
            borderRadius: 3,
            useBorderRadius: true,
            padding: 16,
            color: '#94a3b8',
            font: { size: 12 },
          },
        },
        tooltip: {
          backgroundColor: '#1e293b',
          borderColor: 'rgba(99,102,241,0.2)',
          borderWidth: 1,
          padding: 12,
          titleColor: '#e2e8f0',
          bodyColor: '#94a3b8',
          callbacks: {
            label: ctx => ` ${ctx.dataset.label}: $${ctx.parsed.y.toLocaleString()}`,
          },
        },
      },
      scales: {
        x: { grid: gridStyle, ticks: { color: '#475569' } },
        y: {
          grid: gridStyle,
          ticks: {
            color: '#475569',
            callback: v => '$' + (v >= 1000 ? (v/1000)+'k' : v),
          },
        },
      },
    },
  });
}


// ── Traffic Donut Chart ──────────────────────────────────────
const trafficCtx = document.getElementById('trafficChart');
if (trafficCtx) {
  new Chart(trafficCtx, {
    type: 'doughnut',
    data: {
      labels: ['Organic Search','Direct','Social Media','Referral','Email'],
      datasets: [{
        data: [38, 24, 18, 12, 8],
        backgroundColor: ['#6366f1','#10b981','#f59e0b','#06b6d4','#f43f5e'],
        borderColor: '#0f172a',
        borderWidth: 3,
        hoverOffset: 6,
      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      cutout: '70%',
      plugins: {
        legend: {
          display: false,
        },
        tooltip: {
          backgroundColor: '#1e293b',
          borderColor: 'rgba(99,102,241,0.2)',
          borderWidth: 1,
          padding: 12,
          callbacks: {
            label: ctx => ` ${ctx.label}: ${ctx.parsed}%`,
          },
        },
      },
    },
  });
}


// ── Weekly Orders Bar Chart ──────────────────────────────────
const ordersCtx = document.getElementById('ordersChart');
if (ordersCtx) {
  new Chart(ordersCtx, {
    type: 'bar',
    data: {
      labels: ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'],
      datasets: [
        {
          label: 'Orders',
          data: [145, 200, 175, 230, 195, 280, 160],
          backgroundColor: 'rgba(99,102,241,0.7)',
          borderRadius: 8,
          borderSkipped: false,
        },
        {
          label: 'Returns',
          data: [12, 18, 14, 22, 16, 25, 10],
          backgroundColor: 'rgba(244,63,94,0.5)',
          borderRadius: 8,
          borderSkipped: false,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      interaction: { mode: 'index', intersect: false },
      plugins: {
        legend: {
          display: true,
          position: 'top',
          align: 'end',
          labels: { boxWidth: 10, boxHeight: 10, borderRadius: 3, useBorderRadius: true, color: '#94a3b8', padding: 16 },
        },
        tooltip: {
          backgroundColor: '#1e293b',
          borderColor: 'rgba(99,102,241,0.2)',
          borderWidth: 1,
          padding: 12,
        },
      },
      scales: {
        x: { grid: { display: false }, ticks: { color: '#475569' } },
        y: { grid: gridStyle, ticks: { color: '#475569' } },
      },
    },
  });
}


// ── User Growth Area Chart ──────────────────────────────────
const userGrowthCtx = document.getElementById('userGrowthChart');
if (userGrowthCtx) {
  const months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
  new Chart(userGrowthCtx, {
    type: 'line',
    data: {
      labels: months,
      datasets: [
        {
          label: 'New Users',
          data: [1200,1800,1500,2200,1900,2800,2400,3200,2900,3800,3400,4200],
          borderColor: '#10b981',
          backgroundColor: ctx => {
            const g = ctx.chart.ctx.createLinearGradient(0,0,0,200);
            g.addColorStop(0,'rgba(16,185,129,0.25)');
            g.addColorStop(1,'rgba(16,185,129,0)');
            return g;
          },
          fill: true,
          tension: 0.4,
          borderWidth: 2.5,
          pointRadius: 0,
          pointHoverRadius: 5,
        },
        {
          label: 'Churned',
          data: [200,300,250,380,320,420,380,500,450,580,520,640],
          borderColor: '#f59e0b',
          backgroundColor: 'transparent',
          tension: 0.4,
          borderWidth: 2,
          borderDash: [5,3],
          pointRadius: 0,
          pointHoverRadius: 5,
        },
      ],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      interaction: { mode: 'index', intersect: false },
      plugins: {
        legend: {
          display: true,
          position: 'top',
          align: 'end',
          labels: { boxWidth: 10, boxHeight: 10, borderRadius: 3, useBorderRadius: true, color: '#94a3b8', padding: 16 },
        },
        tooltip: {
          backgroundColor: '#1e293b',
          borderColor: 'rgba(16,185,129,0.2)',
          borderWidth: 1,
          padding: 12,
        },
      },
      scales: {
        x: { grid: { display: false }, ticks: { color: '#475569' } },
        y: { grid: gridStyle, ticks: { color: '#475569', callback: v => v.toLocaleString() } },
      },
    },
  });
}


// ── Sales by Category Polar Chart ───────────────────────────
const categoryCtx = document.getElementById('categoryChart');
if (categoryCtx) {
  new Chart(categoryCtx, {
    type: 'polarArea',
    data: {
      labels: ['Electronics','Clothing','Foods','Books','Toys'],
      datasets: [{
        data: [42, 28, 18, 8, 4],
        backgroundColor: [
          'rgba(99,102,241,0.65)',
          'rgba(16,185,129,0.65)',
          'rgba(245,158,11,0.65)',
          'rgba(6,182,212,0.65)',
          'rgba(244,63,94,0.65)',
        ],
        borderColor: '#0f172a',
        borderWidth: 2,
      }],
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          display: true,
          position: 'right',
          labels: { color: '#94a3b8', boxWidth: 12, padding: 14 },
        },
        tooltip: {
          backgroundColor: '#1e293b',
          borderColor: 'rgba(99,102,241,0.2)',
          borderWidth: 1,
          padding: 12,
          callbacks: { label: ctx => ` ${ctx.label}: ${ctx.parsed.r}%` },
        },
      },
      scales: {
        r: {
          grid: { color: 'rgba(99,102,241,0.07)' },
          ticks: { display: false },
        },
      },
    },
  });
}


// ── Conversion Funnel (Horizontal Bar) ─────────────────────
const funnelCtx = document.getElementById('funnelChart');
if (funnelCtx) {
  new Chart(funnelCtx, {
    type: 'bar',
    data: {
      labels: ['Visitors','Leads','Prospects','Customers','Advocates'],
      datasets: [{
        data: [100, 72, 48, 28, 12],
        backgroundColor: [
          'rgba(99,102,241,0.8)',
          'rgba(99,102,241,0.65)',
          'rgba(99,102,241,0.5)',
          'rgba(99,102,241,0.35)',
          'rgba(99,102,241,0.2)',
        ],
        borderRadius: 8,
        borderSkipped: false,
      }],
    },
    options: {
      indexAxis: 'y',
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: { display: false },
        tooltip: {
          backgroundColor: '#1e293b',
          borderColor: 'rgba(99,102,241,0.2)',
          borderWidth: 1,
          padding: 12,
          callbacks: { label: ctx => ` ${ctx.parsed.x}%` },
        },
      },
      scales: {
        x: {
          grid: gridStyle,
          ticks: { color: '#475569', callback: v => v + '%' },
          max: 110,
        },
        y: { grid: { display: false }, ticks: { color: '#94a3b8' } },
      },
    },
  });
}
