@extends('admin.layouts.app')
@section('title', 'Dashboard')
@section('content')

    <!-- Header row -->
    <div class="flex flex-wrap items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-2xl font-bold text-main">Dashboard</h1>
            <div class="breadcrumb mt-1">
                <a href="index.html">Home</a>
                <span class="breadcrumb-sep">/</span>
                <span class="current">Dashboard</span>
            </div>
        </div>
        <div class="flex gap-2 flex-wrap">
            <select class="form-select select2-init" style="width:auto;padding:8px 36px 8px 12px;font-size:.8rem">
                <option>Last 30 days</option>
                <option>Last 7 days</option>
                <option>This year</option>
            </select>
            <button class="btn-primary flex items-center gap-2">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2.5"
                    viewBox="0 0 24 24">
                    <path d="M12 5v14m-7-7h14" />
                </svg>
                New Report
            </button>
            <button class="btn-secondary flex items-center gap-2" data-modal-open="large-modal">
                <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <rect x="3" y="3" width="18" height="18" rx="2" />
                    <line x1="3" y1="9" x2="21" y2="9" />
                    <line x1="9" y1="21" x2="9" y2="9" />
                </svg>
                View Details
            </button>
        </div>
    </div>

    <!-- ── STAT CARDS ── -->
    <div class="grid grid-cols-1 sm:grid-cols-2 xl:grid-cols-4 gap-4 mb-6 stagger-children">
        <!-- Revenue -->
        <div class="card stat-card" style="color:#6366f1">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(99,102,241,.15)">
                    <svg width="18" height="18" fill="none" stroke="#818cf8" stroke-width="2" viewBox="0 0 24 24">
                        <line x1="12" y1="1" x2="12" y2="23" />
                        <path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6" />
                    </svg>
                </div>
                <span class="tag chip-emerald text-xs">↑ 12.5%</span>
            </div>
            <div class="text-3xl font-bold text-main mb-1" data-count="94280" data-prefix="$" data-suffix=""></div>
            <div class="text-sm" style="color:var(--text-muted)">Total Revenue</div>
            <div class="mini-bar mt-3" data-sparkline="40,65,45,80,60,90,75,95" data-color="#6366f1"></div>
        </div>
        <!-- Orders -->
        <div class="card stat-card" style="color:#10b981">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(16,185,129,.15)">
                    <svg width="18" height="18" fill="none" stroke="#10b981" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M6 2L3 6v14a2 2 0 002 2h14a2 2 0 002-2V6l-3-4z" />
                        <line x1="3" y1="6" x2="21" y2="6" />
                        <path d="M16 10a4 4 0 01-8 0" />
                    </svg>
                </div>
                <span class="tag chip-emerald text-xs">↑ 8.2%</span>
            </div>
            <div class="text-3xl font-bold text-main mb-1" data-count="3842"></div>
            <div class="text-sm" style="color:var(--text-muted)">Total Orders</div>
            <div class="mini-bar mt-3" data-sparkline="55,70,48,85,65,78,90,72" data-color="#10b981"></div>
        </div>
        <!-- Users -->
        <div class="card stat-card" style="color:#f59e0b">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(245,158,11,.15)">
                    <svg width="18" height="18" fill="none" stroke="#f59e0b" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87" />
                        <path d="M16 3.13a4 4 0 010 7.75" />
                    </svg>
                </div>
                <span class="tag chip-emerald text-xs">↑ 3.1%</span>
            </div>
            <div class="text-3xl font-bold text-main mb-1" data-count="12459"></div>
            <div class="text-sm" style="color:var(--text-muted)">Active Users</div>
            <div class="mini-bar mt-3" data-sparkline="30,45,60,40,70,55,80,65" data-color="#f59e0b"></div>
        </div>
        <!-- Conversion -->
        <div class="card stat-card" style="color:#f43f5e">
            <div class="flex items-start justify-between mb-4">
                <div class="w-10 h-10 rounded-xl flex items-center justify-center" style="background:rgba(244,63,94,.15)">
                    <svg width="18" height="18" fill="none" stroke="#f43f5e" stroke-width="2"
                        viewBox="0 0 24 24">
                        <polyline points="23 6 13.5 15.5 8.5 10.5 1 18" />
                        <polyline points="17 6 23 6 23 12" />
                    </svg>
                </div>
                <span class="tag chip-rose text-xs">↓ 1.4%</span>
            </div>
            <div class="text-3xl font-bold text-main mb-1" data-count="3.6" data-suffix="%"></div>
            <div class="text-sm" style="color:var(--text-muted)">Conversion Rate</div>
            <div class="mini-bar mt-3" data-sparkline="70,50,65,40,55,45,50,42" data-color="#f43f5e"></div>
        </div>
    </div>

    <!-- ── CHARTS ROW 1 ── -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 mb-4">
        <!-- Revenue Chart -->
        <div class="card lg:col-span-2">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-5">
                <div>
                    <div class="text-base font-semibold text-main">Revenue Overview</div>
                    <div class="text-xs mt-0.5" style="color:var(--text-muted)">Annual revenue vs expenses</div>
                </div>
                <div class="flex gap-2">
                    <button class="btn-secondary text-xs py-1.5 px-3">Monthly</button>
                    <button class="btn-ghost text-xs py-1.5 px-3">Quarterly</button>
                </div>
            </div>
            <div class="chart-wrapper" style="height:260px">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>

        <!-- Traffic Donut -->
        <div class="card">
            <div class="text-base font-semibold text-main mb-1">Traffic Sources</div>
            <div class="text-xs mb-4" style="color:var(--text-muted)">Where your visits come from</div>
            <div class="chart-wrapper" style="height:180px">
                <canvas id="trafficChart"></canvas>
            </div>
            <div class="mt-4 space-y-2">
                <div class="flex items-center justify-between text-xs"><span class="flex items-center gap-2"><span
                            style="width:8px;height:8px;border-radius:50%;background:#6366f1"></span><span
                            style="color:var(--text-muted-light)">Organic</span></span><span
                        class="text-main font-medium">38%</span></div>
                <div class="flex items-center justify-between text-xs"><span class="flex items-center gap-2"><span
                            style="width:8px;height:8px;border-radius:50%;background:#10b981"></span><span
                            style="color:var(--text-muted-light)">Direct</span></span><span
                        class="text-main font-medium">24%</span></div>
                <div class="flex items-center justify-between text-xs"><span class="flex items-center gap-2"><span
                            style="width:8px;height:8px;border-radius:50%;background:#f59e0b"></span><span
                            style="color:var(--text-muted-light)">Social</span></span><span
                        class="text-main font-medium">18%</span></div>
                <div class="flex items-center justify-between text-xs"><span class="flex items-center gap-2"><span
                            style="width:8px;height:8px;border-radius:50%;background:#06b6d4"></span><span
                            style="color:var(--text-muted-light)">Referral</span></span><span
                        class="text-main font-medium">12%</span></div>
                <div class="flex items-center justify-between text-xs"><span class="flex items-center gap-2"><span
                            style="width:8px;height:8px;border-radius:50%;background:#f43f5e"></span><span
                            style="color:var(--text-muted-light)">Email</span></span><span
                        class="text-main font-medium">8%</span></div>
            </div>
        </div>
    </div>

    <!-- ── CHARTS ROW 2 ── -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
        <div class="card">
            <div class="text-base font-semibold text-main mb-1">Weekly Orders</div>
            <div class="text-xs mb-4" style="color:var(--text-muted)">Orders vs returns this week</div>
            <div class="chart-wrapper" style="height:220px"><canvas id="ordersChart"></canvas></div>
        </div>
        <div class="card">
            <div class="text-base font-semibold text-main mb-1">User Growth</div>
            <div class="text-xs mb-4" style="color:var(--text-muted)">New users vs churn monthly</div>
            <div class="chart-wrapper" style="height:220px"><canvas id="userGrowthChart"></canvas></div>
        </div>
    </div>

    <!-- ── CHARTS ROW 3 ── -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 mb-4">
        <div class="card">
            <div class="text-base font-semibold text-main mb-1">Sales by Category</div>
            <div class="text-xs mb-4" style="color:var(--text-muted)">Revenue distribution across product categories</div>
            <div class="chart-wrapper" style="height:240px"><canvas id="categoryChart"></canvas></div>
        </div>
        <div class="card">
            <div class="text-base font-semibold text-main mb-1">Conversion Funnel</div>
            <div class="text-xs mb-4" style="color:var(--text-muted)">Visitors to advocates — funnel breakdown</div>
            <div class="chart-wrapper" style="height:240px"><canvas id="funnelChart"></canvas></div>
        </div>
    </div>

    <!-- ── BOTTOM ROW ── -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-4">
        <!-- Recent Orders Table -->
        <div class="card lg:col-span-2">
            <div class="flex flex-wrap items-center justify-between gap-3 mb-4">
                <div class="text-base font-semibold text-main">Recent Orders</div>
                <a href="orders.html" class="text-xs font-medium" style="color:#818cf8">View all →</a>
            </div>
            <div style="overflow-x:auto">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Amount</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="searchable-row">
                            <td class="font-mono text-xs" style="color:#818cf8">#4521</td>
                            <td>
                                <div class="flex items-center gap-2"><img
                                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=u1" class="avatar"
                                        style="width:24px;height:24px;background:var(--bg-card-hover)"
                                        alt=""><span>Sarah Connor</span></div>
                            </td>
                            <td>iPhone 15 Pro</td>
                            <td class="font-semibold text-main">$1,299</td>
                            <td><span class="tag chip-emerald">Delivered</span></td>
                            <td><button class="btn-icon" onclick="openDeleteModal('#4521')" title="Delete order"
                                    style="width:30px;height:30px;color:#f43f5e;border-color:rgba(244,63,94,0.2)"><svg
                                        width="13" height="13" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1 14H6L5 6" />
                                        <path d="M10 11v6" />
                                        <path d="M14 11v6" />
                                        <path d="M9 6V4h6v2" />
                                    </svg></button></td>
                        </tr>
                        <tr class="searchable-row">
                            <td class="font-mono text-xs" style="color:#818cf8">#4520</td>
                            <td>
                                <div class="flex items-center gap-2"><img
                                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=u2" class="avatar"
                                        style="width:24px;height:24px;background:var(--bg-card-hover)"
                                        alt=""><span>John Doe</span></div>
                            </td>
                            <td>MacBook Pro M3</td>
                            <td class="font-semibold text-main">$2,499</td>
                            <td><span class="tag chip-indigo">Processing</span></td>
                            <td><button class="btn-icon" onclick="openDeleteModal('#4520')" title="Delete order"
                                    style="width:30px;height:30px;color:#f43f5e;border-color:rgba(244,63,94,0.2)"><svg
                                        width="13" height="13" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1 14H6L5 6" />
                                        <path d="M10 11v6" />
                                        <path d="M14 11v6" />
                                        <path d="M9 6V4h6v2" />
                                    </svg></button></td>
                        </tr>
                        <tr class="searchable-row">
                            <td class="font-mono text-xs" style="color:#818cf8">#4519</td>
                            <td>
                                <div class="flex items-center gap-2"><img
                                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=u3" class="avatar"
                                        style="width:24px;height:24px;background:var(--bg-card-hover)"
                                        alt=""><span>Emily Zhang</span></div>
                            </td>
                            <td>AirPods Pro</td>
                            <td class="font-semibold text-main">$249</td>
                            <td><span class="tag chip-amber">Pending</span></td>
                            <td><button class="btn-icon" onclick="openDeleteModal('#4519')" title="Delete order"
                                    style="width:30px;height:30px;color:#f43f5e;border-color:rgba(244,63,94,0.2)"><svg
                                        width="13" height="13" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1 14H6L5 6" />
                                        <path d="M10 11v6" />
                                        <path d="M14 11v6" />
                                        <path d="M9 6V4h6v2" />
                                    </svg></button></td>
                        </tr>
                        <tr class="searchable-row">
                            <td class="font-mono text-xs" style="color:#818cf8">#4518</td>
                            <td>
                                <div class="flex items-center gap-2"><img
                                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=u4" class="avatar"
                                        style="width:24px;height:24px;background:var(--bg-card-hover)"
                                        alt=""><span>Mark Wilson</span></div>
                            </td>
                            <td>iPad Air</td>
                            <td class="font-semibold text-main">$749</td>
                            <td><span class="tag chip-rose">Cancelled</span></td>
                            <td><button class="btn-icon" onclick="openDeleteModal('#4518')" title="Delete order"
                                    style="width:30px;height:30px;color:#f43f5e;border-color:rgba(244,63,94,0.2)"><svg
                                        width="13" height="13" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1 14H6L5 6" />
                                        <path d="M10 11v6" />
                                        <path d="M14 11v6" />
                                        <path d="M9 6V4h6v2" />
                                    </svg></button></td>
                        </tr>
                        <tr class="searchable-row">
                            <td class="font-mono text-xs" style="color:#818cf8">#4517</td>
                            <td>
                                <div class="flex items-center gap-2"><img
                                        src="https://api.dicebear.com/7.x/avataaars/svg?seed=u5" class="avatar"
                                        style="width:24px;height:24px;background:var(--bg-card-hover)"
                                        alt=""><span>Lisa Park</span></div>
                            </td>
                            <td>Apple Watch Ultra</td>
                            <td class="font-semibold text-main">$799</td>
                            <td><span class="tag chip-emerald">Delivered</span></td>
                            <td><button class="btn-icon" onclick="openDeleteModal('#4517')" title="Delete order"
                                    style="width:30px;height:30px;color:#f43f5e;border-color:rgba(244,63,94,0.2)"><svg
                                        width="13" height="13" fill="none" stroke="currentColor"
                                        stroke-width="2" viewBox="0 0 24 24">
                                        <polyline points="3 6 5 6 21 6" />
                                        <path d="M19 6l-1 14H6L5 6" />
                                        <path d="M10 11v6" />
                                        <path d="M14 11v6" />
                                        <path d="M9 6V4h6v2" />
                                    </svg></button></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Top Products -->
        <div class="card">
            <div class="flex items-center justify-between mb-4">
                <div class="text-base font-semibold text-main">Top Products</div>
                <a href="products.html" class="text-xs font-medium" style="color:#818cf8">See all →</a>
            </div>
            <div class="space-y-4">
                <div>
                    <div class="flex justify-between text-sm mb-1.5"><span style="color:var(--text-muted-light)">iPhone 15
                            Pro</span><span class="text-main font-semibold">42%</span></div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="background:#6366f1;width:0" data-width="42%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1.5"><span style="color:var(--text-muted-light)">MacBook
                            Pro M3</span><span class="text-main font-semibold">31%</span></div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="background:#10b981;width:0" data-width="31%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1.5"><span style="color:var(--text-muted-light)">AirPods
                            Pro</span><span class="text-main font-semibold">18%</span></div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="background:#f59e0b;width:0" data-width="18%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1.5"><span style="color:var(--text-muted-light)">iPad
                            Air</span><span class="text-main font-semibold">6%</span></div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="background:#06b6d4;width:0" data-width="6%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex justify-between text-sm mb-1.5"><span style="color:var(--text-muted-light)">Apple
                            Watch</span><span class="text-main font-semibold">3%</span></div>
                    <div class="progress-bar">
                        <div class="progress-fill" style="background:#f43f5e;width:0" data-width="3%"></div>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-2 gap-3 mt-6">
                <div class="p-3 rounded-xl text-center"
                    style="background:rgba(99,102,241,.08);border:1px solid rgba(99,102,241,.12)">
                    <div class="text-lg font-bold" style="color:#818cf8">98.2%</div>
                    <div class="text-xs mt-0.5" style="color:var(--text-muted)">Uptime</div>
                </div>
                <div class="p-3 rounded-xl text-center"
                    style="background:rgba(16,185,129,.08);border:1px solid rgba(16,185,129,.12)">
                    <div class="text-lg font-bold" style="color:#10b981">4.8★</div>
                    <div class="text-xs mt-0.5" style="color:var(--text-muted)">Rating</div>
                </div>
            </div>
        </div>
    </div>

@endsection
