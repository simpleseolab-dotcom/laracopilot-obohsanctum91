<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Did;
use App\Models\Campaign;
use App\Models\CallQueue;
use App\Models\Ivr;
use App\Models\Cdr;
use App\Models\Extension;

class DashboardController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $totalDids = Did::count();
        $activeCampaigns = Campaign::where('status', 'running')->count();
        $totalCalls = Cdr::whereDate('created_at', today())->count();
        $activeQueues = CallQueue::where('active', true)->count();
        $totalExtensions = Extension::count();
        $totalIvrs = Ivr::count();
        
        $accountBalance = session('admin_balance', 0);
        $todayCallMinutes = Cdr::whereDate('created_at', today())->sum('duration');
        $todayCallMinutes = round($todayCallMinutes / 60, 2);
        
        $recentCalls = Cdr::with('did')
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
        
        $campaignStats = Campaign::selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();
        
        return view('admin.dashboard', compact(
            'totalDids',
            'activeCampaigns',
            'totalCalls',
            'activeQueues',
            'totalExtensions',
            'totalIvrs',
            'accountBalance',
            'todayCallMinutes',
            'recentCalls',
            'campaignStats'
        ));
    }
}