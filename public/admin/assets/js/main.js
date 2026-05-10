// ============================================================
// ADMIN STARTER KIT — Main JavaScript
// ============================================================

// ── Sidebar Toggle ──────────────────────────────────────────
const sidebar = document.getElementById('sidebar');
const topbar = document.getElementById('topbar');
const mainContent = document.getElementById('main-content');
const sidebarOverlay = document.getElementById('sidebar-overlay');
const toggleBtn = document.getElementById('sidebar-toggle');
const mobileToggle = document.getElementById('mobile-toggle');

let sidebarCollapsed = false;

function toggleSidebar() {
  if (window.innerWidth <= 1024) {
    sidebar.classList.toggle('mobile-open');
    sidebarOverlay.classList.toggle('show');
  } else {
    sidebarCollapsed = !sidebarCollapsed;
    sidebar.classList.toggle('collapsed', sidebarCollapsed);
    topbar.classList.toggle('collapsed', sidebarCollapsed);
    mainContent.classList.toggle('collapsed', sidebarCollapsed);
    localStorage.setItem('sidebarCollapsed', sidebarCollapsed);
  }
}

if (toggleBtn) toggleBtn.addEventListener('click', toggleSidebar);
if (mobileToggle) mobileToggle.addEventListener('click', toggleSidebar);
if (sidebarOverlay) sidebarOverlay.addEventListener('click', () => {
  sidebar.classList.remove('mobile-open');
  sidebarOverlay.classList.remove('show');
});

// Restore sidebar state
const saved = localStorage.getItem('sidebarCollapsed');
if (saved === 'true' && window.innerWidth > 1024) {
  sidebarCollapsed = true;
  sidebar?.classList.add('collapsed');
  topbar?.classList.add('collapsed');
  mainContent?.classList.add('collapsed');
}


// ── Active Nav Link ─────────────────────────────────────────
function setActiveNav() {
  const currentPage = window.location.pathname.split('/').pop() || 'index.html';
  document.querySelectorAll('.nav-item').forEach(el => {
    const href = el.getAttribute('href') || '';
    el.classList.toggle('active', href === currentPage || (currentPage === '' && href === 'index.html'));
  });
}
setActiveNav();


// ── Dropdown Menus ─────────────────────────────────────────
document.addEventListener('click', (e) => {
  document.querySelectorAll('.dropdown.open').forEach(d => {
    if (!d.previousElementSibling.contains(e.target) && !d.contains(e.target)) {
      d.classList.remove('open');
    }
  });
});

document.querySelectorAll('[data-dropdown]').forEach(trigger => {
  trigger.addEventListener('click', (e) => {
    e.stopPropagation();
    const target = document.getElementById(trigger.dataset.dropdown);
    if (!target) return;
    const isOpen = target.classList.contains('open');
    document.querySelectorAll('.dropdown.open').forEach(d => d.classList.remove('open'));
    if (!isOpen) target.classList.add('open');
  });
});


// ── Modal ── ────────────────────────────────────────────────
function openModal(id) {
  const overlay = document.getElementById(id);
  if (overlay) overlay.classList.add('open');
}
function closeModal(id) {
  const overlay = document.getElementById(id);
  if (overlay) overlay.classList.remove('open');
}

document.querySelectorAll('[data-modal-open]').forEach(btn => {
  btn.addEventListener('click', () => openModal(btn.dataset.modalOpen));
});
document.querySelectorAll('[data-modal-close]').forEach(btn => {
  btn.addEventListener('click', () => closeModal(btn.dataset.modalClose));
});
document.querySelectorAll('.modal-overlay').forEach(overlay => {
  overlay.addEventListener('click', (e) => {
    if (e.target === overlay) overlay.classList.remove('open');
  });
});


// ── Toast Notifications ─────────────────────────────────────
const toastContainer = document.getElementById('toast-container');

function showToast(message, type = 'success', duration = 4000) {
  if (!toastContainer) return;
  const icons = {
    success: `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#10b981" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M20 6L9 17l-5-5"/></svg>`,
    error: `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#f43f5e" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="15" y1="9" x2="9" y2="15"/><line x1="9" y1="9" x2="15" y2="15"/></svg>`,
    warning: `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#f59e0b" stroke-width="2.5"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"/><line x1="12" y1="9" x2="12" y2="13"/><line x1="12" y1="17" x2="12.01" y2="17"/></svg>`,
    info: `<svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#6366f1" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><line x1="12" y1="16" x2="12" y2="12"/><line x1="12" y1="8" x2="12.01" y2="8"/></svg>`,
  };
  const colors = { success: '#10b981', error: '#f43f5e', warning: '#f59e0b', info: '#6366f1' };
  const toast = document.createElement('div');
  toast.className = 'toast';
  toast.style.borderLeft = `3px solid ${colors[type]}`;
  toast.innerHTML = `${icons[type]}<span style="font-size:.875rem;color:var(--text-main);flex:1">${message}</span>
    <button onclick="this.parentElement.remove()" style="background:none;border:none;color:var(--text-muted);cursor:pointer;padding:0;line-height:1">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
    </button>`;
  toastContainer.appendChild(toast);
  setTimeout(() => {
    toast.style.opacity = '0';
    toast.style.transform = 'translateX(120%)';
    toast.style.transition = '0.3s ease';
    setTimeout(() => toast.remove(), 300);
  }, duration);
}

// Make globally available
window.showToast = showToast;
window.openModal = openModal;
window.closeModal = closeModal;

// ── Delete Confirmation ──────────────────────────────────────
let _deleteTarget = null;

window.openDeleteModal = function(label) {
  _deleteTarget = label || 'this item';
  const labelEl = document.getElementById('delete-target-label');
  if (labelEl) labelEl.textContent = _deleteTarget;
  openModal('delete-modal');
};

window.confirmDeleteAction = function() {
  closeModal('delete-modal');
  showToast(`Order ${_deleteTarget || 'item'} deleted successfully!`, 'success');
  _deleteTarget = null;
};


// ── Progress Bars Animation ──────────────────────────────────
function animateProgressBars() {
  document.querySelectorAll('.progress-fill[data-width]').forEach(el => {
    setTimeout(() => {
      el.style.width = el.dataset.width;
    }, 100);
  });
}
animateProgressBars();


// ── Counter Animation ────────────────────────────────────────
function animateCount(el, target, duration = 1500) {
  let start = 0;
  const step = target / (duration / 16);
  const prefix = el.dataset.prefix || '';
  const suffix = el.dataset.suffix || '';
  const isDecimal = String(target).includes('.');
  const timer = setInterval(() => {
    start += step;
    if (start >= target) { start = target; clearInterval(timer); }
    el.textContent = prefix + (isDecimal ? start.toFixed(1) : Math.floor(start).toLocaleString()) + suffix;
  }, 16);
}

document.querySelectorAll('[data-count]').forEach(el => {
  const observer = new IntersectionObserver(entries => {
    if (entries[0].isIntersecting) {
      animateCount(el, parseFloat(el.dataset.count));
      observer.disconnect();
    }
  });
  observer.observe(el);
});


// ── Tabs ────────────────────────────────────────────────────
document.querySelectorAll('[data-tab-trigger]').forEach(trigger => {
  trigger.addEventListener('click', () => {
    const group = trigger.dataset.tabGroup;
    const target = trigger.dataset.tabTrigger;

    document.querySelectorAll(`[data-tab-group="${group}"][data-tab-trigger]`).forEach(t => t.classList.remove('active'));
    document.querySelectorAll(`[data-tab-group="${group}"][data-tab-content]`).forEach(c => c.classList.add('hidden'));

    trigger.classList.add('active');
    document.querySelector(`[data-tab-group="${group}"][data-tab-content="${target}"]`)?.classList.remove('hidden');
  });
});


// ── Search Filter Table ──────────────────────────────────────
const globalSearch = document.getElementById('global-search');
if (globalSearch) {
  globalSearch.addEventListener('input', () => {
    const query = globalSearch.value.toLowerCase();
    document.querySelectorAll('.searchable-row').forEach(row => {
      const text = row.textContent.toLowerCase();
      row.style.display = text.includes(query) ? '' : 'none';
    });
  });
}


// ── Theme Toggle ─────────────────────────────────────────────
const themeToggle = document.getElementById('theme-toggle');

function applyTheme(isDark) {
  document.body.classList.toggle('dark-mode', isDark);
  if (themeToggle) themeToggle.title = isDark ? 'Switch to Light Mode' : 'Switch to Dark Mode';
}

if (themeToggle) {
  themeToggle.addEventListener('click', () => {
    const isDark = !document.body.classList.contains('dark-mode');
    applyTheme(isDark);
    localStorage.setItem('theme', isDark ? 'dark' : 'light');
  });
}

// Apply saved theme (default: light)
//applyTheme(localStorage.getItem('theme') === 'light');


// ── Checkbox Select All ──────────────────────────────────────
const selectAll = document.getElementById('select-all');
if (selectAll) {
  selectAll.addEventListener('change', () => {
    document.querySelectorAll('.row-checkbox').forEach(cb => cb.checked = selectAll.checked);
    updateBulkActions();
  });
}
document.querySelectorAll('.row-checkbox').forEach(cb => {
  cb.addEventListener('change', updateBulkActions);
});
function updateBulkActions() {
  const checked = document.querySelectorAll('.row-checkbox:checked').length;
  const bar = document.getElementById('bulk-action-bar');
  const countEl = document.getElementById('bulk-count');
  if (bar) bar.classList.toggle('hidden', checked === 0);
  if (countEl) countEl.textContent = checked;
}


// ── Mini Sparkline Bars Generator ───────────────────────────
document.querySelectorAll('[data-sparkline]').forEach(container => {
  const values = container.dataset.sparkline.split(',').map(Number);
  const color = container.dataset.color || '#6366f1';
  const max = Math.max(...values);
  container.innerHTML = values.map((v, i) => {
    const h = Math.round((v / max) * 28);
    return `<span style="height:${h}px;background:${color};animation-delay:${i * 0.05}s"></span>`;
  }).join('');
});


// ── Sidebar Tooltip (collapsed mode) ───────────────────────
if (window.innerWidth > 1024) {
  document.querySelectorAll('.nav-item').forEach(item => {
    const label = item.querySelector('.nav-label');
    if (label) item.dataset.tooltip = item.dataset.tooltip || label.textContent.trim();
  });
}


// ── Notification Badge ───────────────────────────────────────
function updateNotifBadge(count) {
  const badge = document.getElementById('notif-badge');
  if (!badge) return;
  badge.textContent = count;
  badge.style.display = count > 0 ? 'flex' : 'none';
}
updateNotifBadge(4);


// ── Date/Time Display ────────────────────────────────────────
function updateClock() {
  const el = document.getElementById('current-time');
  if (!el) return;
  const now = new Date();
  el.textContent = now.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
}
updateClock();
setInterval(updateClock, 60000);

console.log('%cAdmin Starter Kit v1.0', 'color:#818cf8;font-size:14px;font-weight:700');
