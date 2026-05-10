<div style="display:flex;flex-direction:column;flex:1;overflow-y:auto;padding:0 8px">
    <div class="flex items-center gap-3 px-2 py-5">
        <div class="sidebar-logo-icon flex items-center justify-center w-9 h-9 rounded-xl shrink-0"
            style="background:linear-gradient(135deg,#6366f1,#4f46e5);box-shadow:0 4px 16px rgba(99,102,241,.4)">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="white" stroke-width="2.5">
                <path d="M12 2L2 7l10 5 10-5-10-5z" />
                <path d="M2 17l10 5 10-5" />
                <path d="M2 12l10 5 10-5" />
            </svg>
        </div>
        <div class="sidebar-logo-text">
            <div class="font-bold text-main text-sm">AdminKit</div>
            <div class="text-xs" style="color:var(--text-muted)">Enterprise v1.0</div>
        </div>
    </div>
    <div class="nav-section-title">Main</div>
    <a href="index.html" class="nav-item active"><svg width="17" height="17" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <rect x="3" y="3" width="7" height="7" />
            <rect x="14" y="3" width="7" height="7" />
            <rect x="3" y="14" width="7" height="7" />
            <rect x="14" y="14" width="7" height="7" />
        </svg><span class="nav-label">Dashboard</span></a>
    <a href="analytics.html" class="nav-item"><svg width="17" height="17" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <polyline points="22 12 18 12 15 21 9 3 6 12 2 12" />
        </svg><span class="nav-label">Analytics</span></a>
    <a href="orders.html" class="nav-item"><svg width="17" height="17" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <path d="M16 10a4 4 0 01-8 0" />
        </svg><span class="nav-label">Orders</span><span class="nav-badge">24</span></a>
    <a href="products.html" class="nav-item"><svg width="17" height="17" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <path
                d="M21 16V8a2 2 0 00-1-1.73l-7-4a2 2 0 00-2 0l-7 4A2 2 0 003 8v8a2 2 0 001 1.73l7 4a2 2 0 002 0l7-4A2 2 0 0021 16z" />
        </svg><span class="nav-label">Products</span></a>
    <div class="nav-section-title">People</div>
    <a href="users.html" class="nav-item"><svg width="17" height="17" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
            <circle cx="9" cy="7" r="4" />
            <path d="M23 21v-2a4 4 0 00-3-3.87" />
            <path d="M16 3.13a4 4 0 010 7.75" />
        </svg><span class="nav-label">Users</span><span class="nav-badge">1.2k</span></a>
    <a href="profile.html" class="nav-item"><svg width="17" height="17" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2" />
            <circle cx="12" cy="7" r="4" />
        </svg><span class="nav-label">My Profile</span></a>
    <div class="nav-section-title">System</div>
    <a href="settings.html" class="nav-item"><svg width="17" height="17" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <circle cx="12" cy="12" r="3" />
            <path
                d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-4 0v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83-2.83l.06-.06A1.65 1.65 0 004.68 15a1.65 1.65 0 00-1.51-1H3a2 2 0 010-4h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 012.83-2.83l.06.06A1.65 1.65 0 009 4.68a1.65 1.65 0 001-1.51V3a2 2 0 014 0v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 2.83l-.06.06A1.65 1.65 0 0019.4 9a1.65 1.65 0 001.51 1H21a2 2 0 010 4h-.09a1.65 1.65 0 00-1.51 1z" />
        </svg><span class="nav-label">Settings</span></a>
    <a href="{{ route('logout') }}" class="nav-item"><svg width="17" height="17" fill="none" stroke="currentColor"
            stroke-width="2" viewBox="0 0 24 24">
            <path d="M9 21H5a2 2 0 01-2-2V5a2 2 0 012-2h4" />
            <polyline points="16 17 21 12 16 7" />
            <line x1="21" y1="12" x2="9" y2="12" />
        </svg><span class="nav-label">Logout</span></a>
</div>
<div style="padding:12px">
    <a href="profile.html" class="flex items-center gap-3 p-3 rounded-xl"
        style="background:rgba(99,102,241,.06);border:1px solid var(--border-color);text-decoration:none">
        <img src="https://api.dicebear.com/7.x/avataaars/svg?seed=admin99" class="avatar avatar-sm shrink-0"
            style="background:var(--bg-card-hover)" alt="Admin">
        <div class="sidebar-logo-text overflow-hidden">
            <div class="text-sm font-semibold text-main truncate">Alex Morgan</div>
            <div class="text-xs truncate" style="color:var(--text-muted)">Super Admin</div>
        </div>
    </a>
</div>
