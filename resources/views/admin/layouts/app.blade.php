<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1"/>
<title>Dashboard — AdminKit</title>
<meta name="description" content="AdminKit — Professional admin dashboard starter kit with analytics, orders, users management."/>
<link rel="preconnect" href="https://fonts.googleapis.com"/>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet"/>
<script src="https://cdn.tailwindcss.com"></script>
<link rel="stylesheet" href="{{ asset('admin/assets/css/main.css') }}"/>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
</head>
<body>

<!-- Sidebar overlay -->
<div id="sidebar-overlay" class="sidebar-overlay"></div>

<!-- ── SIDEBAR ─────────────────────────────────────────────── -->
<nav id="sidebar">
  @include('admin.layouts.navigation')
</nav>

<!-- ── TOPBAR ──────────────────────────────────────────────── -->
<header id="topbar">
  <button id="sidebar-toggle" class="btn-icon mr-1" title="Toggle sidebar">
    <svg width="18" height="18" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
  </button>

  <div class="search-bar">
    <svg width="15" height="15" fill="none" stroke="#475569" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
    <input id="global-search" type="text" placeholder="Search anything… (⌘K)"/>
    <span style="font-size:.7rem;color:#334155;background:var(--bg-card-hover);padding:2px 6px;border-radius:4px">⌘K</span>
  </div>

  <div class="flex items-center gap-2 ml-auto">
    <!-- Theme toggle -->
    <button id="theme-toggle" class="btn-icon" title="Switch to Dark Mode">
      <!-- Sun icon (shown in light mode) -->
      <svg class="icon-sun" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="5"/><line x1="12" y1="1" x2="12" y2="3"/><line x1="12" y1="21" x2="12" y2="23"/><line x1="4.22" y1="4.22" x2="5.64" y2="5.64"/><line x1="18.36" y1="18.36" x2="19.78" y2="19.78"/><line x1="1" y1="12" x2="3" y2="12"/><line x1="21" y1="12" x2="23" y2="12"/><line x1="4.22" y1="19.78" x2="5.64" y2="18.36"/><line x1="18.36" y1="5.64" x2="19.78" y2="4.22"/></svg>
      <!-- Moon icon (shown in dark mode) -->
      <svg class="icon-moon" width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/></svg>
    </button>

    <!-- Notifications -->
    <div class="relative">
      <button class="btn-icon" data-dropdown="notif-dropdown">
        <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M18 8A6 6 0 006 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 01-3.46 0"/></svg>
        <span id="notif-badge" style="position:absolute;top:-4px;right:-4px;width:18px;height:18px;background:#f43f5e;border-radius:50%;font-size:.6rem;font-weight:700;color:#fff;display:flex;align-items:center;justify-content:center;border:2px solid var(--bg-topbar)">4</span>
      </button>
      <div class="dropdown" id="notif-dropdown" style="min-width:300px">
        <div class="flex items-center justify-between px-3 pb-2 mb-1" style="border-bottom:1px solid rgba(99,102,241,.08)">
          <span class="text-sm font-semibold text-main">Notifications</span>
          <span class="tag chip-indigo">4 new</span>
        </div>
        <div class="dropdown-item gap-3">
          <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0" style="background:rgba(16,185,129,.15)"><svg width="14" height="14" fill="none" stroke="#10b981" stroke-width="2" viewBox="0 0 24 24"><path d="M20 6L9 17l-5-5"/></svg></div>
          <div><div class="text-sm text-main">New order #4521 placed</div><div class="text-xs" style="color:var(--text-muted)">2 min ago</div></div>
        </div>
        <div class="dropdown-item gap-3">
          <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0" style="background:rgba(99,102,241,.15)"><svg width="14" height="14" fill="none" stroke="#818cf8" stroke-width="2" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/></svg></div>
          <div><div class="text-sm text-main">Sarah joined as editor</div><div class="text-xs" style="color:var(--text-muted)">18 min ago</div></div>
        </div>
        <div class="dropdown-item gap-3">
          <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0" style="background:rgba(245,158,11,.15)"><svg width="14" height="14" fill="none" stroke="#f59e0b" stroke-width="2" viewBox="0 0 24 24"><path d="M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg></div>
          <div><div class="text-sm text-main">Low stock: iPhone 15 Pro</div><div class="text-xs" style="color:var(--text-muted)">1 hr ago</div></div>
        </div>
        <div class="dropdown-item gap-3">
          <div class="w-8 h-8 rounded-full flex items-center justify-center shrink-0" style="background:rgba(244,63,94,.15)"><svg width="14" height="14" fill="none" stroke="#f43f5e" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg></div>
          <div><div class="text-sm text-main">Payment failed – Order #4490</div><div class="text-xs" style="color:var(--text-muted)">3 hr ago</div></div>
        </div>
        <div style="padding:8px 4px 4px;border-top:1px solid rgba(99,102,241,.08);margin-top:4px">
          <a href="#" class="dropdown-item justify-center text-xs" style="color:#818cf8">View all notifications →</a>
        </div>
      </div>
    </div>

    <!-- User avatar -->
    <div class="relative">
      <button data-dropdown="user-dropdown" class="flex items-center gap-2 px-2 py-1 rounded-xl" style="background:rgba(99,102,241,.08);border:1px solid rgba(99,102,241,.12)">
        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin99" class="avatar" style="width:28px;height:28px;background:var(--bg-card-hover)" alt="Admin">
        <div class="hidden sm:block text-left">
          <div class="text-xs font-semibold text-main">Alex Morgan</div>
          <div class="text-xs" style="color:var(--text-muted)">Super Admin</div>
        </div>
        <svg width="12" height="12" fill="none" stroke="#475569" stroke-width="2" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
      </button>
      <div class="dropdown" id="user-dropdown">
        <a href="profile.html" class="dropdown-item"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>My Profile</a>
        <a href="settings.html" class="dropdown-item"><svg width="14" height="14" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/></svg>Settings</a>
        <div class="dropdown-divider"></div>
        <a href="login.html" class="dropdown-item" style="color:#fda4af"><svg width="14" height="14" fill="none" stroke="#fda4af" stroke-width="2" viewBox="0 0 24 24"><path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>Logout</a>
      </div>
    </div>
  </div>
</header>

<!-- ── MAIN CONTENT ────────────────────────────────────────── -->
<main id="main-content" class="page-enter">

@yield('content')

</main>

<!-- ── TOAST CONTAINER ─────────────────────────────────────── -->
<div id="toast-container" style="position:fixed;bottom:24px;right:24px;display:flex;flex-direction:column;gap:10px;z-index:200"></div>

<!-- ── SCRIPTS ─────────────────────────────────────────────── -->
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/charts.js"></script>
<script>
  // Demo toast on load
  setTimeout(() => showToast('Welcome back, Alex! 👋', 'success'), 800);
</script>

<!-- Large Modal -->
<div class="modal-overlay" id="large-modal">
  <div class="modal-box modal-lg">
    <div class="flex items-center justify-between mb-5">
      <h2 class="text-lg font-bold text-main">Order Details — Full View</h2>
      <button class="btn-icon" data-modal-close="large-modal"><svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg></button>
    </div>
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-5">
      <div class="p-4 rounded-xl" style="background:rgba(99,102,241,.06);border:1px solid var(--border-color)">
        <div class="text-xs mb-1" style="color:var(--text-muted)">Order ID</div>
        <div class="font-semibold text-main">#4521</div>
      </div>
      <div class="p-4 rounded-xl" style="background:rgba(16,185,129,.06);border:1px solid var(--border-color)">
        <div class="text-xs mb-1" style="color:var(--text-muted)">Total Amount</div>
        <div class="font-semibold" style="color:#10b981">$1,299.00</div>
      </div>
      <div class="p-4 rounded-xl" style="background:rgba(245,158,11,.06);border:1px solid var(--border-color)">
        <div class="text-xs mb-1" style="color:var(--text-muted)">Status</div>
        <span class="tag chip-emerald">Delivered</span>
      </div>
    </div>
    <div style="overflow-x:auto">
      <table class="data-table">
        <thead><tr><th>Item</th><th>SKU</th><th>Qty</th><th>Unit Price</th><th>Total</th></tr></thead>
        <tbody>
          <tr><td>iPhone 15 Pro 256GB</td><td class="font-mono text-xs" style="color:#818cf8">IP15PRO-256</td><td>1</td><td>$1,099</td><td class="font-semibold text-main">$1,099</td></tr>
          <tr><td>MagSafe Case</td><td class="font-mono text-xs" style="color:#818cf8">MGSF-CASE-BLK</td><td>1</td><td>$49</td><td class="font-semibold text-main">$49</td></tr>
          <tr><td>AppleCare+</td><td class="font-mono text-xs" style="color:#818cf8">AC-IP15-2Y</td><td>1</td><td>$129</td><td class="font-semibold text-main">$129</td></tr>
          <tr><td>Express Shipping</td><td class="font-mono text-xs" style="color:#818cf8">SHIP-EXP</td><td>1</td><td>$22</td><td class="font-semibold text-main">$22</td></tr>
        </tbody>
      </table>
    </div>
    <div class="flex gap-3 mt-6">
      <button class="btn-ghost" data-modal-close="large-modal">Close</button>
      <button class="btn-primary ml-auto" onclick="showToast('Invoice downloaded!','success');closeModal('large-modal')">Download Invoice</button>
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal-overlay" id="delete-modal">
  <div class="modal-box" style="max-width:420px;text-align:center">
    <div class="w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4" style="background:rgba(244,63,94,.12)">
      <svg width="28" height="28" fill="none" stroke="#f43f5e" stroke-width="2" viewBox="0 0 24 24"><polyline points="3 6 5 6 21 6"/><path d="M19 6l-1 14H6L5 6"/><path d="M10 11v6"/><path d="M14 11v6"/><path d="M9 6V4h6v2"/></svg>
    </div>
    <h2 class="text-xl font-bold text-main mb-2">Delete Confirmation</h2>
    <p class="text-sm mb-1" style="color:var(--text-muted)">Are you sure you want to delete <strong id="delete-target-label" style="color:var(--text-main)">this item</strong>?</p>
    <p class="text-xs mb-6" style="color:var(--text-muted)">This action <strong>cannot be undone</strong>. All associated data will be permanently removed.</p>
    <div class="flex gap-3">
      <button class="btn-ghost flex-1" data-modal-close="delete-modal">Cancel</button>
      <button class="btn-danger flex-1" id="confirm-delete-btn" onclick="confirmDeleteAction()">Yes, Delete</button>
    </div>
  </div>
</div>

</body>
</html>
