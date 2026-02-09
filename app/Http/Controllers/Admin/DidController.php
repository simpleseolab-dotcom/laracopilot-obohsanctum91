<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Did;
use App\Models\Extension;
use App\Models\Ivr;
use App\Models\CallQueue;
use Illuminate\Http\Request;

class DidController extends Controller
{
    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $dids = Did::with(['extension', 'ivr', 'queue'])
            ->orderBy('created_at', 'desc')
            ->paginate(15);
        
        return view('admin.dids.index', compact('dids'));
    }
    
    public function create()
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $extensions = Extension::all();
        $ivrs = Ivr::all();
        $queues = CallQueue::all();
        
        return view('admin.dids.create', compact('extensions', 'ivrs', 'queues'));
    }
    
    public function store(Request $request)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $validated = $request->validate([
            'phone_number' => 'required|string|max:20|unique:dids,phone_number',
            'country_code' => 'required|string|max:5',
            'did_type' => 'required|in:voice_only,sms_only,voice_sms',
            'route_to_type' => 'required|in:extension,ivr,queue,external',
            'route_to_id' => 'nullable|integer',
            'external_number' => 'nullable|string|max:20',
            'recording_enabled' => 'boolean',
            'description' => 'nullable|string|max:500'
        ]);
        
        $validated['recording_enabled'] = $request->has('recording_enabled');
        
        Did::create($validated);
        
        return redirect()->route('admin.dids.index')
            ->with('success', 'DID created successfully!');
    }
    
    public function edit($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $did = Did::findOrFail($id);
        $extensions = Extension::all();
        $ivrs = Ivr::all();
        $queues = CallQueue::all();
        
        return view('admin.dids.edit', compact('did', 'extensions', 'ivrs', 'queues'));
    }
    
    public function update(Request $request, $id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        $did = Did::findOrFail($id);
        
        $validated = $request->validate([
            'phone_number' => 'required|string|max:20|unique:dids,phone_number,' . $id,
            'country_code' => 'required|string|max:5',
            'did_type' => 'required|in:voice_only,sms_only,voice_sms',
            'route_to_type' => 'required|in:extension,ivr,queue,external',
            'route_to_id' => 'nullable|integer',
            'external_number' => 'nullable|string|max:20',
            'recording_enabled' => 'boolean',
            'description' => 'nullable|string|max:500'
        ]);
        
        $validated['recording_enabled'] = $request->has('recording_enabled');
        
        $did->update($validated);
        
        return redirect()->route('admin.dids.index')
            ->with('success', 'DID updated successfully!');
    }
    
    public function destroy($id)
    {
        if (!session('admin_logged_in')) {
            return redirect()->route('admin.login');
        }
        
        Did::findOrFail($id)->delete();
        
        return redirect()->route('admin.dids.index')
            ->with('success', 'DID deleted successfully!');
    }
}