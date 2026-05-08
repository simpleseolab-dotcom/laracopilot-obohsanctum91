<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('voucher_code', 50)->unique();
            $table->decimal('amount', 12, 4);
            $table->string('currency', 10)->default('USD');
            $table->uuid('customer_id')->nullable();
            $table->timestamp('used_at')->nullable();
            $table->date('expiry_date')->nullable();
            $table->string('status')->default('active');
            $table->uuid('created_by')->nullable();
            $table->timestamps();
            
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('set null');
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
};
