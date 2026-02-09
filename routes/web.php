<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DidController;
use App\Http\Controllers\Admin\CampaignController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\BillingController;
use App\Http\Controllers\Admin\TopUpController;
use App\Http\Controllers\Admin\QueueController;
use App\Http\Controllers\Admin\IvrController;
use App\Http\Controllers\Admin\CdrController;
use App\Http\Controllers\Admin\ExtensionController;

// Public route
Route::get('/', function () { return view('welcome'); });

// Admin Authentication
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Dashboard
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

// DID Management
Route::get('/admin/dids', [DidController::class, 'index'])->name('admin.dids.index');
Route::get('/admin/dids/create', [DidController::class, 'create'])->name('admin.dids.create');
Route::post('/admin/dids', [DidController::class, 'store'])->name('admin.dids.store');
Route::get('/admin/dids/{id}/edit', [DidController::class, 'edit'])->name('admin.dids.edit');
Route::put('/admin/dids/{id}', [DidController::class, 'update'])->name('admin.dids.update');
Route::delete('/admin/dids/{id}', [DidController::class, 'destroy'])->name('admin.dids.destroy');

// Auto Dialer Campaigns
Route::get('/admin/campaigns', [CampaignController::class, 'index'])->name('admin.campaigns.index');
Route::get('/admin/campaigns/create', [CampaignController::class, 'create'])->name('admin.campaigns.create');
Route::post('/admin/campaigns', [CampaignController::class, 'store'])->name('admin.campaigns.store');
Route::get('/admin/campaigns/{id}/edit', [CampaignController::class, 'edit'])->name('admin.campaigns.edit');
Route::put('/admin/campaigns/{id}', [CampaignController::class, 'update'])->name('admin.campaigns.update');
Route::delete('/admin/campaigns/{id}', [CampaignController::class, 'destroy'])->name('admin.campaigns.destroy');
Route::post('/admin/campaigns/{id}/start', [CampaignController::class, 'start'])->name('admin.campaigns.start');
Route::post('/admin/campaigns/{id}/pause', [CampaignController::class, 'pause'])->name('admin.campaigns.pause');
Route::post('/admin/campaigns/{id}/stop', [CampaignController::class, 'stop'])->name('admin.campaigns.stop');

// Campaign Contacts
Route::get('/admin/campaigns/{campaignId}/contacts', [ContactController::class, 'index'])->name('admin.contacts.index');
Route::post('/admin/campaigns/{campaignId}/contacts/import', [ContactController::class, 'import'])->name('admin.contacts.import');
Route::delete('/admin/contacts/{id}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');

// Billing
Route::get('/admin/billing', [BillingController::class, 'index'])->name('admin.billing.index');
Route::get('/admin/billing/transactions', [BillingController::class, 'transactions'])->name('admin.billing.transactions');

// Top-Up Packages
Route::get('/admin/topup', [TopUpController::class, 'index'])->name('admin.topup.index');
Route::post('/admin/topup/purchase', [TopUpController::class, 'purchase'])->name('admin.topup.purchase');
Route::post('/admin/topup/custom', [TopUpController::class, 'custom'])->name('admin.topup.custom');

// Call Queues
Route::get('/admin/queues', [QueueController::class, 'index'])->name('admin.queues.index');
Route::get('/admin/queues/create', [QueueController::class, 'create'])->name('admin.queues.create');
Route::post('/admin/queues', [QueueController::class, 'store'])->name('admin.queues.store');
Route::get('/admin/queues/{id}/edit', [QueueController::class, 'edit'])->name('admin.queues.edit');
Route::put('/admin/queues/{id}', [QueueController::class, 'update'])->name('admin.queues.update');
Route::delete('/admin/queues/{id}', [QueueController::class, 'destroy'])->name('admin.queues.destroy');

// IVR Builder
Route::get('/admin/ivrs', [IvrController::class, 'index'])->name('admin.ivrs.index');
Route::get('/admin/ivrs/create', [IvrController::class, 'create'])->name('admin.ivrs.create');
Route::post('/admin/ivrs', [IvrController::class, 'store'])->name('admin.ivrs.store');
Route::get('/admin/ivrs/{id}/edit', [IvrController::class, 'edit'])->name('admin.ivrs.edit');
Route::put('/admin/ivrs/{id}', [IvrController::class, 'update'])->name('admin.ivrs.update');
Route::delete('/admin/ivrs/{id}', [IvrController::class, 'destroy'])->name('admin.ivrs.destroy');

// CDR (Call Detail Records)
Route::get('/admin/cdr', [CdrController::class, 'index'])->name('admin.cdr.index');
Route::get('/admin/cdr/live', [CdrController::class, 'live'])->name('admin.cdr.live');

// Extensions
Route::get('/admin/extensions', [ExtensionController::class, 'index'])->name('admin.extensions.index');
Route::get('/admin/extensions/create', [ExtensionController::class, 'create'])->name('admin.extensions.create');
Route::post('/admin/extensions', [ExtensionController::class, 'store'])->name('admin.extensions.store');
Route::get('/admin/extensions/{id}/edit', [ExtensionController::class, 'edit'])->name('admin.extensions.edit');
Route::put('/admin/extensions/{id}', [ExtensionController::class, 'update'])->name('admin.extensions.update');
Route::delete('/admin/extensions/{id}', [ExtensionController::class, 'destroy'])->name('admin.extensions.destroy');