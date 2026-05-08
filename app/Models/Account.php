<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Account extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'account_id',
        'tenant',
        'company_name',
        'email',
        'phone',
        'balance',
        'credit_limit',
        'status'
    ];
    
    protected $casts = [
        'balance' => 'decimal:2',
        'credit_limit' => 'decimal:2',
        'status' => 'string'
    ];
    
    public function cdrs()
    {
        return $this->hasMany(Cdr::class);
    }
}
