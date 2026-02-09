@extends('layouts.admin')

@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- KPI Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-semibold">Total DIDs</p>
                    <p class="text-3xl font-bold text-gray-800 mt-2">{{ $totalDids }}</p>
                </div>
                <div class="bg-blue-100 rounded-full p-3">
                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-semibold">Active Campaigns</p>
                    <p class="text-3xl font-bold text-green-600 mt-2">{{ $activeCampaigns }}</p>
                </div>
                <div class="bg-green-100 rounded-full p-3">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-semibold">Today's Calls</p>
                    <p class="text-3xl font-bold text-purple-600 mt-2">{{ $totalCalls }}</p>
                </div>
                <div class="bg-purple-100 rounded-full p-3">
                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                    </svg>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6 hover:shadow-lg transition-shadow">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-500 text-sm font-semibold">Active Queues</p>
                    <p class="text-3xl font-bold text-orange-600 mt-2">{{ $activeQueues }}</p>
                </div>
                <div class="bg-orange-100 rounded-full p-3">
                    <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Secondary Stats -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-2">
                <p class="text-gray-600 font-semibold">Total Extensions</p>
                <span class="text-2xl font-bold text-indigo-600">{{ $totalExtensions }}</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-indigo-600 h-2 rounded-full" style="width: 75%"></div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-2">
                <p class="text-gray-600 font-semibold">Total IVRs</p>
                <span class="text-2xl font-bold text-pink-600">{{ $totalIvrs }}</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-pink-600 h-2 rounded-full" style="width: 60%"></div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="flex items-center justify-between mb-2">
                <p class="text-gray-600 font-semibold">Call Minutes (Today)</p>
                <span class="text-2xl font-bold text-teal-600">{{ number_format($todayCallMinutes, 1) }}</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-teal-600 h-2 rounded-full" style="width: 85%"></div>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-800">Recent Calls</h3>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    @forelse($recentCalls as $call)
                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                        <div class="flex items-center space-x-3">
                            <div class="bg-blue-100 rounded-full p-2">
                                <svg class="w-4 h-4 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">{{ $call->caller_number }}</p>
                                <p class="text-xs text-gray-500">{{ $call->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        <div class="text-right">
                            <p class="text-sm font-semibold text-gray-700">{{ gmdate('i:s', $call->duration) }}</p>
                            <span class="px-2 py-1 text-xs rounded-full 
                                @if($call->status === 'answered') bg-green-100 text-green-800
                                @elseif($call->status === 'busy') bg-red-100 text-red-800
                                @else bg-gray-100 text-gray-800 @endif">
                                {{ ucfirst($call->status) }}
                            </span>
                        </div>
                    </div>
                    @empty
                    <p class="text-center text-gray-500 py-4">No recent calls</p>
                    @endforelse
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h3 class="text-lg font-bold text-gray-800">Campaign Status</h3>
            </div>
            <div class="p-6">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center">
                                <span class="text-xl font-bold text-green-600">{{ $campaignStats['running'] ?? 0 }}</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Running</p>
                                <p class="text-xs text-gray-500">Active campaigns</p>
                            </div>
                        </div>
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-green-600 h-2 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-yellow-100 rounded-full flex items-center justify-center">
                                <span class="text-xl font-bold text-yellow-600">{{ $campaignStats['paused'] ?? 0 }}</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Paused</p>
                                <p class="text-xs text-gray-500">Temporarily stopped</p>
                            </div>
                        </div>
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-yellow-600 h-2 rounded-full" style="width: 50%"></div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                <span class="text-xl font-bold text-blue-600">{{ $campaignStats['completed'] ?? 0 }}</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Completed</p>
                                <p class="text-xs text-gray-500">Finished campaigns</p>
                            </div>
                        </div>
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: 100%"></div>
                        </div>
                    </div>

                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gray-100 rounded-full flex items-center justify-center">
                                <span class="text-xl font-bold text-gray-600">{{ $campaignStats['stopped'] ?? 0 }}</span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-800">Stopped</p>
                                <p class="text-xs text-gray-500">Manually stopped</p>
                            </div>
                        </div>
                        <div class="w-24 bg-gray-200 rounded-full h-2">
                            <div class="bg-gray-600 h-2 rounded-full" style="width: 30%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow p-6">
        <h3 class="text-lg font-bold text-gray-800 mb-4">Quick Actions</h3>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <a href="{{ route('admin.dids.create') }}" class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg text-white hover:from-blue-600 hover:to-blue-700 transition-all transform hover:scale-105">
                <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="font-semibold">Add DID</span>
            </a>

            <a href="{{ route('admin.campaigns.create') }}" class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-green-500 to-green-600 rounded-lg text-white hover:from-green-600 hover:to-green-700 transition-all transform hover:scale-105">
                <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z"></path>
                </svg>
                <span class="font-semibold">New Campaign</span>
            </a>

            <a href="{{ route('admin.topup.index') }}" class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg text-white hover:from-purple-600 hover:to-purple-700 transition-all transform hover:scale-105">
                <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                </svg>
                <span class="font-semibold">Top Up</span>
            </a>

            <a href="{{ route('admin.cdr.live') }}" class="flex flex-col items-center justify-center p-6 bg-gradient-to-br from-red-500 to-red-600 rounded-lg text-white hover:from-red-600 hover:to-red-700 transition-all transform hover:scale-105">
                <svg class="w-8 h-8 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                </svg>
                <span class="font-semibold">Live CDR</span>
            </a>
        </div>
    </div>
</div>
@endsection
