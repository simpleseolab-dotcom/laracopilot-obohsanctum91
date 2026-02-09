<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Did extends Model
{
    protected $fillable = [
        'phone_number',
        'country_code',
        'did_type',
        'route_to_type',
        'route_to_id',
        'external_number',
        'recording_enabled',
        'description',
        'active'
    ];
    
    protected $casts = [
        'recording_enabled' => 'boolean',
        'active' => 'boolean'
    ];
    
    public function extension()
    {
        return $this->belongsTo(Extension::class, 'route_to_id')
            ->where('route_to_type', 'extension');
    }
    
    public function ivr()
    {
        return $this->belongsTo(Ivr::class, 'route_to_id')
            ->where('route_to_type', 'ivr');
    }
    
    public function queue()
    {
        return $this->belongsTo(CallQueue::class, 'route_to_id')
            ->where('route_to_type', 'queue');
    }
    
    public function cdrs()
    {
        return $this->hasMany(Cdr::class);
    }
}