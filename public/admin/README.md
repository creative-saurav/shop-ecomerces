# AdminKit — Enterprise Admin Starter Kit

A fully responsive, production-ready admin dashboard starter kit built with **HTML**, **Tailwind CSS**, and **Vanilla JavaScript**. No frameworks, no build tools—just open a file and go.

---

## 📁 File Structure

```
admin-kit/
├── index.html          # Dashboard (charts, stats, orders)
├── analytics.html      # Analytics (KPIs, funnel, traffic)
├── orders.html         # Orders (table, filters, modal)
├── products.html       # Products (grid/list view, cards)
├── users.html          # Users (table, status, roles)
├── profile.html        # User profile (timeline, edit form)
├── settings.html       # Settings (tabs: general/security/billing…)
├── login.html          # Login (glassmorphic full-page)
└── assets/
    ├── css/
    │   └── main.css    # Custom design system + animations
    ├── js/
    │   ├── main.js     # Core: sidebar, modals, toasts, tabs
    │   └── charts.js   # Chart.js: 6 responsive charts
    └── partials/       # Layout reference snippets
```

---

## 🎨 Features

| Feature | Details |
|---|---|
| **Responsive** | Mobile, tablet, desktop — collapses sidebar on ≤1024px |
| **Dark Theme** | Deep navy (`#0f172a`) base with indigo accents |
| **Sidebar** | Collapsible, with active link indicator, section labels, user card |
| **Topbar** | Search bar, notifications dropdown, user menu |
| **6 Charts** | Revenue line, traffic donut, orders bar, user growth area, category polar, funnel horizontal bar |
| **Data Tables** | Sortable columns, checkbox selection, bulk actions, pagination |
| **Modals** | New Order, Add User, Add Product with form validation |
| **Toast Notifications** | `showToast(msg, type)` — success/error/warning/info |
| **Settings Tabs** | General, Security (2FA), Notifications, Billing, Integrations |
| **Profile Page** | Hero banner, skill bars, activity timeline, edit form |
| **Login Page** | Animated bg, social auth, glassmorphic card, demo redirect |
| **Animated Counters** | Count-up on scroll for all stat numbers |
| **Progress Bars** | Animated fill on page load |
| **Micro-animations** | Fade-up stagger, hover lift, scale-in on modals |
| **Dropdowns** | Click-outside-to-close, animated |
| **Toggles** | Custom CSS-only switch components |

---

## 🚀 Getting Started

1. Open `admin-kit/` in any web server (or directly in browser for static files)
2. Navigate to `login.html` — enter any credentials to demo login
3. Explore all pages via the sidebar navigation

### Serve locally (optional)
```bash
# Python
python -m http.server 8080 --directory admin-kit

# Node (npx)
npx serve admin-kit
```
Then visit `http://localhost:8080`

---

## 🔧 Customization

### Change brand color
In `assets/css/main.css`, update:
```css
--brand: #6366f1;       /* Primary indigo */
--brand-dark: #4f46e5;
--brand-light: #818cf8;
```

### Add a new page
1. Copy any existing page HTML
2. Update `nav-item active` class on the correct sidebar link
3. Update `<title>` and breadcrumb

### Add a new chart
In `assets/js/charts.js`, follow the existing Chart.js pattern with `document.getElementById('yourChartId')`.

---

## 🛠 Tech Stack

| Library | Version | Usage |
|---|---|---|
| Tailwind CSS | v3 CDN | Utility classes |
| Chart.js | 4.4.0 | All data charts |
| DiceBear API | v7 | Placeholder avatars |
| Google Fonts | Inter | Typography |

No Node.js, no npm, no build step required.

---

## 📄 License
Free to use for personal and commercial projects.
