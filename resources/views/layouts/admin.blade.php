<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - FreeSWITCH CMS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .active-nav { background-color: rgba(255, 255, 255, 0.1); border-left: 4px solid white; }
    </style>
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-br from-indigo-700 to-purple-800 text-white flex-shrink-0">
            <div class="p-6">
                <div class="flex items-center space-x-3 mb-8">
                    <div class="bg-white rounded-lg p-2">
                        <svg class="w-8 h-8 text-indigo-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-xl font-bold">FreeSWITCH</h1>
                        <p class="text-xs text-indigo-200">CMS Platform</p>
                    </div>
                </div>

                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-all {{ request()->routeIs('admin.dashboard') ? 'active-nav' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('admin.dids.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-all {{ request()->routeIs('admin.dids.*') ? 'active-nav' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                        </svg>
                        <span>DID Management</span>
                    </a>

                    <a href="{{ route('admin.campaigns.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-all {{ request()->routeIs('admin.campaigns.*') ? 'active-nav' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                        </svg>
                        <span>Auto Dialer</span>
                    </a>

                    <a href="{{ route('admin.billing.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-all {{ request()->routeIs('admin.billing.*') || request()->routeIs('admin.topup.*') ? 'active-nav' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        <span>Billing</span>
                    </a>

                    <a href="{{ route('admin.queues.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-all {{ request()->routeIs('admin.queues.*') ? 'active-nav' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span>Call Queues</span>
                    </a>

                    <a href="{{ route('admin.ivrs.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-all {{ request()->routeIs('admin.ivrs.*') ? 'active-nav' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19V6l12-3v13M9 19c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zm12-3c0 1.105-1.343 2-3 2s-3-.895-3-2 1.343-2 3-2 3 .895 3 2zM9 10l12-3"></path>
                        </svg>
                        <span>IVR Builder</span>
                    </a>

                    <a href="{{ route('admin.cdr.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-all {{ request()->routeIs('admin.cdr.*') ? 'active-nav' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span>Call Records (CDR)</span>
                    </a>

                    <a href="{{ route('admin.extensions.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-lg hover:bg-white hover:bg-opacity-10 transition-all {{ request()->routeIs('admin.extensions.*') ? 'active-nav' : '' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                        <span>Extensions</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Top Header -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between px-8 py-4">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                    </div>
                    <div class="flex items-center space-x-6">
                        <div class="text-right">
                            <p class="text-sm text-gray-600">Account Balance</p>
                            <p class="text-xl font-bold text-green-600">${{ number_format(session('admin_balance', 0), 2) }}</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <div class="text-right">
                                <p class="text-sm font-semibold text-gray-800">{{ session('admin_user') }}</p>
                                <p class="text-xs text-gray-600">{{ session('admin_email') }}</p>
                            </div>
                            <form action="{{ route('admin.logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600 transition-colors">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content Area -->
            <main class="flex-1 overflow-y-auto bg-gray-100 p-8">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
