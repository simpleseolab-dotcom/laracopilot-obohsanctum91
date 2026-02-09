<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminAuthController extends Controller
{
    public function showLogin()
    {
        if (session('admin_logged_in')) {
            return redirect()->route('admin.dashboard');
        }
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = [
            'admin@freeswitch.com' => 'admin123',
            'manager@freeswitch.com' => 'manager123',
            'supervisor@freeswitch.com' => 'supervisor123'
        ];
        
        if (isset($credentials[$request->email]) && 
            $credentials[$request->email] === $request->password) {
            session([
                'admin_logged_in' => true,
                'admin_user' => explode('@', $request->email)[0],
                'admin_email' => $request->email,
                'admin_balance' => 1000.00
            ]);
            return redirect()->route('admin.dashboard');
        }
        
        return back()->withErrors(['email' => 'Invalid credentials'])->withInput();
    }

    public function logout()
    {
        session()->forget(['admin_logged_in', 'admin_user', 'admin_email', 'admin_balance']);
        return redirect()->route('admin.login');
    }
}